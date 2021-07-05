<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sbadmin extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Login';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('sbadmin/login');
        $this->load->view('templates/auth_footer');
    }
}
