<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_searchInputan extends CI_Model {

	public function ambil_mhs(){
		$result = $this->db->get('tbl_mhs');
		return $result->result_array();
	}

	// INVOICE OTOMATIS PAKE ID DOANG
	public function no_invoice(){
		$result = $this->db->query('SELECT * FROM tbl_pembayaran ORDER BY no_invoice DESC LIMIT 0,1');
		return $result->row_array();
	}

	public function simpan($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

}
