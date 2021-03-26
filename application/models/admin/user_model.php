<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    //menampilkan user
    public function showUser($email)
    {
        $this->db->select('user.*, dinas.nama_dinas');
        $this->db->join('dinas', 'user.id_dinas = dinas.id_dinas');
        return $this->db->get('user', ['email' => $email])->result();
    }

    public function showUserAll()
    {
        $this->db->select('user.*, dinas.nama_dinas');
        $this->db->join('dinas', 'user.id_dinas = dinas.id_dinas');
        return $this->db->get('user')->result();
    }

    public function addUser($upload)
    {
        $data = [
            'id_user' => $this->input->post('user', true),
            'id_dinas' => $this->input->post('id_dinas', true),
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'no_telp' => $this->input->post('no_telp', true),
            'id_role' =>  2,
            'is_active' => 'aktif',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'date_created' => time(),
            'image' => $upload['file']['file_name'],
        ];
        $this->db->insert('user', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/images/profile';
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

    //menampilkan user session
    public function getUser($email)
    {
        $this->db->select('user.*, dinas.nama_dinas ,user_role.role' );
        $this->db->join('dinas', 'user.id_dinas = dinas.id_dinas');
        $this->db->join('user_role', 'user.id_role = user_role.id_role');
        return $this->db->get_where('user', ['email' => $email])->result();
    }
    
    //menampilkan user detail
    public function getUserDetail($id_user)
    {
        $this->db->select('user.*, dinas.nama_dinas,user_role.role');
        $this->db->join('dinas', 'user.id_dinas = dinas.id_dinas');
        $this->db->join('user_role', 'user.id_role = user_role.id_role');
        return $this->db->get_where('user', ['id_user' => $id_user])->result();
    }

    public function tampilUserSaja()
    {
        $usersaja = '2';
        $query = $this->db->order_by('id_user', 'DESC')->get_where('user', array('id_role' => $usersaja));
        return $query->result();
    }

    public function tampilUserSajaTambah()
    {
        $usersaja = '2';
        $query = $this->db->order_by('id_user', 'DESC')->get_where('user', array('id_role' => $usersaja, 'is_active' => 'aktif'));
        return $query->result();
    }

    public function hapususer($id_user)
    {
        $this->_deleteImage($id_user);
        $this->db->where('id_user', $id_user);
        if (
            $this->db->delete('user')
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahUser()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'is_active' => $this->input->post('is_active', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }
    
    public function getuserHapus($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row();
    }

    private function _deleteImage($id_user)
    {
        $user = $this->getuserHapus($id_user);
        $filename = $user->image;
        unlink(FCPATH . "assets/images/profile/" . $filename);
    }
}