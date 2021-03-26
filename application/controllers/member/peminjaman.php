<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjaman extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/user_model');
        $this->load->model('admin/barang_model');
        $this->load->model('admin/peminjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Riwayat peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showPeminjamanMember($this->session->userdata('email'));
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/peminjaman/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function detail($id_peminjaman)
    {
        $data['title'] = 'Kominfo Batu | Detail Peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('templates/member/topbar', $data);
        $this->load->view('member/peminjaman/detail', $data);
        $this->load->view('templates/member/footer', $data);
    }

    public function tambah()
    {

        // $this->form_validation->set_rules('id_user', 'id_user', 'required|trim');
        $this->form_validation->set_rules('id_barang', 'id_barang ', 'required|trim');
        $this->form_validation->set_rules('tgl_peminjaman', 'tgl_peminjaman', 'required|trim');
        $this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id_barang])->result();
        // $data['peminjaman'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $data['peminjaman'] = $this->peminjaman_model->showPeminjamanMember($this->session->userdata('email'));
        $data['barang'] = $this->barang_model->showBarang();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Tambah Data Peminjaman';
            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('templates/member/topbar', $data);
            $this->load->view('member/peminjaman/tambah', $data);
            $this->load->view('templates/member/footer');
        } else {
            // var_dump( $this->peminjaman_model->tambahPeminjamanMember());
            // die();
            $this->db->where('id_barang', $this->input->post('id_barang', true));
            $barang = $this->db->get('barang')->row();

            if($this->input->post('jumlah') > $barang->stok){
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Mohon maaf stok tidak mencukupi ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/peminjaman/tambah', 'refresh');
            }
            else
            $this->peminjaman_model->tambahPeminjamanMember();
            
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan mohon tunggu konfirmasi dari Admin ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/peminjaman', 'refresh');
        }
    }

    
    public function edit($id_peminjaman)
    {
        $this->form_validation->set_rules('tgl_peminjaman', 'tgl_peminjaman', 'required|trim');
        $this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'required|trim');
        
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showPeminjamanMember($this->session->userdata('email'));
        $data['peminjamanEdit'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $data['barang'] = $this->barang_model->showBarangMember();
    
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Diskominfo | Edit Transaksi Peminjaman';
            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('templates/member/topbar', $data);
            $this->load->view('member/peminjaman/edit', $data);
            $this->load->view('templates/member/footer');
        } else {
            $this->db->where('id_barang', $this->input->post('id_barang', true));
            $barang = $this->db->get('barang')->row();

            if($this->input->post('jumlah') > $barang->stok){
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Mohon maaf stok tidak mencukupi ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/peminjaman/edit', 'refresh');
            }
            else
            $this->peminjaman_model->ubahPeminjaman();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Data berhasil diedit !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/peminjaman', 'refresh');
        }
    }

    public function hapus($id_peminjaman)
    {
        $this->peminjaman_model->getStok($id_peminjaman);
        $this->peminjaman_model->hapuspeminjaman($id_peminjaman);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil di hapus !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('member/peminjaman');
    }

}