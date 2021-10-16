<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model('M_header');
	}

	public function index()
	{
		cek_belum_login();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_home');
		$this->load->view('footer');
	}

}
