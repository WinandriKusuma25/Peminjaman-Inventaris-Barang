<?php

defined('BASEPATH') or exit('No direct script access allowed');

class peminjaman_model extends CI_Model
{
    public function showPeminjaman()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        $this->db->order_by('id_peminjaman', 'DESC');
        return $this->db->get('peminjaman')->result();
    }

    public function showStatusPengembalian()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        return $this->db->get_where('peminjaman', ['status_pengembalian' => 'belum', 'status_peminjaman' => 'disetujui' ])->result();
    }

    public function showStatusPeminjaman()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        return $this->db->get_where('peminjaman', ['status_peminjaman' => 'diajukan'])->result();
    }

    public function showStatusPengembalianSukses()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        return $this->db->get_where('peminjaman', ['status_pengembalian' => 'sudah'])->result();
    }

    public function showStatusPeminjamanSukses()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        return $this->db->get_where('peminjaman', ['status_peminjaman' => 'disetujui'])->result();
    }

    public function showStatusPeminjamanTolak()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        return $this->db->get_where('peminjaman', ['status_peminjaman' => 'ditolak'])->result();
    }

    public function showPeminjamanMember($email)
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        return $this->db->get_where('peminjaman', ['email' => $email])->result();
    }


    public function tambahPeminjamanMember()
    {
        $data = [

            'id_peminjaman' => $this->input->post('id_peminjaman', true),
            'id_user'       =>$this->session->userdata('id_user'),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman', true),
            'tgl_kembali' => $this->input->post('tgl_kembali', true),
            'jumlah' => $this->input->post('jumlah', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status_peminjaman' => 'diajukan',
            'status_pengembalian' => 'belum',

        ];
        $this->db->insert('peminjaman', $data);

        $this->db->where('id_barang', $this->input->post('id_barang', true));
        $barang = $this->db->get('barang')->row();
        $stok = $barang->stok - $this->input->post('jumlah');

        $dataStok = array('stok' => $stok);
        $this->db->where('id_barang',  $this->input->post('id_barang', true));
        $this->db->update('barang', $dataStok);  
    }

    public function tambahPeminjaman(){
        $data = [
            'id_peminjaman' => $this->input->post('id_peminjaman', true),
            'id_user'       => $this->input->post('id_user', true),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman', true),
            'tgl_kembali' => $this->input->post('tgl_kembali', true),
            'jumlah' => $this->input->post('jumlah', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status_peminjaman' => $this->input->post('status_peminjaman', true),
            'status_pengembalian' => $this->input->post('status_pengembalian', true),
        ];
        $this->db->insert('peminjaman', $data);

        $this->db->where('id_barang', $this->input->post('id_barang', true));
        $barang = $this->db->get('barang')->row();
        $stok = $barang->stok - $this->input->post('jumlah');

        $dataStok = array('stok' => $stok);
        $this->db->where('id_barang',  $this->input->post('id_barang', true));
        $this->db->update('barang', $dataStok);  
    }

    public function getPeminjaman($id_peminjaman)
    {
        $this->db->select('peminjaman.*, user.name, barang.nama, barang.image ,dinas.nama_dinas');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        $this->db->join('dinas', 'user.id_dinas = dinas.id_dinas');
        return $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->result();
    }

    public function showPeminjamanLimit()
    {
        $this->db->select('peminjaman.*, user.name, barang.nama');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('barang', 'peminjaman.id_barang = barang.id_barang');
        $this->db->limit(3);
        $this->db->order_by('id_peminjaman', 'DESC');
        return $this->db->get('peminjaman')->result();
    }

    public function ubahStatusPengembalian(){
        $data =[

            "status_pengembalian" => $this ->input->post("status_pengembalian",true)
        ];
        $this->db->where('id_peminjaman',$this->input->post('id_peminjaman'));
        $this->db->update('peminjaman',$data);
    }

    public function ubahStatusPeminjaman(){
        $data =[
            "status_peminjaman" => $this ->input->post("status_peminjaman",true)
        ];
        $this->db->where('id_peminjaman',$this->input->post('id_peminjaman'));
        $this->db->update('peminjaman',$data);
    }

    public function ubahStatusPeminjamanTolak(){
        $data =[
            "status_peminjaman" => $this ->input->post("status_peminjaman",true),
            "status_pengembalian" => $this ->input->post("status_pengembalian",true)
        ];
        $this->db->where('id_peminjaman',$this->input->post('id_peminjaman'));
        $this->db->update('peminjaman',$data);
    }

    public function chartTransaksiPeminjaman($bulan)
    {
        $like = 'T-BM-' . date('y') . $bulan;
        $this->db->like('id_peminjaman', $like, 'after');
        return count($this->db->get('peminjaman')->result_array());
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function getStok($id_peminjaman)
    {
        $this->db->select('peminjaman.*');        
        $this->db->where('id_peminjaman', $id_peminjaman);
        $peminjaman = $this->db->get('peminjaman')->row();
        
        $this->db->where('id_barang', $peminjaman->id_barang);
        $barang = $this->db->get('barang')->row();
        $stok = $barang->stok + $peminjaman->jumlah;
        
        $dataStok = array('stok' => $stok);
        $this->db->where('id_barang',  $peminjaman->id_barang);
        $this->db->update('barang', $dataStok);    
    }

    public function getStokAdmin($id_peminjaman)
    {
        $this->db->select('peminjaman.*');        
        $this->db->where('id_peminjaman', $id_peminjaman);
        $peminjaman = $this->db->get('peminjaman')->row();
        
        $this->db->where('id_barang', $peminjaman->id_barang);
        $barang = $this->db->get('barang')->row();
        $stok = $barang->stok + $peminjaman->jumlah;
        
        $dataStok = array('stok' => $stok);
        $this->db->where('id_barang',  $peminjaman->id_barang);
        $this->db->update('barang', $dataStok);    
    }



    public function hapuspeminjaman($id_peminjaman)
    {
        $this->db->select('peminjaman.*');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->delete('peminjaman');
       
    }

    public function ubahPeminjaman()
    {
        $data = [
            'id_peminjaman' => $this->input->post('id_peminjaman', true),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman', true),
            'tgl_kembali' => $this->input->post('tgl_kembali', true),
            'jumlah' => $this->input->post('jumlah', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];
      

        $this->db->where('id_peminjaman', $this->input->post('id_peminjaman', true));
        $peminjaman = $this->db->get('peminjaman')->row();
        $JumlahBaru = $this->input->post('jumlah');

        if($JumlahBaru > $peminjaman->jumlah){
            $this->db->where('id_barang', $this->input->post('id_barang', true));
            $barang = $this->db->get('barang')->row();
            $stok = $barang->stok +  $peminjaman->jumlah - $this->input->post('jumlah');
    
            $dataStok = array('stok' => $stok);
            $this->db->where('id_barang',  $this->input->post('id_barang', true));
            $this->db->update('barang', $dataStok);
            
        }else if($JumlahBaru < $peminjaman->jumlah){
            $this->db->where('id_barang', $this->input->post('id_barang', true));
            $barang = $this->db->get('barang')->row();
            $stok = $barang->stok +  ($peminjaman->jumlah - $this->input->post('jumlah'));
    
            $dataStok = array('stok' => $stok);
            $this->db->where('id_barang',  $this->input->post('id_barang', true));
            $this->db->update('barang', $dataStok);
        }

        $this->db->where('id_peminjaman', $this->input->post('id_peminjaman'));
        $this->db->update('peminjaman', $data);   
        
    }

}