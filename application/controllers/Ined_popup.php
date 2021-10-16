<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ined_popup extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_inedPopup','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_inedPopup->tampil();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_inedPopup',array('row'=>$result));
		$this->load->view('footer');
	}

	public function simpan(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$tanggal_daftar = $this->input->post('tanggal_daftar');

		// Cek Data Kosong
		if($nim=="" || $nama=="" || $alamat=="" || $no_telp=="" || $tanggal_daftar=="") { // Jika ada data kosong

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Maaf !</strong> Harap Isi Semua Data
				</div>
			');
			redirect('Ined_popup');

		}else{ // Jika data terisi semua
			$result = $this->M_inedPopup->simpan('tbl_mhs',array(
				'nim' => $nim,
				'nama' => $nama,
				'alamat' => $alamat,
				'no_telp' => $no_telp,
				'tanggal_daftar' => $tanggal_daftar
			));
			if($result>0){
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Data Berhasil Tersimpan
					</div>
				');
				redirect('Ined_popup');
			}
		}
	}

	public function update(){
		$result = $this->M_inedPopup->update('tbl_mhs',array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'tanggal_daftar' => $this->input->post('tanggal_daftar')
		),array('nim'=>$this->input->post('nim')));

		if($result>0){
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Data Berhasil Diubah
				</div>
			');
			redirect('Ined_popup');
		}
	}
}
