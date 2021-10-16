<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input_looping extends CI_Model {

	public function simpan($tbl, $data){
		$result = $this->db->insert($tbl, $data);
		return $result;
	}

}
