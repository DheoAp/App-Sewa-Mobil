<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

  // public function rules()
  // {
  //   $this->form_validation->set_rules('username', 'Username', 'required|trim');
  //   $this->form_validation->set_rules('password', 'Password', 'required|trim'); 
  // }

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if($this->form_validation->run() == false){
      $this->load->view('login');
    }else{
      $this->_login();
    }
  }
  
  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->rental_model->getByEmail($email);

    if($user){
      // Jika email(akun) sudah terdaftar
      if(password_verify($password,$user['password'])){
        $data =[
          'nama' => $user['nama'],
          'email' => $user['email'],
          'role_id' => $user['role_id'],
        ];
        $this->session->set_userdata($data);
        if($user['role_id'] == 1){
          redirect('admin/dashboard');
        }else{
          redirect('customer/dashboard');
        }        
      }else{
        $this->session->set_flashdata('salah_password','Password yang anda masukan salah.');
        redirect('auth/login');
      }
    }else{
      // Jika Email(akun) belum terdaftar
      $this->session->set_flashdata('gagal_login','Email belum terdaftar.');
      redirect('auth/login');
    }
  }


  public function ganti_password()
  {
      $title['judul'] = "Ganti password";
      $this->load->view('templates_admin/header',$title);
      $this->load->view('ganti_password');
      $this->load->view('templates_admin/footer');
  }
  public function ganti_password_aksi()
  {
    $pass_baru = $this->input->post('pass_baru');
    $ulang_pass = $this->input->post('ulang_pass');

    $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
    $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

    if($this->form_validation->run() != false){
      $data = array('password' => md5($pass_baru));
      $id = array('id_customer' => $this->session->userdata('id_customer'));

      $this->rental_model->update_password($id,$data,'customer');
      $this->session->set_flashdata('pesan','password berhasil di ganti');
      redirect('auth/login');
    }else{
      $this->ganti_password();
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login');
  }

  public function block()
  {
    $this->load->view('403');
  }


} // akhir class