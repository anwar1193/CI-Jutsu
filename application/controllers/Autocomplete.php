<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

	public function __construct(){
		// Tambah komentar
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_header','M_autocomplete'));
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_autocomplete');
		$this->load->view('footer');
	}

	public function proses(){
		if(isset($_GET['term'])){
			$result = $this->M_autocomplete->get_prov($_GET['term']);
			if(count($result) > 0){
				foreach ($result as $row)
					$result_array[] = $row->nama_prov;
					echo json_encode($result_array);
			}
		}
	}
}
