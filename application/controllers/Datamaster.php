<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamaster extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Datamaster_model');
        // $this->load->model('User_model','user');
    }
    public function index()
    {
        $data['title'] = 'Kasus';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['positif'] = $this->Datamaster_model->status_positif()->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('datamaster/index', $data);
        $this->load->view('templates/footer_ad');
    }

    public function sembuh()
    {
        $data['title'] = 'Kasus';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sembuh'] = $this->Datamaster_model->status_sembuh()->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('datamaster/sembuh', $data);
        $this->load->view('templates/footer_ad');
    }

    public function meninggal()
    {
        $data['title'] = 'Kasus';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['meninggal'] = $this->Datamaster_model->status_meninggal()->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('datamaster/meninggal', $data);
        $this->load->view('templates/footer_ad');
    }
}
