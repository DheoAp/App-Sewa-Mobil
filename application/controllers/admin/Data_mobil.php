<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_mobil extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    akses_login_admin();
  }

  public function index()
  {
    $title["judul"] = "Data Mobil";
    $data['dataMobil'] = $this->rental_model->get_data('mobil')->result();
    $data['dataType'] = $this->rental_model->get_data('type')->result();

    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_mobil',$data);
    $this->load->view('templates_admin/footer');
  }

  public function rules()
  {
    $this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
    $this->form_validation->set_rules('merk', 'Merk', 'required');
    $this->form_validation->set_rules('no_plat', 'No.plat', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    $this->form_validation->set_rules('warna', 'Warna', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    $this->form_validation->set_rules('denda', 'denda', 'required');
    $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
  }

  public function tambah_mobil()
  {
    $title["judul"] = "Tambah Mobil";
    $data['dataType'] = $this->rental_model->get_data('type')->result();

    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/tambah_mobil',$data);
    $this->load->view('templates_admin/footer');
  }
  public function tambah_mobil_aksi()
  {
    $this->rules();

    if($this->form_validation->run() == false){
      $this->tambah_mobil();
    }else{
      $kode_type  = $this->input->post('kode_type');
      $merk  = $this->input->post('merk');
      $no_plat    = $this->input->post('no_plat');
      $warna      = $this->input->post('warna');
      $tahun      = $this->input->post('tahun');
      $status      = $this->input->post('status');
      $harga      = $this->input->post('harga');
      $denda      = $this->input->post('denda');
      $kapasitas  = $this->input->post('kapasitas');
      $gambar     = $_FILES['gambar']['name'];
      if($gambar=''){}else{
        $config ['upload_path'] = './assets/upload';
        $config ['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']             = 2400; // Dalam KB
        $config['max_width']            = 2024;
        $config['max_height']           = 2024;

        $this->load->library('upload',$config);
        // jika gagal di upload
        if(!$this->upload->do_upload('gambar')){
          echo "Gambar mobil gagal diupload";
        }else{
          $gambar = $this->upload->data('file_name');
        }
      }
      // masukan data ke array
      $data = array(
        'kode_type' => $kode_type,
        'merk'      => $merk,
        'no_plat'   => $no_plat,
        'tahun'     => $tahun,
        'warna'     => $warna,
        'status'    => $status,
        'harga'     => $harga,
        'denda'     => $denda,
        'kapasitas' => $kapasitas,
        'gambar'    => $gambar
      );

      // Masukaan data ke dalam table mobil
      $this->rental_model->insert_data($data,'mobil');
      $this->session->set_flashdata('pesan','Data berhasil ditambahkan');
      redirect('admin/data_mobil');
    }
  }

  public function update_mobil($id)
  {
    $where = array('id_mobil' => $id);
    $data['dataMobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_mobil='$id'")->result();
    $data['dataType'] = $this->rental_model->get_data('type')->result();

    $title["judul"] = "Update Mobil";

    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/Update_mobil',$data);
    $this->load->view('templates_admin/footer');
  }
  public function update_mobil_aksi()
  {
    $this->rules();
    
    if($this->form_validation->run() == false){
      redirect('admin/update_mobil');
    }else{
      $id_mobil   = $this->input->post('id_mobil');
      $kode_type  = $this->input->post('kode_type');
      $merk       = $this->input->post('merk');
      $no_plat    = $this->input->post('no_plat');
      $warna      = $this->input->post('warna');
      $tahun      = $this->input->post('tahun');
      $status     = $this->input->post('status');
      $harga      = $this->input->post('harga');
      $denda      = $this->input->post('denda');
      $kapasitas  = $this->input->post('kapasitas');
      $gambar     = $_FILES['gambar']['name'];
      if($gambar){
        $config ['upload_path'] = './assets/upload';
        $config ['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload',$config);
        
        if($this->upload->do_upload('gambar')){
          $gambar= $this->upload->data('file_name');
          $this->db->set('gambar',$gambar);
        }else{
          echo $this->upload->display_errors();
        }
      } 
      // masukan data ke array
      $data = array(
        'kode_type' => $kode_type,
        'merk'      => $merk,
        'no_plat'   => $no_plat,
        'tahun'     => $tahun,
        'warna'     => $warna,
        'status'    => $status,
        'harga'     => $harga,
        'denda'     => $denda,
        'kapasitas' => $kapasitas
      );
      $where = array(
        'id_mobil' => $id_mobil
      );

      // Masukaan data ke dalam table mobil
      $this->rental_model->update_data('mobil',$data,$where);
      $this->session->set_flashdata('pesan','Data berhasil diupdate');
      redirect('admin/data_mobil');
    }
  }

  public function detail_mobil($id)
  {
    $data['dataDetail'] = $this->rental_model->get_id_mobil($id);

    $title["judul"] = "Detail Mobil";
    $this->load->view('templates_admin/header',$title);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_mobil',$data);
    $this->load->view('templates_admin/footer');
  }

  public function delete_mobil($id)
  {
    $where = array('id_mobil' => $id);

    $this->rental_model->delete_data($where,'mobil');
    $this->session->set_flashdata('pesan_hapus','Data berhasil dihapus');
    redirect('admin/data_mobil');

  }

} // akhir class