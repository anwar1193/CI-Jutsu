<!-- Step Untuk Bisa Email Dengan CI :

	1. Aktifkan Aplikasi Tidak Aman di Gmail : https://myaccount.google.com/security 
	2. Buat Script di Controller
	3. Apabila ada pesan error (ssl), masalah ada di antivirus (biasanya avast) -> uninstall aja

-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model('M_header');
	}

	public function index()
	{
		cek_belum_login();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_email');
		$this->load->view('footer');
	}

	public function kirim_email(){
		date_default_timezone_set("Asia/Jakarta");
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.procarfinance.com',
			'smtp_crypto' => '',
			'smtp_port' => 587,
			'smtp_user' => 'munawar.ahmad@procarfinance.com',
			'smtp_pass' => 'Profi@123',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);

		$to = $this->input->post('to');
		$subject = $this->input->post('subject');
		$pesan = $this->input->post('pesan');

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('munawar.ahmad@procarfinance.com', 'Pro-App');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($pesan);

		$terkirim = $this->email->send();

		if($terkirim>0){
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Email Anda Telah Terkirim
				</div>
			');
			redirect('email/index');
		}else{
			echo 'gagal kirim';
		}
		
	}

}