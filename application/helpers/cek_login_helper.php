<?php
  
  function cek_login()
  {
    $ci = get_instance();
    if(!$ci->session->userdata('email')){    
      $ci->session->set_flashdata('login','Login terlebih dahulu');
      redirect('auth/login');
    }
 
  }

  function akses_login_admin()
  {
    $ci = get_instance();

    $ci->load->model('Rental_model');
    if($ci->Rental_model->role_akses() !=1){
      redirect('auth/block');
    }
  }

  function akses_login_cs()
  {
    $ci = get_instance();

    $ci->load->model('Rental_model');
    if($ci->Rental_model->role_akses() !=2){
      redirect('admin/dashboard');
    }
  }