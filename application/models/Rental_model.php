<?php
  defined('BASEPATH') or exit('No direct script access allowed');
  class Rental_model extends CI_Model{
  
    public function get_data($table)
    {
      return $this->db->get($table);
    }

    public function get_where($where,$table)
    {
      return $this->db->get_where($table,$where);
    }

    public function insert_data($data,$table)
    {
      $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where)
    {
      $this->db->update($table,$data,$where);
    }

    public function getByEmail($email)
    {
      return $this->db->get_where('customer',['email'=>$email])->row_array();
    }
    
    public function role_akses()
    {
      return $this->session->userdata('role_id');
    }

    // Data Mobil
    public function get_id_mobil($id)
    {
      $hasil = $this->db->where('id_mobil',$id)->get('mobil');

      if($hasil->num_rows() > 0){
        return $hasil->result();
      }else{
        return false;
      }
    }    
    public function delete_data($where,$table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }

    public function cek_login()
    {
      $username = set_value('username');
      $password = set_value('password');
      
      $result = $this->db 
                          ->where('username', $username)
                          ->where('password',md5($password))
                          ->limit(1) /* Data yang di ambil hanya 1 saja */
                          ->get('customer');
      if ($result->num_rows() > 0) {
        return $result->row(); /* Ambil satu baris saja */
      }else{
        return FALSE;
      }

    }

    public function update_password($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }
    
    public function downloadPembayaran($id)
    {
      $query = $this->db->get_where('transaksi',array('id_rental' => $id));
      return $query->row_array();
    }


  }//akhir class