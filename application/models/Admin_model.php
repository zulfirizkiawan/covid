<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{ 
    public function getUserRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }
    
    

    
    public function getUserRoleAll()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function searchUserData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }
 
    // public function pesanan()
	// {
	// 	$this->db->select('tbl_detail_order.id,
    //     tbl_produk.nama_produk,
    //     tbl_pelanggan.nama,
    //     tbl_pelanggan.telp,
    //     tbl_order.tanggal,
    //     tbl_detail_order.harga');
	// 	$this->db->from('tbl_detail_order');
	// 	$this->db->join('tbl_produk', 'tbl_detail_order.produk=tbl_produk.id_produk','left');
	// 	$this->db->join('tbl_order', 'tbl_detail_order.order_id=tbl_order.id','left');
	// 	$this->db->join('tbl_pelanggan', 'tbl_order.pelanggan=tbl_pelanggan.id','left');
    //     $querys = $this->db->get();
    //     return $querys;
    // }	

    public function karyawans()
	{
		$this->db->select('user.*, user_role.role AS role');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        // $this->db->where('role_id', 1);
        
        return $this->db->get();
    }

    public function get_produk_kategori($kategori)
	{
		if($kategori>0)
			{
				$this->db->where('kategori',$kategori);
			}
		$query = $this->db->get('tbl_produk');
		return $query->result_array();
	}
    
    
    // Dashboard
    function jumlah_positif()
    {
        $this->db->select('*');
        $this->db->from('datamaster');
        $this->db->where('status_id', 1);
        
        return $this->db->get()->num_rows();
    }
    
    function jumlah_sembuh()
    {
        $this->db->select('*');
        $this->db->from('datamaster');
        $this->db->where('status_id', 2);
        
        return $this->db->get()->num_rows();
    }

    function jumlah_meninggal()
    {
        $this->db->select('*');
        $this->db->from('datamaster');
        $this->db->where('status_id', 3);
        
        return $this->db->get()->num_rows();
    }

    function jumlah_semua()
    {
        $this->db->select('*');
        $this->db->from('datamaster');
        // $this->db->where('status_id');
        
        return $this->db->get()->num_rows();
    }
}

