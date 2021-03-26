<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Beranda';
        $this->load->view('templates/user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user/footer', $data);
    }
}