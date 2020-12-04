<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller{


  public function rules()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[customer.email]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('no_telepon', 'No.Telepon', 'required|is_unique[customer.no_telepon]|numeric');
    $this->form_validation->set_rules('no_ktp', 'No.KTP', 'required|is_unique[customer.no_ktp]|numeric'); 
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
     
  }

  public function index()
  {

    $this->rules();
    
    if($this->form_validation->run() == false){
      $this->load->view('register');
    }else{
      $data = [
        'nama'       => htmlspecialchars($this->input->post('nama',true)),
        'email'      => htmlspecialchars($this->input->post('email',true)),
        'alamat'     => htmlspecialchars($this->input->post('alamat',true)),
        'gender'     => htmlspecialchars($this->input->post('gender',true)),
        'no_telepon' => htmlspecialchars($this->input->post('no_telepon',true)),
        'no_ktp'      => htmlspecialchars($this->input->post('no_ktp',true)),
        'password'   => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
        'role_id'    => '2'
      ];

      // Masukaan data ke dalam table customer
      $this->rental_model->insert_data($data,'customer');
      $this->session->set_flashdata('pesan','Berhasil Register, Silakan login.');
      redirect('auth/login');
    }

    
  }

} // akhir class