<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Users Data
    public function getUserData()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }
    public function getUserDataAll()
    {
        $query = $this->db->get('data_pegawai');
        return $query->result_array();
    }

    // Login
    public function userCheckLogin($username)
    {
        $this->db->where("email =  '$username' or username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function karyawans()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        // $this->db->where('role_id', 1);

        return $this->db->get();
    }

    public function getsdelete($status_ids)
    {
        return $this->db->get_where('user', ['id' => $status_ids])->row_array();
    }
}
