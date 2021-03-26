<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/user_model');
        $this->load->model('admin/dinas_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Masuk';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
            $this->load->view('templates/footer_dark');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika user nya ada
        if ($user) {
            //jika user nya atif
            if ($user['is_active'] == 'aktif') {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        redirect('admin/home');
                    } else {
                        redirect('member/home');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                           Password Salah!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Email belum di aktifkan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Email belum registrasi !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        // $this->form_validation->set_rules('dinas', 'Dinas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Registrasi';
            // $data['user'] = $this->user_model->showUser();
            $data['dinas'] = $this->dinas_model->showDinas();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
            $this->load->view('templates/footer_dark');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'id_dinas' => $this->input->post('id_dinas', true),
                'email' => htmlspecialchars($email),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // 'password' => $this->input->post('password1'),
                'id_role' =>  2,
                'is_active' => 'pasif',
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Akun mu telah di buat, Silahkan Aktivasi akun Anda.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'angkasasemesta12@gmail.com',
            'smtp_pass' => 'bintangbulan12',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('angkasasemesta12@gmail.com', 'KominfoBatu');
        $this->email->to($this->input->post('email'));

        if ($type  == 'verify') {
            $this->email->subject('Account verification');
            $this->email->message('Click this link to verify your account : <a href="'
                . base_url() . 'auth/verify?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">Active</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="'
                . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token =  $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat!</strong> ' . $email . ' Akun telah aktif. Silahkan Masuk !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Token Kadarluarsa!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Aktivasi akun gagal! Token Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Aktivasi akun gagal! Email Salah !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
         Anda telah keluar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('auth');
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'KominfoBatu | Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/auth_footer');
            $this->load->view('templates/footer_dark');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()

                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                   Silahkan cek email untuk mereset password !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Email belum aktif atau belum registrasi!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token =  $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Reset password failed! wrong token
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                );
                redirect('auth/forgotPassword');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Reset kata sandi gagal ! Email salah
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
            );
            redirect('auth/forgotPassword');
        }
    }

    public function changePassword()

    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'KominfoBatu | Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Kata Sandi telah di ubah. Silahkan masuk !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
            );
            redirect('auth');
        }
    }
}