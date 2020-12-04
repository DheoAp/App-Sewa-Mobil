<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_admin();
  }
  
  public function index()
  {

    $this->rules();

    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');

    if($this->form_validation->run() == false){
      $title["judul"] = "Laporan";
      $this->load->view('templates_admin/header',$title);
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/laporan');
      $this->load->view('templates_admin/footer');
    }else{
      $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tanggal_rental) >= '$dari' AND date(tanggal_rental) <= '$sampai'")->result();

      $title["judul"] = "Laporan";
      $this->load->view('templates_admin/header',$title);
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/tampil_laporan',$data);
      $this->load->view('templates_admin/footer');
    }
    
  }

  public function rules()
  {
    $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
    $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
  }

  public function print_laporan()
  {
   $dari = $this->input->get('dari');   
   $sampai = $this->input->get('sampai');   

   $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tanggal_rental) >= '$dari' AND date(tanggal_rental) <= '$sampai'")->result();

   $title["judul"] = "Print Laporan Transaksi";
  //  $this->load->view('templates_admin/header',$title);
   $this->load->view('admin/print_laporan',$data);


  }
} // akhir class