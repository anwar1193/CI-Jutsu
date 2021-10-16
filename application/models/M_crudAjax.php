<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crudAjax extends CI_Model {

	public function tampil($params = null){
		$this->db->select('*');
		$this->db->from('tbl_mhs');
		if($params != null){
			$this->db->where($params);
		}
		$result = $this->db->get();
		return $result;
	}

	public function simpan($post){
		$params = array(
			'nim' => $post['nim'],
			'nama' => $post['nama'],
			'alamat' => $post['alamat'],
			'no_telp' => $post['no_telp'],
			'tanggal_daftar' => $post['tanggal_daftar']
		);
		$this->db->insert('tbl_mhs', $params);
	}

	public function hapus($params = null){
		if($params != null){
			$this->db->where($params);
		}
		$this->db->delete('tbl_mhs');
	}

	public function update($post){
		$data = array(
			'nama' => $post['nama'],
			'alamat' => $post['alamat'],
			'no_telp' => $post['no_telp'],
			'tanggal_daftar' => $post['tanggal_daftar']
		);

		$this->db->where('nim', $post['nim']);
		$this->db->update('tbl_mhs', $data);
	}

}
