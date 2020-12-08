<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
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
}
