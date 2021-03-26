<?php

defined('BASEPATH') or exit('No direct script access allowed');

class barang_model extends CI_Model
{
    public function showBarang()
    {
        return $this->db->get('barang')->result();
    }

    
    public function showBarangMember()
    {
        // $barangMember = 0;
        // $query = $this->db->order_by('id_barang', 'DESC')->get_where('barang', array('stok' => $barangMember));
        $query =  $this->db->query ("SELECT * FROM barang WHERE stok > 0 ORDER BY stok");
        return $query->result();
      
    }

    public function showbarangOne($id_barang)
    {
        $this->db->select('barang.*');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->result();
    }

    public function addBarang($upload)
    {
        $data = [
            'id_barang' => $this->input->post('barang', true),
            'nama' => $this->input->post('nama', true),
            'stok' => $this->input->post('stok', true),
            // 'ketersedian' => $this->input->post('ketersedian', true),
            'image' => $upload['file']['file_name'],
        ];
        $this->db->insert('barang', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/barang';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function getBarang($id_barang)
    {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row();
    }

    private function _deleteImage($id_barang)
    {
        $barang = $this->getBarang($id_barang);
        $filename = $barang->image;
        unlink(FCPATH . "assets/images/barang/" . $filename);
    }

    public function hapusbarang($id_barang)
    {
        $this->_deleteImage($id_barang);
        $this->db->where('id_barang', $id_barang);
        if (
            $this->db->delete('barang')
        ) {
            return true;
        } else {
            return false;
        }
    }

    
    
    // public function FieldCount(){
    //     $query = $this->db->query("SELECT id_barang FROM peminjaman GROUP BY id_barang ORDER BY COUNT(id_barang) DESC LIMIT 1 ");
    //     return $query->result();
    // }


}