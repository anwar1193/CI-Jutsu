<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paginationManual extends CI_Model {

	public function tampil_page($limit,$start){
		$result = $this->db->get('tbl_member', $limit, $start);
		return $result->result_array();
	}

	public function jumlah_data(){
		$result = $this->db->get('tbl_member');
		return $result->num_rows();
	}
}
