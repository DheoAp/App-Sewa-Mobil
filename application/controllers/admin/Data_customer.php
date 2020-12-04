<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_customer extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_admin();
  }
  
  public function index()
  {
    $data['dataCustomer'] = $this->rental_model->get_data('customer')->result();

    $title["judul"] = "Data Customer";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_customer',$data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_customer()
  {
    $title["judul"] = "Tambah Data Customer";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/tambah_customer');
    $this->load->view('templates_admin/footer');
  }

  public function rules()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'username', 'required|is_unique[customer.username]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('no_telepon', 'No.Telepon', 'required|is_unique[customer.no_telepon]|numeric|min_length[10]|max_length[13]');
    $this->form_validation->set_rules('no_ktp', 'No.KTP', 'required|is_unique[customer.no_ktp]|numeric|min_length[16]|max_length[16]'); 
    $this->form_validation->set_rules('password', 'Password', 'required'); 
  }

  public function tambah_aksi()
  {
    $this->rules();

    if($this->form_validation->run() == false){
      $this->tambah_customer();
    }else{
      $nama       = $this->input->post('nama');
      $username   = $this->input->post('username');
      $alamat     = $this->input->post('alamat');
      $gender     = $this->input->post('gender');
      $no_telepon = $this->input->post('no_telepon');
      $no_ktp      = $this->input->post('no_ktp');
      $password    = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

      // masukan data ke array
      $data = array(
        'nama'       => $nama,
        'username'   => $username,
        'alamat'     => $alamat,
        'gender'     => $gender,
        'no_telepon' => $no_telepon,
        'no_ktp'     => $no_ktp,
        'password'   => $password,
      );

      // Masukaan data ke dalam table customer
      $this->rental_model->insert_data($data,'customer');
      $this->session->set_flashdata('pesan','Data berhasil ditambahkan');
      redirect('admin/data_customer');
    }
  }

  public function update_customer($id)
  {
    $where = array('id_customer' => $id);
    
    $data['dataCustomer'] = $this->db->query("SELECT * FROM customer WHERE id_customer='$id'")->result();

    $title["judul"] = "Update Customer";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/update_customer',$data);
    $this->load->view('templates_admin/footer');
  }
  public function update_aksi()
  {
    $this->rules();
    
    if(!$this->form_validation->run() == false){
      // $this->update_customer();
      $this->session->set_flashdata('pesan_gagal','Data gagal diupdate! coba lagi.');
      redirect('admin/data_customer');
    }else{
      $id_customer  = $this->input->post('id_customer');
      $nama         = $this->input->post('nama');
      $username     = $this->input->post('username');
      $alamat       = $this->input->post('alamat');
      $gender       = $this->input->post('gender');
      $no_telepon   = $this->input->post('no_telepon');
      $no_ktp       = $this->input->post('no_ktp');
      
      // masukan data ke array
      $data = array(
        'nama' => $nama,
        'username' => $username,
        'alamat' => $alamat,
        'gender' => $gender,
        'no_telepon' => $no_telepon,
        'no_ktp' => $no_ktp,

      );
      $where = array(
        'id_customer' => $id_customer
      );

      // Masukaan data ke dalam table customer
      $this->rental_model->update_data('customer',$data,$where);
      $this->session->set_flashdata('pesan','Data berhasil diupdate');
      redirect('admin/data_customer');
    }
  }

  public function delete_customer($id)
  {
    $where = array('id_customer' => $id);

    $this->rental_model->delete_data($where,'customer');
    $this->session->set_flashdata('pesan_hapus','Data berhasil dihapus');
    redirect('admin/data_customer');

  }

} // akhir class