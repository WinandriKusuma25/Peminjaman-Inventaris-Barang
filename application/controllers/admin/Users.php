<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/user_model');
        $this->load->model('admin/dinas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Peminjam';
        // $data['user'] = $this->user_model->showUser($this->session->userdata('id_user'));
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->user_model->tampilUserSaja();
        // $data2['users'] = $this->user_model->tampilUserSaja();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        //$this->load->view('templates/datatables', $data);
        $this->load->view('admin/users/index', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/footer_dark', $data);
    }


    public function tambah()
    {

        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['users'] = $this->user_model->showUserAll();
        $data['dinas'] = $this->dinas_model->showDinas();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Tambah Peminjam';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/users/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload = $this->user_model->upload();
            if ($upload['result'] == 'success') {
                $this->user_model->addUser($upload);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/Users');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function detail($id_user)
    {
        $data['title'] = 'Kominfo Batu | Detail Users';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['users'] = $this->user_model->getUserDetail($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/users/detail', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/footer_dark', $data);
    }


    public function edit($id_user)
    {

        $data['users'] = $this->user_model->getUserDetail($id_user);
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->form_validation->set_rules('id_user', 'id_user', 'required|numeric');
        $this->form_validation->set_rules('is_active', 'is_active', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Kominfo Batu | Edit Status User';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/users/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->user_model->ubahUser();
            $this->load->library('session');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diedit ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/users', 'refresh');
        }
    }

    public function hapus($id_user)
    {
        if ($this->user_model->hapususer($id_user) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/users');
        } else {
            $this->load->library('session');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Data berhasil di hapus !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/users', 'refresh');
        }
    }
}