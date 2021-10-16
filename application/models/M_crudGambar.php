<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crudGambar extends CI_Model {

	public function tampil(){
		$result = $this->db->get('tbl_barang');
		return $result->result_array();
	}

	public function simpan($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

	public function update($tbl,$data,$id){
		$result = $this->db->update($tbl,$data,$id);
		return $result;
	}

	public function ambil_data($tbl,$id){
		$result = $this->db->get_where($tbl,$id);
		return $result->result_array(); //untuk penanda gambar, harus result_array
	}

	public function hapus($tbl,$id){
		$result = $this->db->delete($tbl,$id);
		return $result;
	}	

}
