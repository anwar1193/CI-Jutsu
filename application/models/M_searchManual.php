<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_searchManual extends CI_Model {

	public function tampil(){
		$result = $this->db->get('tbl_mhs');
		return $result->result_array();
	}

	public function tampil_cari($cari){
		$this->db->select('*');
		$this->db->from('tbl_mhs');
		$this->db->like('nim', $cari);
		$this->db->or_like('nama', $cari);
		$this->db->or_like('alamat', $cari);

		$result = $this->db->get();
		return $result->result_array();
	}

}
