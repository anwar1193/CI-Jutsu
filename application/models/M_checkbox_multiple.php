<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_checkbox_multiple extends CI_Model {

	public function tampil_transaksi(){
		$result = $this->db->get('tbl_transaksi');
		return $result;
	}

	public function tampil_barang(){
		$result = $this->db->get('tbl_barang');
		return $result;
	}

	public function simpan($tbl, $data){
		$result = $this->db->insert($tbl, $data);
		return $result;
	}

	public function tampil_transaksi_no($tbl, $data){
		$result = $this->db->get_where($tbl, $data);
		return $result;
	}

	public function hapus($tbl, $where){
		$result = $this->db->delete($tbl, $where);
		return $result;
	}

}
