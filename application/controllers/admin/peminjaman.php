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
        $this->load->model('admin/peminjaman_model');
        $this->load->model('admin/barang_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kominfo Batu | Transaksi Peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showPeminjaman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footer_dark');
    }

    public function detail($id_peminjaman)
    {
        $data['title'] = 'Kominfo Batu | Detail Peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/detail', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/footer_dark', $data);
    }


    public function print(){
        $data['peminjaman'] = $this->peminjaman_model->showPeminjaman('peminjaman');
        $this->load->view('admin/peminjaman/print_pmnjm', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['peminjaman'] = $this->peminjaman_model->showPeminjaman('peminjaman');

        $this->load->view('admin/peminjaman/laporan_pdf', $data);

        $paper_size = "A4";
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_peminjaman.pdf", array('Attachment' => 0));
    }

    public function excel()
    { 
        $data['peminjaman'] = $this->peminjaman_model->showPeminjaman();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Kominfo Batu");
        $object->getProperties()->setLastModifiedBy("Kominfo Batu");
        $object->getProperties()->setTitle("Kominfo Batu");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Nama Peminjam');
        $object->getActiveSheet()->setCellValue('C1', 'Barang');
        $object->getActiveSheet()->setCellValue('D1', 'Tanggal Peminjaman');
        $object->getActiveSheet()->setCellValue('E1', 'Tanggal Kembali');
        $object->getActiveSheet()->setCellValue('F1', 'Keterangan');
        $object->getActiveSheet()->setCellValue('G1', 'Status Peminjaman');
        $object->getActiveSheet()->setCellValue('H1', 'Status Pengembalian');

        $baris = 2;
        $no = 1;

        foreach ($data['peminjaman'] as $pjm){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $pjm->name);
            $object->getActiveSheet()->setCellValue('C'.$baris, $pjm->nama);
            $object->getActiveSheet()->setCellValue('D'.$baris, $pjm->tgl_peminjaman);
            $object->getActiveSheet()->setCellValue('E'.$baris, $pjm->tgl_kembali);
            $object->getActiveSheet()->setCellValue('F'.$baris, $pjm->keterangan);
            $object->getActiveSheet()->setCellValue('G'.$baris, $pjm->status_peminjaman);
            $object->getActiveSheet()->setCellValue('H'.$baris, $pjm->status_pengembalian);

            $baris++;
        }
        // $spreadsheet->setActiveSheetIndex(0);
        ob_clean();
        $filename="Data Peminjaman". '.xlsx';

        $object->getActiveSheet()->setTitle("Data Peminjaman");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function tambah()
    {

        // $this->form_validation->set_rules('id_user', 'id_user', 'required|trim');
        // $this->form_validation->set_rules('id_barang', 'id_barang ', 'required|trim');
        $this->form_validation->set_rules('tgl_peminjaman', 'tgl_peminjaman', 'required|trim');
        // $this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        // $this->form_validation->set_rules('status_peminjaman', 'status_peminjaman', 'required|trim');
        // $this->form_validation->set_rules('status_pengembalian', 'status_pengembalian', 'required|trim');


        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showPeminjaman();
        $data['users'] = $this->user_model->tampilUserSajaTambah();
        $data['barang'] = $this->barang_model->showBarangMember();
        // var_dump($this->form_validation->run($this->form_validation->run() == false));
        // die();


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kominfo Batu | Tambah Data peminjaman';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/peminjaman/tambah', $data);
            $this->load->view('templates/footer');
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
            redirect('admin/peminjaman/tambah', 'refresh');
            }
            else
            $this->peminjaman_model->tambahPeminjaman();
            
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambahkan ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/peminjaman', 'refresh');
        }
    }

    public function editPengembalian($id_peminjaman)
    {
        $this->load->library('form_validation');
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['peminjaman'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $this->form_validation->set_rules('status_pengembalian', 'status_pengembalian', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/peminjaman/status_pengembalian', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->peminjaman_model->getStokAdmin($id_peminjaman);
            // var_dump( $this->peminjaman_model->getStokAdmin($id_peminjaman));
            // die();
            $this->peminjaman_model->ubahStatusPengembalian();
       
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di ubah ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/peminjaman/pengembalianSukses', 'refresh');
        }
    }

    public function editPeminjaman()
    {
        $this->load->library('form_validation');
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['peminjaman'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $this->form_validation->set_rules('status_peminjaman', 'status_peminjaman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/peminjaman/status_peminjaman', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->peminjaman_model->ubahStatusPeminjaman();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi Peminjaman Berhasil Disetujui ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/peminjaman/peminjamanSukses', 'refresh');
        }
    }

    public function editPeminjamanTolak($id_peminjaman)
    {
        $this->load->library('form_validation');
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        // $data['peminjaman'] = $this->peminjaman_model->getPeminjaman($id_peminjaman);
        $this->form_validation->set_rules('status_peminjaman', 'status_peminjaman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/peminjaman/status_peminjaman', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->peminjaman_model->ubahStatusPeminjamanTolak();
            $this->peminjaman_model->getStok($id_peminjaman);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Transaksi Peminjaman di Tolak ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/peminjaman/peminjamanTolak', 'refresh');
        }
    }

    public function statusPengembalian()
    {
        $data['title'] = 'Kominfo Batu | Admin peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showStatusPengembalian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/status_pengembalian', $data);
        $this->load->view('templates/footer');
    }

    public function pengembalianSukses()
    {
        $data['title'] = 'Kominfo Batu | Admin peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showStatusPengembalianSukses();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/status_pengembalian_sukses', $data);
        $this->load->view('templates/footer');
    }

    public function statusPeminjaman()
    {
        $data['title'] = 'Kominfo Batu | Admin peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showStatusPeminjaman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/status_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function peminjamanSukses()
    {
        $data['title'] = 'Kominfo Batu | Admin peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showStatusPeminjamanSukses();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/status_peminjaman_sukses', $data);
        $this->load->view('templates/footer');
    }

    public function peminjamanTolak()
    {
        $data['title'] = 'Kominfo Batu | Admin peminjaman';
        $data['user'] = $this->user_model->getUser($this->session->userdata('email'));
        $data['peminjaman'] = $this->peminjaman_model->showStatusPeminjamanTolak();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman/status_peminjaman_tolak', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_peminjaman)
    {
        if ($this->peminjaman_model->hapuspeminjaman($id_peminjaman) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/peminjaman');
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
            redirect('admin/peminjaman', 'refresh');
        }
    }

}