<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_inputan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('libraryku','form_validation'));
		$this->load->helper('helperku');
		$this->load->model('M_header');
	}

	public function index()
	{
			cek_belum_login();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_validasiInputan');
			$this->load->view('footer');
	}

	public function simpan(){

		$this->form_validation->set_rules('nim','NIM','required|is_unique[tbl_mhs.nim]');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('tanggal_daftar','Tanggal Daftar', 'required');

		$this->form_validation->set_message('required','{field} Tidak Boleh Kosong');
		$this->form_validation->set_message('is_unique','{field} Sudah Ada di Database');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE){

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_validasiInputan');
			$this->load->view('footer');

		}else{
			$this->session->set_flashdata('pesan','Data Bohongan Tersimpan !!');
			redirect('Validasi_inputan');
		}
	}

}