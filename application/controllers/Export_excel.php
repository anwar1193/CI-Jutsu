<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_excel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_exportExcel','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_exportExcel->tampil();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_exportExcel',array('row'=>$result));
		$this->load->view('footer');
	}

	public function proses_excel(){
		$result = $this->M_exportExcel->tampil();
		$this->load->view('v_excel',array('row'=>$result));
	}

}
