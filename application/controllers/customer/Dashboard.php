<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_cs();
  }

  public function index()
  {
    $data['dataMobil'] = $this->rental_model->get_data('mobil')->result();
    $title['judul'] = "Home";
    $this->load->view('templates_customer/header',$title);
    $this->load->view('customer/dashboard',$data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_mobil($id)
  {
    $data['dataDetail'] = $this->rental_model->get_id_mobil($id);

    $title["judul"] = "Detail Mobil";
    $this->load->view('templates_customer/header',$title);
    $this->load->view('customer/detail_mobil',$data);
    $this->load->view('templates_customer/footer');
  }
  

} // akhir class