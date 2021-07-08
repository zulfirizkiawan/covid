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
        $data['status'] = $this->db->get('status_covid')->result_array();
        // validation
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jk', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status_id', 'Status_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_ad', $data);
            $this->load->view('templates/sidebar_ad', $data);
            $this->load->view('templates/topbar_ad', $data);
            $this->load->view('datamaster/index', $data);
            $this->load->view('templates/footer_ad', $data);
        } else {
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $nik = $this->input->post('nik');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $status_id = $this->input->post('status_id');

            // var_dump($nama, $jk, $nik, $tempat_lahir, $tgl_lahir, $alamat, $status_id);
            // die;
            $data = [
                'nama' => $nama,
                'jk' => $jk,
                'nik' => $nik,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'status_id' => $status_id
            ];

            $this->db->insert('datamaster', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
            redirect('datamaster/index');
            }
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
    public function editdata($data_id)
    {
        $data['title'] = 'Edit Data Positif Covid';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['datapositif'] = $this->db->get('datamaster')->result_array();
        // $data['positif'] = $this->db->get_where('datamaster', ['id' => $data_id])->row_array()
        $data['positif'] = $this->db->get_where('datamaster', ['id' => $data_id])->row_array();
        // var_dump($data);
        // die;
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status_id', 'Status', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_ad', $data);
            $this->load->view('templates/sidebar_ad', $data);
            $this->load->view('templates/topbar_ad', $data);
            $this->load->view('datamaster/edit-positif', $data);
            $this->load->view('templates/footer_ad', $data);
        } else {
            // $submenu_name = $this->input->post('nama');
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $nik = $this->input->post('nik');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $status_id = $this->input->post('status_id');

             $data_sub = [
                'nama' => $nama,
                'jk' => $jk,
                'nik' => $nik,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'status_id' => $status_id
            ];
            // var_dump($data_sub);
            // die;
            $this->db->set($data_sub);
            $this->db->where('id', $data_id);
            $this->db->update('datamaster');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Submenu Success!</div>');
            redirect('datamaster/index');
        }
    }
}
