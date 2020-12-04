<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rental extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_cs();
  }
  
  public function tambah_rental($id)
  {
    $data['dataMobil'] = $this->rental_model->get_id_mobil($id);

    $title["judul"] = "Tambah Rental";
    $this->load->view('templates_customer/header',$title);
    $this->load->view('customer/tambah_rental',$data);
    $this->load->view('templates_customer/footer');
  }

  public function tambah_aksi_rental()
  {
    $id_customer = $this->session->userdata('id_customer');
    $id_mobil = $this->input->post('id_mobil');
    $tanggal_rental = $this->input->post('tanggal_rental');
    $tanggal_kembali = $this->input->post('tanggal_kembali');
    $denda = $this->input->post('denda');
    $harga = $this->input->post('harga');

    $data = array(
      'id_customer'           => $id_customer,
      'id_mobil'              => $id_mobil,
      'tanggal_rental'        => $tanggal_rental,
      'tanggal_kembali'       => $tanggal_kembali,
      'denda'                 => $denda,
      'harga'                 => $harga,
      'tanggal_pengembalian'  => '-',
      'status_rental'         => 'Belum Selesai',
      'status_pengembalian'   => 'Belum Kembali'
    );

    $this->rental_model->insert_data($data,'transaksi');

    $status  = array(
      'status' => '0'
    );

    $id = array(
      'id_mobil' => $id_mobil
    );
    $this->rental_model->update_data('mobil',$status,$id);

    $this->session->set_flashdata('pesan','Transaksi berhasil, silakan melakukan pembayaran');
      redirect('customer/data_mobil');
  }

} // akhir class