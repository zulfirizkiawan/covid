<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('User_model');
   }

   public function index()
   {
      $data['title'] = 'My Profile';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      // echo 'selamat datang ' . $data['user']['name'];

      $this->load->view('templates/header_ad', $data);
      $this->load->view('templates/sidebar_ad', $data);
      $this->load->view('templates/topbar_ad', $data);
      $this->load->view('profile/index', $data);
      $this->load->view('templates/footer_ad');
   }

   // public function paket()
   // {
   //    $data['title'] = 'paket';
   //    $data['user'] = $this->db->get_where('user', ['email' =>
   //    $this->session->userdata('email')])->row_array();
   //    // echo 'selamat datang ' . $data['user']['name'];

   //    $data['userp'] = $this->db->get('tbl_produk')->result_array();

   //    $this->form_validation->set_rules('paket', 'User', 'required');

   //    if ($this->form_validation->run() == false) {
   //       $this->load->view('templates/header_ad', $data);
   //       $this->load->view('templates/sidebar_ad', $data);
   //       $this->load->view('templates/topbar_ad', $data);
   //       $this->load->view('user/paket', $data);
   //       $this->load->view('templates/footer_ad',);
   //    } else {
   //       $this->db->insert('tbl_paket', ['userp' => $this->input->post('paket')]);
   //       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
   //       redirect('user/paket');
   //    }
   // }


   public function edit()
   {
      $data['title'] = 'Edit Profile';
      // model
      // $data['user'] = $this->user->getUserData();

      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('name', 'Name', 'trim|required');
      // $this->form_validation->set_rules('username', 'Username', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header_ad', $data);
         $this->load->view('templates/sidebar_ad', $data);
         $this->load->view('templates/topbar_ad', $data);
         $this->load->view('profile/edit', $data);
         $this->load->view('templates/footer_ad');
      } else {
         $name = $this->input->post('name');
         // $username = $this->input->post('username');
         $email = $this->input->post('email');

         // cek jika gambar diubah
         $upload_img = $_FILES['image']['name'];

         if ($upload_img) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
               $old_img = $data['user']['image'];
               if ($old_img != 'default.jpg') {
                  unlink(FCPATH . 'assets/img/profile/' . $old_img);
               }
               $new_img = $this->upload->data('file_name');
               $this->db->set('image', $new_img);
            } else {
               echo $this->upload->display_errors();
            }
         }

         $this->db->set([
            'name' => $name,
            // 'username' => $username
         ]);
         $this->db->where('email', $email);
         $this->db->update('user');

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
         redirect('user');
      }
   }

   public function detail_pesanan()
   {
       $data['title'] = 'Detail Pesanan';
       $data['user'] = $this->db->get_where('user', ['email' =>
       $this->session->userdata('email')])->row_array();
      
       $data['pesananu'] = $this->User_model->pesananU()->result_array();
      

       $this->load->view('templates/header_ad', $data);
       $this->load->view('templates/sidebar_ad', $data);
       $this->load->view('templates/topbar_ad', $data);
       $this->load->view('user/detailpemesanan', $data);
       $this->load->view('templates/footer_ad');
   }

}
