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
        $data['title'] = 'Kominfo Batu | Barang';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['barang'] = $this->barang_model->showBarang();
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/barang/index', $data);
        $this->load->view('templates/member/footer');
    }

    
    public function detail($id_barang)
    {
        $data['title'] = 'Kominfo Batu | Detail Barang';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id_barang])->result();
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/barang/detail', $data);
        $this->load->view('templates/member/footer', $data);
    }
}