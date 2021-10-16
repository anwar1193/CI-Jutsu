<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_manual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_paginationManual','M_header'));
	}

	public function index()
	{
		cek_belum_login();

		// Ambil Jumlah Semua Data
		$jumlah_data = $this->M_paginationManual->jumlah_data();

		// Panggil Pagination
		$this->load->library('pagination');

		// Config Pagination
		$config['base_url'] = 'http://localhost/CI-Jutsu/pagination_manual/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;
		$config['num_links'] = 5; //jumlah tampilan kotak pagination

		// Styling Pagination
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// Inisialisasi Pagination
		$this->pagination->initialize($config);

		$start = $this->uri->segment(3);

		$result = $this->M_paginationManual->tampil_page($config['per_page'], $start);

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_paginationManual',array('row'=>$result));
		$this->load->view('footer');
	}
}
