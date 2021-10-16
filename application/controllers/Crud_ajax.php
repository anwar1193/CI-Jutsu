<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_header', 'M_crudAjax'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_crudAjax->tampil()->result_array();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_crudAjax', array('result' => $result));;
		$this->load->view('footer');
	}

	public function reload_data(){
		$result = $this->M_crudAjax->tampil()->result_array();
		$this->load->view('data_crudAjax', array('result' => $result));
	}

	public function proses(){
		$post = $this->input->post(null, TRUE); // ambil semua data di post

		// Tambah
		if(isset($_POST['simpan_data'])){
			$this->M_crudAjax->simpan($post);
			if($this->db->affected_rows() > 0){
				$params = array('success' => true);
			}else{
				$params = array('success' => false);
			}

			echo json_encode($params);
		}

		// Hapus
		if(isset($_POST['hapus_data'])){
			$nim = $this->input->post('nim');
			$this->M_crudAjax->hapus(array('nim'=>$nim));
			if($this->db->affected_rows() >0){
				$params = array('success' => true);
			}else{
				$params = array('success' => false);
			}
			echo json_encode($params);
		}

		// Update
		if(isset($_POST['update_data'])){
			$this->M_crudAjax->update($post);
			if($this->db->affected_rows() > 0){
				$params = array('success' => true);
			}else{
				$params = array('success' => false);
			}
			echo json_encode($params);
		}

	}
}
