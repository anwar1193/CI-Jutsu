<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live_search_combobox extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('libraryku');
        $this->load->helper('helperku');
        $this->load->model('M_header');
    }

	public function index()
	{
        $data_pegawai = $this->db->query("SELECT * FROM tbl_pegawai")->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_live_search', array('data_pegawai' => $data_pegawai));
		$this->load->view('footer');
	}

    public function load_pegawai(){
        $tahun_masuk = $_GET['tahun_masuk'];

        if($tahun_masuk == 'all'){
            $data_pegawai = $this->db->query("SELECT * FROM tbl_pegawai")->result_array();
        }else{
            $data_pegawai = $this->db->query("SELECT * FROM tbl_pegawai WHERE tahun_masuk='$tahun_masuk'")->result_array();
        }

        $this->load->view('load_pegawai', array('data_pegawai' => $data_pegawai));

    }

}