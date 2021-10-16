<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->model('M_login');
	}

	public function index()
	{
		cek_sudah_login();
		$this->load->view('v_login');
	}

	public function proses(){
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$password = sha1($pwd);

		$result = $this->M_login->proses('tbl_user',array(
			'username' => $username,
			'password' => $password
		));

		$cek = $result->num_rows();

		if($cek>0){	
			$row = $result->row_array();
			$data_login = array(
				'id' => $row['id'],
				'nama_lengkap' => $row['nama_lengkap'],
				'level' => $row['level']
			);
			$this->session->set_userdata($data_login);
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Login Sukses!</strong> Selamat Datang
				</div>
			');
			redirect('home');
		}else{
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Login Gagal!</strong> Kombinasi Username dan Password Salah
				</div>
			');
			redirect('login');
		}
	}

	public function logout(){
		$data_login = array('id','nama_lengkap','level');
		$this->session->unset_userdata($data_login);
		redirect('login');
	}
}
