<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jumlah_transaksi'] = $this->Admin_model->jumlah_transaksi();
        $data['jumlah_customer'] = $this->Admin_model->jumlah_customer();
        $data['paket_rumah'] = $this->Admin_model->paket_rumah();
        $data['paket_hotel'] = $this->Admin_model->paket_hotel();
        // $data['jumlah_paket_rumah'] = $this->Admin_model->jumlah_paket_rumah();
        // $data['jumlah_paket_hotel'] = $this->Admin_model->jumlah_paket_hotel();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_ad');
    }

    public function paket()
    {
        $data['title'] = 'paket';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];

        $data['paket'] = $this->db->get('tbl_produk')->result_array();
        $data['produk'] = $this->db->get('tbl_kategori')->result_array();

        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');                // 2
        $this->form_validation->set_rules('rias_busana', 'rias_busana', 'required');                // 3
        $this->form_validation->set_rules('dekorasi_pelaminan', 'dekorasi_pelaminan', 'required');  // 4
        $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'required');                // 5
        $this->form_validation->set_rules('dekorasi_tenda', 'dekorasi_tenda', 'required');          // 6
        $this->form_validation->set_rules('support_acara', 'support_acara', 'required');            // 7
        $this->form_validation->set_rules('harga', 'harga', 'required');                            // 8
        $this->form_validation->set_rules('kategori', 'kategori', 'required');                       // 10

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_ad', $data);
            $this->load->view('templates/sidebar_ad', $data);
            $this->load->view('templates/topbar_ad', $data);
            $this->load->view('admin/paket', $data);
            $this->load->view('templates/footer_ad');
        } else {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'rias_busana' => $this->input->post('rias_busana'),
                'dekorasi_pelaminan' => $this->input->post('dekorasi_pelaminan'),
                'dokumentasi' => $this->input->post('dokumentasi'),
                'dekorasi_tenda' => $this->input->post('dekorasi_tenda'),
                'support_acara' => $this->input->post('support_acara'),
                'harga' => $this->input->post('harga'),
                'kategori' => $this->input->post('kategori')
            ];

            $this->db->insert('tbl_produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
            redirect('admin/paket');
        }
    }

    public function data_paket()
    {

        $data['title'] = 'Data Paket';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];

        $kategori = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['produk'] = $this->Keranjang_model->get_produk_kategori($kategori);
        // $data['kategori'] = $this->keranjang_model->get_kategori_all();

        // $data['menu'] = $this->db->get('Pemesanan')->result_array();

        // $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_ad', $data);
            $this->load->view('templates/sidebar_ad', $data);
            $this->load->view('templates/topbar_ad', $data);
            $this->load->view('admin/data_paket', $data);
            $this->load->view('templates/footer_ad');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
            redirect('admin/data_paket');
        }
    }

    public function tambah_data_paket()
    {

        $data['title'] = 'Data Paket';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];

        //  $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
        //  $data['produk'] = $this->Keranjang_model->get_produk_kategori($kategori);
        // $data['kategori'] = $this->keranjang_model->get_kategori_all();

        // $data['menu'] = $this->db->get('Pemesanan')->result_array();

        // $this->form_validation->set_rules('menu', 'Menu', 'required');

        //  if ($this->form_validation->run() == false) {
        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/tambah_data_paket', $data);
        $this->load->view('templates/footer_ad');
        //  } else {
        // $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
        // redirect('pemesanan');
        //  }       
    }

    public function transaksi()
    {
        $data['title'] = 'DaftarPemesan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pesanans'] = $this->Admin_model->pesanan()->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/transaksi', $data);
    }

    public function karyawan()
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['karyawans'] = $this->Admin_model->karyawans()->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer_ad');
    }

    public function regis()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registerd'

        ]);
        // is_unique[user.email]
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Midodaren';
            $this->load->view('templates/auth_header_2', $data);
            $this->load->view('admin/regis');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Mendaftar</div>');
            redirect('user/index');
        }
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'selamat datang ' . $data['user']['name'];


        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer_ad');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        // $data['user'] = $this->user->getUserData();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        // $data['role'] = $this->admin->getUserRoleById($role_id);
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();


        $this->db->where('id !=', 1);
        // $data['menu'] = $this->menu->getUserMenuAll();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header_ad', $data);
        $this->load->view('templates/sidebar_ad', $data);
        $this->load->view('templates/topbar_ad', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer_ad');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Access Changed! </div>');
    }

    public function editrole($role_id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->Admin_model->getUserRoleById($role_id);;

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_ad', $data);
            $this->load->view('templates/sidebar_ad', $data);
            $this->load->view('templates/topbar_ad', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $role_name = $this->input->post('role');
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);
            if ($user_role->num_rows() < 1) {
                $this->db->set('role', $role_name);
                $this->db->where('id', $role_id);
                $this->db->update('user_role');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Role Success!</div>');
                redirect('admin/role/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role name is exist or same!</div>');
                redirect('admin/editrole/' . $role_id);
            }
        }
    }

    public function deleterole($role_id)
    {
        $role = $this->Admin_model->getUserRoleById($role_id);

        $this->db->delete('user_role', ['id' => $role_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $role['role'] . ' role is deleted!</div>');
        redirect('admin/role');
    }
}
