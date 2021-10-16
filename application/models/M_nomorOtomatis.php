<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nomorOtomatis extends CI_Model {

	// Format NIK : KR2003250001
	public function nik_otomatis(){
		$result = $this->db->query(
			"SELECT MAX(MID(nik,9,4)) AS nik_otomatis
			FROM tbl_karyawan
			WHERE MID(nik,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')"
		);

		if($result->num_rows() > 0){
			$row = $result->row_array();
			$n = ((int)$row['nik_otomatis'] + 1);
			$no = sprintf("%'.04d", $n);
		}else{
			$no = "0001";
		}

		date_default_timezone_set("Asia/Jakarta");
		$nik = "KR".date('ymd').$no;
		return $nik;
	}

	public function simpan($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

}
