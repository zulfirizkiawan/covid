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

        // $this->load->view('templates/header_ad', $data);
        // $this->load->view('templates/sidebar_ad', $data);
        // $this->load->view('templates/topbar_ad', $data);
        // $this->load->view('datamaster/index', $data);
        // $this->load->view('templates/footer_ad');
        // $this->load->model('Menu_model', 'menu');
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
        $this->load->view('datamaster/index', $data);
        $this->load->view('templates/footer_ad');
        $this->load->model('Menu_model', 'menu');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status_id' => $this->input->post('status_id'),
                'jk' => $this->input->post('jk')
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

        // $this->load->view('templates/header_ad', $data);
        // $this->load->view('templates/sidebar_ad', $data);
        // $this->load->view('templates/topbar_ad', $data);
        // $this->load->view('datamaster/sembuh', $data);
        // $this->load->view('templates/footer_ad');
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
            $this->load->view('datamaster/sembuh', $data);
            // $this->load->view('templates/footer_ad');
        $this->load->view('templates/footer_ad');
        $this->load->model('Menu_model', 'menu');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status_id' => $this->input->post('status_id'),
                'jk' => $this->input->post('jk')
            ];
            $this->db->insert('datamaster', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
            redirect('datamaster/sembuh');
        }
    }

    public function meninggal()
    {
        $data['title'] = 'Kasus';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['meninggal'] = $this->Datamaster_model->status_meninggal()->result_array();

        // $this->load->view('templates/header_ad', $data);
        // $this->load->view('templates/sidebar_ad', $data);
        // $this->load->view('templates/topbar_ad', $data);
        // $this->load->view('datamaster/meninggal', $data);
        // $this->load->view('templates/footer_ad');
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
        $this->load->view('datamaster/meninggal', $data);
        // $this->load->view('templates/footer_ad');
        $this->load->view('templates/footer_ad');
        $this->load->model('Menu_model', 'menu');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status_id' => $this->input->post('status_id'),
                'jk' => $this->input->post('jk')
            ];
            $this->db->insert('datamaster', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
            redirect('datamaster/meninggal');
        }
    }
    public function total()
    {
        $data['title'] = 'Kasus';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['positif'] = $this->Datamaster_model->total()->result_array();

        // $this->load->view('templates/header_ad', $data);
        // $this->load->view('templates/sidebar_ad', $data);
        // $this->load->view('templates/topbar_ad', $data);
        // $this->load->view('datamaster/index', $data);
        // $this->load->view('templates/footer_ad');
        // $this->load->model('Menu_model', 'menu');
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
        $this->load->view('datamaster/total', $data);
        $this->load->view('templates/footer_ad');
        $this->load->model('Menu_model', 'menu');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status_id' => $this->input->post('status_id'),
                'jk' => $this->input->post('jk')
            ];
            $this->db->insert('datamaster', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
            redirect('datamaster/total');
        }
    }
    // public function editdatamaster($datamaster_id)
    // {
    //     $data['title'] = 'Edit Data';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['positif'] = $this->db->get_where('datamaster', ['id' => $datamaster_id])->row_array();

    //     $this->form_validation->set_rules('nama', 'Nama', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header_ad', $data);
    //         $this->load->view('templates/sidebar_ad', $data);
    //         $this->load->view('templates/topbar_ad', $data);
    //         $this->load->view('datamaster/edit-positif', $data);
    //         $this->load->view('templates/footer_ad');
    //     } else {
    //         $menu_name = $this->input->post('nama');
    //         $getMenu = $this->db->get_where('datamaster', ['nama' => $menu_name]);

    //         if ($getMenu->num_rows() < 1) {
    //             $this->db->set('nama', $menu_name);
    //             $this->db->where('id', $datamaster_id);
    //             $this->db->update('datamaster');
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Menu Success!</div>');
    //             redirect('datamaster');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Menu name is exist or same!</div>');
    //             redirect('datamaster/editdatamaster/' . $datamaster_id);
    //         }
    //     }
    // }
    public function editdata($data_id)
    {
        $data['title'] = 'Edit Data Positif Covid';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datapositif'] = $this->db->get('datamaster')->result_array();
        $data['positif'] = $this->db->get_where('datamaster', ['id' => $data_id])->row_array();

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
            $submenu_name = $this->input->post('nama');
            $data_sub = [
                'nama' => $submenu_name,
                'alamat' => $this->input->post('alamat'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status_id' => $this->input->post('status_id'),
                'jk' => $this->input->post('jk')
            ];
            $this->db->set($data_sub);
            $this->db->where('id', $data_id);
            $this->db->update('datamaster');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Submenu Success!</div>');
            redirect('datamaster/meninggal');
        }
    }
    
    public function deletedata($data_id)
    {
        $data = $this->db->get_where('datamaster', ['id' => $data_id])->row_array();

        $this->db->delete('datamaster', ['id' => $data_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $data['nama'] . ' is deleted!</div>');
        redirect('datamaster/meninggal');
    }
}
