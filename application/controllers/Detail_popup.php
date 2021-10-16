<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_popup extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_detailPopup','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_detailPopup->tampil();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_detailPopup',array('row' => $result));
		$this->load->view('footer');
	}

}
