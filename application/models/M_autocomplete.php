<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_autocomplete extends CI_Model {

	public function get_prov($prov){
		$this->db->like('nama_prov', $prov, 'BOTH');
		$this->db->order_by('id_prov', 'asc');
		$this->db->limit(10);
		return $this->db->get('tbl_provinsi')->result();
	}
	
}
