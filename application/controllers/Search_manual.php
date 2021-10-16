<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_manual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_searchManual','M_header'));
	}

	public function index()
	{
		cek_belum_login();

		$cari = $this->input->post('cari');
		if(isset($_POST['submit'])){
			$result = $this->M_searchManual->tampil_cari($cari);
		}else{
			$result = $this->M_searchManual->tampil();
		}
		

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_searchManual',array('row' => $result));
		$this->load->view('footer');
	}

}
