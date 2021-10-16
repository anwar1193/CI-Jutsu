<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_selectBerelasi extends CI_Model {

	public function tampil_provinsi(){
		$this->db->select('*');
		$this->db->from('tbl_provinsi');
		$result = $this->db->get();
		return $result;
	}


	public function kabupaten($provId){

		$kabupaten="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('nama_kab','ASC');
		$kab = $this->db->get_where('tbl_kabupaten',array('id_prov'=>$provId));

		foreach ($kab->result_array() as $data ){
			$kabupaten.= "<option value='$data[id_kab]'>$data[nama_kab]</option>";
		}

		return $kabupaten;

	}

	public function kecamatan($kabId){

		$kecamatan="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('nama_kec','ASC');
		$kec = $this->db->get_where('tbl_kecamatan',array('id_kab'=>$kabId));

		foreach ($kec->result_array() as $data ){
			$kecamatan.= "<option value='$data[id_kec]'>$data[nama_kec]</option>";
		}

		return $kecamatan;

	}

}
