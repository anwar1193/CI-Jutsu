<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_view2Table extends CI_Model {

	// Versi Query Biasa
	public function tampil_gabung(){
		$result = $this->db->query("
			SELECT 
				tbl_pembayaran.tanggal_bayar, 
				tbl_mhs.nim, 
				tbl_mhs.nama, 
				tbl_mhs.alamat, 
				tbl_mhs.no_telp, 
				tbl_pembayaran.jumlah_bayar
			FROM tbl_mhs LEFT JOIN tbl_pembayaran ON tbl_mhs.nim = tbl_pembayaran.nim
		");
		return $result->result_array();
	}

	// Untuk join dengan banyak table, sudah ada contoh nya di Aplikasi POS (stockIn)
	
}
