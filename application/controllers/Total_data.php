<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Total_data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_totalData','M_header'));
	}

	public function index()
	{
		$result = $this->M_totalData->tampil()->result_array();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_totalData', array('result' => $result));
		$this->load->view('footer');
	}

}
