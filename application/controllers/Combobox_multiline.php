<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combobox_multiline extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_searchInputan','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$res_mhs = $this->M_searchInputan->ambil_mhs();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_combobox_multiline',array('row_mhs' => $res_mhs));
		$this->load->view('footer');
	}

}
