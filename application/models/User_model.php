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

    // public  function pesananU()
	// {
	// 	$this->db->select('tbl_detail_order.id,
    //     tbl_pelanggan.nama,
    //     tbl_pelanggan.email,
    //     tbl_pelanggan.telp,
    //     tbl_produk.nama_produk,
    //     tbl_order.tanggal,
    //     tbl_detail_order.harga');
	// 	$this->db->from('tbl_detail_order');
	// 	$this->db->join('tbl_order', 'tbl_detail_order.order_id=tbl_order.id','left');
	// 	$this->db->join('tbl_pelanggan', 'tbl_order.pelanggan=tbl_pelanggan.id','left');
	// 	$this->db->join('tbl_produk', 'tbl_detail_order.produk=tbl_produk.id_produk','left');
    //     $querys = $this->db->get();
    //     return $querys;

    // }

    public function karyawans()
	{
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        // $this->db->where('role_id', 1);
        
        return $this->db->get();
    }	
}
