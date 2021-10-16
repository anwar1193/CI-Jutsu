<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud_standar extends CI_Model {

	public function tampil(){
		$result = $this->db->get('tbl_mhs');
		return $result->result_array();
	}

	public function simpan($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

	public function cek_ada($tbl,$nim){
		$result = $this->db->get_where($tbl,$nim);
		return $result->num_rows();
	}

	public function hapus($tbl,$id){
		$result = $this->db->delete($tbl,$id);
		return $result;
	}

	public function edit($tbl,$id){
		$result = $this->db->get_where($tbl,$id);
		return $result->row_array();
	}

	public function update($tbl,$data,$nim){
		$result = $this->db->update($tbl,$data,$nim);
		return $result;
	}

}
