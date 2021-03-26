<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dinas extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/dinas_model');
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Daftar Dinas';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['dinas'] = $this->dinas_model->showDinas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dinas/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footer_dark');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama_dinas', 'nama dinas', 'required|trim');
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['dinas'] = $this->dinas_model->showDinas();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Tambah Data dinas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dinas/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('admin/dinas_model');
            $this->dinas_model->tambahDinas();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/dinas', 'refresh');
        }
    }

    public function edit($id_dinas)
    {

        $data['dinas'] = $this->dinas_model->showdinasOne($id_dinas);
        // $data['dinas'] = $this->db->get_where('dinas', ['id_dinas' => $id_dinas])->result();
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['dinas']    = $this->dinas_model->getdinasByID($id_dinas);
        // $data['user']              = $this->dinas_model->getUser($this->session->userdata('id_user'));
        $this->form_validation->set_rules('id_dinas', 'id dinas', 'required|numeric');
        $this->form_validation->set_rules('nama_dinas', 'nama dinas', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Kominfo Batu | Edit Data dinas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dinas/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->dinas_model->ubahdinas();
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
            redirect('admin/dinas', 'refresh');
        }
    }

    public function hapus($id_dinas)
    {
        if ($this->dinas_model->hapusdinas($id_dinas) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/dinas');
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
            redirect('admin/dinas', 'refresh');
        }
    }
}