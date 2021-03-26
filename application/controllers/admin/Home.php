<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        $this->load->model('admin/user_model');
        $this->load->model('admin/peminjaman_model');
        // $this->load->model('admin/barang_model');
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Beranda';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showPeminjamanLimit();
        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        // $data['cbk'] = [];

        foreach ($bln as $b) {
            $data['cbm'][] = $this->peminjaman_model->chartTransaksiPeminjaman($b);
            // $data['cbk'][] = $this->peminjaman_model->chartTransaksiPeminjaman($b);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/dashboard', $data);
        $this->load->view('templates/footer_dark', $data);
    }

    public function backup()
    {
        $this->load->dbutil();
        $db_format=array('format'=>'zip','filename'=>'peminjaman_kominfo_backup.sql');
        $backup=& $this->dbutil->backup($db_format);
        $dbname='DB_PeminjmanKominfo_backup'.date('d-m-Y').'.zip';
        $save='assets/backup/'.$dbname;
        write_file($save,$backup);
        force_download($dbname,$backup);
    }
}