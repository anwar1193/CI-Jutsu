<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nomor_otomatis extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library(array('libraryku','form_validation'));
		$this->load->model(array('M_nomorOtomatis','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$res_nik = $this->M_nomorOtomatis->nik_otomatis();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_nomorOtomatis',array('nik_otomatis' => $res_nik));
		$this->load->view('footer');
	}

	public function simpan(){
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_message('required','{field} Tidak Boleh Kosong');
		$this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

		if($this->form_validation->run() == FALSE){
			$res_nik = $this->M_nomorOtomatis->nik_otomatis();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_nomorOtomatis',array('nik_otomatis' => $res_nik));
			$this->load->view('footer');
		}else{
			$result = $this->M_nomorOtomatis->simpan('tbl_karyawan',array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama')
			));

			if($result>0){
				redirect('Nomor_otomatis');
			}
		}
		
	}

}
