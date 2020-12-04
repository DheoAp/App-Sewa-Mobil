<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_admin();
  }
  public function index()
  {
    $title["judul"] = "Dashboard - Admin";

    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/index');
    $this->load->view('templates_admin/footer');
  }

} // akhir class