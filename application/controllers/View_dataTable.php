<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_dataTable extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_view_dataTable','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_view_dataTable->tampil();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_dataTable', array('row' => $result));
		$this->load->view('footer');
	}
}
