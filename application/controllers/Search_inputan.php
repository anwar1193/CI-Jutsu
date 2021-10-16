<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_inputan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_searchInputan','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$res_mhs = $this->M_searchInputan->ambil_mhs();
		$res_invoice = $this->M_searchInputan->no_invoice();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_searchInputan',array('row_mhs' => $res_mhs, 'row_invoice'=>$res_invoice));
		$this->load->view('footer');
	}

	public function simpan(){
		$tgl_bayar = $this->input->post('tanggal_bayar');
		$tanggal_bayar = date('Y-m-d',strtotime($tgl_bayar));
		$nim = $this->input->post('nim');
		$jumlah_bayar = $this->input->post('jumlah_bayar');

		// Cek Apakah Ada Data Yang Belum Diisi
		if($nim=="" || $jumlah_bayar==""){

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Gagal Simpan !</strong> Data NIM dan Jumlah Bayar Tidak Boleh Kosong
				</div>
			');
			redirect('Search_inputan');

		}else{

			$result = $this->M_searchInputan->simpan('tbl_pembayaran',array(
				'tanggal_bayar' => $tanggal_bayar,
				'nim' => $nim,
				'nama' => $this->input->post('nama'),
				'jumlah_bayar' => $jumlah_bayar
			));

			if($result>0){
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Data Berhasil Disimpan
					</div>
				');
				redirect('Search_inputan');
			}
			
		}
	}

}
