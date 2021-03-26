<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        // $this->load->helper('file');
        // $this->load->helper('download');
        // $this->load->library('zip');
        $this->load->model('admin/user_model');
        // $this->load->model('admin/peminjaman_model');
        // if($this->session->userdata('id_role') != 1){
        //     redirect('member/home');
        // }
    }

    public function index()
    {  
        $data['title'] = 'Kominfo Batu | Beranda';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/home/index', $data);
        $this->load->view('templates/member/footer');
    }
}