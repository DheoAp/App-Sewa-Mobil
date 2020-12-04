<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Data_type extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_admin();
  }
  public function index()
  { 
    $data["dataType"] = $this->rental_model->get_data('type')->result();

    $title["judul"] = "Data Type";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_type',$data);
    $this->load->view('templates_admin/footer');
  }

  public function rules()
  {
    $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
    $this->form_validation->set_rules('nama_type', 'Nama Type', 'required');
  }
  public function tambah_type()
  { 

    $data["dataType"] = $this->rental_model->get_data('type')->result();
    
    $title["judul"] = "Tambah Data Type";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/tambah_type',$data);
    $this->load->view('templates_admin/footer');  
  }
  public function tambah_type_aksi()
  {
    $this->rules();

    if($this->form_validation->run() == false){
      $this->tambah_type();
    }else{
      $kode_type  = $this->input->post('kode_type');
      $nama_type  = $this->input->post('nama_type');
      }
      // masukan data ke array
      $data = array(
        'kode_type' => $kode_type,
        'nama_type' => $nama_type
      );

      // Masukaan data ke dalam table type
      $this->rental_model->insert_data($data,'type');
      $this->session->set_flashdata('pesan','Data berhasil ditambahkan');
      redirect('admin/data_type');
  }

  public function update_type($id)
  {
    $where = array('id_type' => $id);
    
    $data['dataType'] = $this->db->query("SELECT * FROM type WHERE id_type='$id'")->result();

    $title["judul"] = "Update Type";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/update_type',$data);
    $this->load->view('templates_admin/footer');
  }
  public function update_type_aksi()
  {
    $this->rules();
    
    if($this->form_validation->run() == false){
      redirect('admin/update_type');
    }else{
      $id  = $this->input->post('id_type');
      $kode_type  = $this->input->post('kode_type');
      $nama_type  = $this->input->post('nama_type');
      
      // masukan data ke array
      $data = array(
        'kode_type' => $kode_type,
        'nama_type' => $nama_type,

      );
      $where = array(
        'id_type' => $id
      );

      // Masukaan data ke dalam table type
      $this->rental_model->update_data('type',$data,$where);
      $this->session->set_flashdata('pesan','Data berhasil diupdate');
      redirect('admin/data_type');
    }
  }

  public function delete_type($id)
  {
    $where = array('id_type' => $id);

    $this->rental_model->delete_data($where,'type');
    $this->session->set_flashdata('pesan_hapus','Data berhasil dihapus');
    redirect('admin/data_type');

  }

} // akhir class