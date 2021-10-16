<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_looping extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_header', 'M_input_looping'));
	}

	public function index()
	{
		cek_belum_login();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_input_looping');
		$this->load->view('footer');
	}

	public function simpan(){
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');

		for ($i=0; $i < sizeof($nama_depan) ; $i++) { 
			$this->M_input_looping->simpan('tbl_anggota', array(
				'nama_depan' => $nama_depan[$i],
				'nama_belakang' => $nama_belakang[$i]
			));
		}

		$this->session->set_flashdata('pesan','
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Berhasil !</strong> Data Anggota Tersimpan
			</div>
		');
		redirect('input_looping');
	}

}
