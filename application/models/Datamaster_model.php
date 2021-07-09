<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamaster_model extends CI_Model
{
    public function status_positif()
	{
		$this->db->select('datamaster.*, status_covid.status AS status');
        $this->db->from('datamaster');
        $this->db->join('status_covid', 'datamaster.status_id = status_covid.id' );
        // $this->db->join('tbl_produk', 'tbl_detail_order.produk=tbl_produk.id_produk','left');
        $this->db->where('status_id', 1);
        
        return $this->db->get();
    }

    public function status_sembuh()
	{
		$this->db->select('datamaster.*, status_covid.status AS status');
        $this->db->from('datamaster');
        $this->db->join('status_covid', 'status_covid.id = datamaster.status_id' );
        // $this->db->join('tbl_produk', 'tbl_detail_order.produk=tbl_produk.id_produk','left');
        $this->db->where('status_id', 2);
        
        return $this->db->get();
    }

    public function status_meninggal()
	{
		$this->db->select('datamaster.*, status_covid.status AS status');
        $this->db->from('datamaster');
        $this->db->join('status_covid', 'status_covid.id = datamaster.status_id' );
        // $this->db->join('tbl_produk', 'tbl_detail_order.produk=tbl_produk.id_produk','left');
        $this->db->where('status_id', 3);
        
        return $this->db->get();
    }
    
    public function getsdelete($status_ids)
    {
        return $this->db->get_where('datamaster', ['id' => $status_ids])->row_array();
    }
}
