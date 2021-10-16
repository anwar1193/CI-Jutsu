<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkbox_multiple extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_header', 'M_checkbox_multiple'));
	}

	public function index()
	{
		cek_belum_login();
		$data_transaksi = $this->M_checkbox_multiple->tampil_transaksi()->result_array();
		$data_barang = $this->M_checkbox_multiple->tampil_barang()->result_array();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_checkbox_multiple', array(
			'row' => $data_transaksi,
			'row_barang' => $data_barang
		));
		$this->load->view('footer');
	}

	public function simpan(){
		date_default_timezone_set("Asia/Jakarta");
		$tgl = $this->input->post('tanggal');
		$tanggal = date('Y-m-d', strtotime($tgl));

		$result = $this->M_checkbox_multiple->simpan('tbl_transaksi', array(
			'no_transaksi' => $this->input->post('no_transaksi'),
			'tanggal' => $tanggal,
			'keterangan' => $this->input->post('keterangan')
		));

		if($result>0){

			// Simpan item2 ke detail (tbl_transaksi_d)
			$item = $this->input->post('item');

			for ($i=0; $i<sizeof($item); $i++) { 
				$this->M_checkbox_multiple->simpan('tbl_transaksi_d', array(
					'no_transaksi' => $this->input->post('no_transaksi'),
					'item' => $item[$i]
				));
			}

			redirect('Checkbox_multiple');
		}
	}

	public function hapus(){
		// hapus sekaligus berdasarkan checkbox yang dipilih
		$id = $this->input->post('id');

		for($i=0; $i<sizeof($id); $i++){
			$this->M_checkbox_multiple->hapus('tbl_transaksi', array('id'=>$id[$i]));
		}

		redirect('Checkbox_multiple');

	}

	public function detail($no_transaksi){
		cek_belum_login();
		$data_transaksi = $this->M_checkbox_multiple->tampil_transaksi_no('tbl_transaksi', array('no_transaksi'=>$no_transaksi))->row_array();

		$data_item = $this->M_checkbox_multiple->tampil_transaksi_no('tbl_transaksi_d', array('no_transaksi'=>$no_transaksi))->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_detail_checkbox', array(
			'row_transaksi' => $data_transaksi,
			'row_item' => $data_item
		));
		$this->load->view('footer');
	}

}
