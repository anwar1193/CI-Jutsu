<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_2table extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_view2Table','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_view2Table->tampil_gabung();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_view2Table',array('row'=>$result));
		$this->load->view('footer');
	}
}
