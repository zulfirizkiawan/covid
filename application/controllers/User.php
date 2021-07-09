<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('User_model');
      $this->load->model('Admin_model');
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

   public function karyawan()
   {
      $data['title'] = 'Management User';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      $data['karyawans'] = $this->Admin_model->karyawans()->result_array();
      // $this->form_validation->set_rules('role', 'Role Name', 'required');


      $this->load->view('templates/header_ad', $data);
      $this->load->view('templates/sidebar_ad', $data);
      $this->load->view('templates/topbar_ad', $data);
      $this->load->view('user/karyawan', $data);
      $this->load->view('templates/footer_ad');
   }

   public function regis()
   {

      $this->form_validation->set_rules('name', 'Name', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
         'is_unique' => 'This email has already registerd'

      ]);
      // is_unique[user.email]
      $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]', [
         'matches' => 'Password dont match',
         'min_length' => 'Password to short'
      ]);
      // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Management User';
         $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();

         $data['karyawans'] = $this->Admin_model->karyawans()->result_array();
         // $this->form_validation->set_rules('role', 'Role Name', 'required');


         $this->load->view('templates/header_ad', $data);
         $this->load->view('templates/sidebar_ad', $data);
         $this->load->view('templates/topbar_ad', $data);
         $this->load->view('user/karyawan', $data);
         $this->load->view('templates/footer_ad');
      } else {
         $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
         ];

         $this->db->insert('user', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Mendaftar</div>');
         redirect('user/karyawan');
      }
   }

   public function deletekaryawan($status_ids)
   {
      $role = $this->User_model->getsdelete($status_ids);

      $this->db->delete('user', ['id' => $status_ids]);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $role['name'] . ' data is deleted!</div>');
      redirect('user/karyawan');
   }
}
