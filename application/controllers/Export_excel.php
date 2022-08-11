<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_excel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('libraryku');
		$this->load->helper('helperku');
		$this->load->model(array('M_exportExcel','M_header'));
	}

	public function index()
	{
		cek_belum_login();
		$result = $this->M_exportExcel->tampil();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_exportExcel',array('row'=>$result));
		$this->load->view('footer');
	}

	public function proses_excel()
	{
		$result = $this->M_exportExcel->tampil();
		$this->load->view('v_excel',array('row'=>$result));
	}

	public function proses_phpexcel()
	{
		date_default_timezone_set("Asia/Jakarta");
		$result = $this->M_exportExcel->tampil();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php'); // lokasi PHP Excel nya
		// require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Procar Finance");
		$object->getProperties()->setLastModifiedBy("Procar Finance");
		$object->getProperties()->setTitle("Daftar Product");
		$object->getActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'NIM');
		$object->getActiveSheet()->setCellValue('C1', 'NAMA');
		$object->getActiveSheet()->setCellValue('D1', 'ALAMAT');
		$object->getActiveSheet()->setCellValue('E1', 'NO TELEPON');
		$object->getActiveSheet()->setCellValue('F1', 'TANGGAL DAFTAR');

		$baris = 2;
		$no = 1;

		foreach($result as $data){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $data['nim']);
			$object->getActiveSheet()->setCellValue('C'.$baris, $data['nama']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $data['alamat']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $data['no_telp']);
			$object->getActiveSheet()->setCellValue('F'.$baris, $data['tanggal_daftar']);

			$baris++;
		}

		$filename = "Data_Mahasiswa".'.xlsx';
		$object->getActiveSheet()->setTitle("Data Mahasiswa");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}


	public function proses_phpspreadsheet()
	{
		// File Penting : CI-Jutsu\vendor\phpoffice\phpspreadsheet
		// Konfigurasi tambahan : di file config/config.php : $config['composer_autoload'] = FCPATH . 'vendor/autoload.php';
		date_default_timezone_set("Asia/Jakarta");
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
		'font' => ['bold' => true], // Set font nya jadi bold
		'alignment' => [
			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		],
		'borders' => [
			'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
		]
		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
		'alignment' => [
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		],
		'borders' => [
			'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
			'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
			'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
			'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
		]
		];
		$sheet->setCellValue('A1', "DATA Mahasiswa"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B3', "NIM"); // Set kolom B3 dengan tulisan "NIS"
		$sheet->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$sheet->setCellValue('D3', "ALAMAT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$sheet->setCellValue('E3', "NO TELEPON"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->M_exportExcel->tampil();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
		$sheet->setCellValue('A'.$numrow, $no);
		$sheet->setCellValue('B'.$numrow, $data['nim']);
		$sheet->setCellValue('C'.$numrow, $data['nama']);
		$sheet->setCellValue('D'.$numrow, $data['alamat']);
		$sheet->setCellValue('E'.$numrow, $data['no_telp']);
		
		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
		$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
		$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
		$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
		$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
		
		$no++; // Tambah 1 setiap kali looping
		$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$sheet->setTitle("Laporan Data Siswa");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}

}
