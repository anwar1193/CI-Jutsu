<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sweet_alert extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_sweetAlert','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_sweetAlert->tampil();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_sweetAlert',array('row'=>$result));
		$this->load->view('footer');
	}

	public function simpan(){
		$result = $this->M_sweetAlert->simpan('tbl_mhs',array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'tanggal_daftar' => $this->input->post('tanggal_daftar')
		));

		if($result>0){
			$this->session->set_flashdata('pesan','Disimpan');
			redirect('Sweet_alert/index');
		}
	}

	public function update(){
		$result = $this->M_sweetAlert->update('tbl_mhs',array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'tanggal_daftar' => $this->input->post('tanggal_daftar')
		),array('nim'=>$this->input->post('nim')));

		if($result>0){
			$this->session->set_flashdata('pesan', 'Diubah');
			redirect('Sweet_alert/index');
		}
	}

	public function hapus($id){
		$result = $this->M_sweetAlert->hapus('tbl_mhs',array('id' => $id));

		if($result>0){
			$this->session->set_flashdata('pesan','Dihapus');
			redirect('Sweet_alert/index');
		}
	}

}
