<?php

defined('BASEPATH') or exit('No direct script access allowed');

class dinas_model extends CI_Model
{
    public function showDinas()
    {
        return $this->db->get('dinas')->result();
    }

    public function tambahDinas()
    {
        $data = [
            'id_dinas' => $this->input->post('id_dinas', true),
            'nama_dinas' => $this->input->post('nama_dinas', true),
        ];
        $this->db->insert('dinas', $data);
    }
    public function ubahdinas()
    {
        $data = [
            'id_dinas' => $this->input->post('id_dinas', true),
            'nama_dinas' => $this->input->post('nama_dinas', true),

        ];
        $this->db->where('id_dinas', $this->input->post('id_dinas'));
        $this->db->update('dinas', $data);
    }
    public function showdinasOne($id_dinas)
    {
        $this->db->select('dinas.*');
        $this->db->where('id_dinas', $id_dinas);
        return $this->db->get('dinas')->result();
    }

    // public function hapusdinas($id_dinas)
    // {
    //     $this->db->where('id_dinas', $id_dinas);
    //     $this->db->delete('dinas');
    // }

    public function hapusdinas($id_dinas)
    {
        $this->db->where('id_dinas', $id_dinas);
        if (
            $this->db->delete('dinas')
        ) {
            return true;
        } else {
            return false;
        }
    }
}