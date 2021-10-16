<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_totalData extends CI_Model {

	public function tampil($params = null){
		$this->db->select('*');
		$this->db->from('tbl_pembayaran');
		if($params != null){
			$this->db->where($params);
		}
		$result = $this->db->get();
		return $result;
	}
	
}
