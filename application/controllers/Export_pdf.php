<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_pdf extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('libraryku','dompdf_gen'));
		$this->load->helper('helperku');
		$this->load->model(array('M_exportPdf','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_exportPdf->tampil();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_exportPdf',array('row'=>$result));
		$this->load->view('footer');
	}

	public function proses_pdf(){
		date_default_timezone_set("Asia/Jakarta");
		$result = $this->M_exportPdf->tampil();
		$this->load->view('v_pdf', array('row'=>$result));

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf",array('Attachment' => 0)); //Nama Hasil Export PDF
	}

}
