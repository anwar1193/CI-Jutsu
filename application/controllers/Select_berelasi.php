<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select_berelasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_selectBerelasi','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_selectBerelasi->tampil_provinsi()->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_selectBerelasi', array('result' => $result));
		$this->load->view('footer');
	}

	public function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="kabupaten"){
			echo $this->M_selectBerelasi->kabupaten($id);
		}elseif($modul=="kecamatan"){
			echo $this->M_selectBerelasi->kecamatan($id);
		}
	}

}
