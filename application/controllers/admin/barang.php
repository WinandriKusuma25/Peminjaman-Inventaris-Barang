<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('admin/user_model');
        $this->load->model('admin/barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Admin barang';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['barang'] = $this->barang_model->showBarang();
        // $data ['barang2']       = $this->barang_model->FieldCount();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/barang/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footer_dark');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
    
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['barang'] = $this->barang_model->showBarang();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Tambah barang';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/barang/tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footer_dark');
        } else {
            $upload = $this->barang_model->upload();
            if ($upload['result'] == 'success') {
                $this->barang_model->addBarang($upload);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect('admin/barang');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function edit($id_barang)
    {
        $data['title'] = 'Kominfo Batu | Edit Barang';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['barang'] = $this->barang_model->showbarangOne($id_barang);
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
        // $this->form_validation->set_rules('stok', 'stok', 'required|trim');
        // $this->form_validation->set_rules('ketersedian', 'Ketersedian', 'required|trim');

     
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/barang/edit', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footer_dark');
        } else {

            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/images/barang';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['barang']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/barang/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_barang = $this->input->post('id_barang');
            $nama = $this->input->post('nama');
            $stok = $this->input->post('stok');
            // $ketersedian = $this->input->post('ketersedian');
           
    
            $this->db->set('nama', $nama);
            $this->db->set('stok', $stok);
            // $this->db->set('ketersedian', $ketersedian);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/barang');
        }
    }

    public function hapus($id_barang)
    {
        if ($this->barang_model->hapusbarang($id_barang) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/barang');
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
            redirect('admin/barang', 'refresh');
        }
    }

    public function detail($id_barang)
    {
        $data['title'] = 'Kominfo Batu | Detail Users';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id_barang])->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/barang/detail', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/footer_dark', $data);
    }
}