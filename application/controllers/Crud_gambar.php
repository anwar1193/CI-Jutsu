<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_gambar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper(array('helperku','form'));
		$this->load->model(array('M_crudGambar','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_crudGambar->tampil();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_crudGambar',array('row'=>$result));
		$this->load->view('footer');
	}

	public function simpan(){

		// Upload Gambar
		$config['upload_path']          = './asset/gambar';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']			= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);

        if($_FILES['gambar']['name'] != null){
        	if($this->upload->do_upload('gambar')){

        		$_FILES['gambar'] = $this->upload->data('file_name');

        		$result = $this->M_crudGambar->simpan('tbl_barang',array(
				'nama_barang' => $this->input->post('nama_barang'),
				'gambar' => $_FILES['gambar']
				));

				if($result>0){
					redirect('Crud_gambar/index');
				}
        	}else{
        		$error = $this->upload->display_errors();
        		$this->session->set_flashdata('error', $error);
        		redirect('Crud_gambar/index');
        	}
        }

	}


	public function update(){
		// Ambil Data Untuk Ganti / Hapus Gambar Di Folder
		$data = $this->M_crudGambar->ambil_data('tbl_barang',array('id'=>$this->input->post('id')));

		// Upload Gambar
		$config['upload_path']          = './asset/gambar';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']			= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        if($_FILES['gambar']['name'] != null){
        	if($this->upload->do_upload('gambar')){

        		$_FILES['gambar'] = $this->upload->data('file_name');

        		//jika gambar diganti, gambar lama akan ter-replace (di folder)
        		if($_FILES['gambar'] != null){
        			foreach($data as $row){
        				$gambar_lama = $row['gambar'];
            			$target_file = './asset/gambar/'.$gambar_lama;
            			unlink($target_file);
        			}
        		}

        		$result = $this->M_crudGambar->update('tbl_barang',array(
					'nama_barang' => $this->input->post('nama_barang'),
					'gambar' => $_FILES['gambar']
				),array('id'=>$this->input->post('id')));

				if($result>0){
					redirect('Crud_gambar/index');
				}

        		
        	}else{
        		$error = $this->upload->display_errors();
        		$this->session->set_flashdata('error', $error);
        		redirect('Crud_gambar/index');
        	}
        }else{
        	$result = $this->M_crudGambar->update('tbl_barang',array(
				'nama_barang' => $this->input->post('nama_barang')
			),array('id'=>$this->input->post('id')));

			if($result>0){
				redirect('Crud_gambar/index');
			}
        }
	}


	public function hapus($id){
		// Ambil Data Untuk Hapus Gambar
		$data = $this->M_crudGambar->ambil_data('tbl_barang',array('id'=>$id));

		$result = $this->M_crudGambar->hapus('tbl_barang',array('id'=>$id));

		if($result>0){
			// jika hapus data, gambar di folder juga dihapus
			foreach($data as $row){
				$gambar_lama = $row['gambar'];
    			$target_file = './asset/gambar/'.$gambar_lama;
    			unlink($target_file);
			}
			redirect('Crud_gambar/index');
		}

	}

}
