<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inedPopup extends CI_Model {

	public function tampil(){
		$result = $this->db->get('tbl_mhs');
		return $result->result_array();
	}

	public function simpan($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

	public function update($tbl,$data,$nim){
		$result = $this->db->update($tbl,$data,$nim);
		return $result;
	}

}
