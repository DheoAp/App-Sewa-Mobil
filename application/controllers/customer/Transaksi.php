<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_cs();
  }

  public function index()
  {

    $customer = $this->session->userdata('id_customer');

    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr,mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND cs.id_customer='$customer' ORDER BY id_rental DESC")->result();

    $title["judul"] = "Transaksi";
    $this->load->view('templates_customer/header',$title);
    $this->load->view('customer/data_transaksi',$data);
    $this->load->view('templates_customer/footer');  
  }

  public function pembayaran($id)
  {
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr,mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND tr.id_rental='$id' ORDER BY id_rental DESC")->result();

    $title["judul"] = "Pembayaran";
    $this->load->view('templates_customer/header',$title);
    $this->load->view('customer/pembayaran',$data);
    $this->load->view('templates_customer/footer');  
  }
  public function pembayaran_aksi()
  {
    $id = $this->input->post('id_rental');
    $bukti_pembayaran     = $_FILES['bukti_pembayaran']['name'];
    if($bukti_pembayaran){
      $config ['upload_path'] = './assets/upload';
      $config ['allowed_types'] = 'jpg|png|jpeg';

      $this->load->library('upload',$config);
      
      if($this->upload->do_upload('bukti_pembayaran')){
        $bukti_pembayaran= $this->upload->data('file_name');
        $this->db->set('bukti_pembayaran',$bukti_pembayaran);
      }else{
        echo $this->upload->display_errors();
      }
    }
    $data = array(
      'bukti_pembayaran' => $bukti_pembayaran
    );

    $where = array (
      'id_rental' => $id
    );

    $this->rental_model->update_data('transaksi',$data,$where);
    $this->session->set_flashdata('pesan','Bukti berhasil diupload');
    redirect('customer/transaksi');
  }

  public function cetak_invoice($id)
  {
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr,mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND tr.id_rental='$id'")->result();
    $this->load->view('customer/cetak_invoice',$data);
  }

  public function batal_transaksi($id)
  {
    $where = array('id_rental' => $id);
    $data = $this->rental_model->get_where($where,'transaksi')->row();
    
    
    $where2 =array('id_mobil' =>$data->id_mobil);

    $data2 = array('status' => '1');

    $this->rental_model->update_data('mobil',$data2,$where2);
    $this->rental_model->delete_data($where,'transaksi');
    $this->session->set_flashdata('pesan','Pesan Berhasil di batalkan');
    redirect('customer/transaksi');
  }
} // akhir class