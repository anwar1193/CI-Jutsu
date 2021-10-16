<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_standar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_crud_standar','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_crud_standar->tampil();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_crud_standar',array('row' => $result));
		$this->load->view('footer');
	}

	public function tambah(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_input_crudStandar');
		$this->load->view('footer');
	}

	public function simpan(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$tanggal_daftar = $this->input->post('tanggal_daftar');

		// Validasi jika Ada Data Kosong
		if($nim=='' || $nama=='' || $alamat=='' || $no_telp=='' || $tanggal_daftar==''){ // Jika ada data kosong

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Kesalahan !</strong> Tidak Boleh Ada Data Yang Kosong
				</div>
			');
			redirect('crud_standar/tambah');

		}else{ // jika sudah terisi semua

			// Validasi Jika Data Sudah Ada di Database
			$cek = $this->M_crud_standar->cek_ada('tbl_mhs',array('nim' => $nim));

			if($cek>0){ // Jika Data (NIM) Sudah Ada Sebelumnya

				$this->session->set_flashdata('pesan','
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Maaf !</strong> Data (NIM) Sudah Ada di Database Kami
					</div>
				');
				redirect('crud_standar/tambah');

			}else{ // Jika Data Belum Ada
				
				$result = $this->M_crud_standar->simpan('tbl_mhs',array(
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
						  <strong>Sukses!</strong> Data Berhasil Disimpan
						</div>
					');
					redirect('crud_standar');
				}
			
			}

		}
	}

	public function hapus($id){
		$result = $this->M_crud_standar->hapus('tbl_mhs',array('id'=>$id));
		if($result>0){
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses!</strong> Data Berhasil Di Hapus
				</div>
			');
			redirect('crud_standar');
		}
	}

	public function edit($id){
		$result = $this->M_crud_standar->edit('tbl_mhs', array('id'=>$id));

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_crudStandar', array('row'=>$result));
		$this->load->view('footer');
	}

	public function update(){
		$result = $this->M_crud_standar->update('tbl_mhs',array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'tanggal_daftar' => $this->input->post('tanggal_daftar')
		),array('nim' => $this->input->post('nim')));

		if($result>0){
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses!</strong> Data Berhasil Di Ubah
				</div>
			');
			redirect('crud_standar');
		}
	}
}
