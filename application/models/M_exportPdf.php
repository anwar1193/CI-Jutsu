<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_exportPdf extends CI_Model {

	public function tampil(){
		$result = $this->db->get('tbl_mhs');
		return $result->result_array();
	}

}
