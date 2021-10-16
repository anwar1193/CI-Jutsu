<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan PDF</title>
	<style>
		.logo{
			position: absolute;
			width: 60px;
			height: auto;
		}

		.garis{
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}

		table,th,td{
			border-collapse: collapse;
		}
	</style>
</head>
<body>

	<img src="asset/gambar/logo.jpg" class="logo" alt="">
	<table style="width: 100%">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight: bold">
					SEKOLAH TINGGI ILMU KOMPUTER DAN INFORMATIKA
					<br>NURDIN HAMZAH JAMBI
				</span>
			</td>
		</tr>
	</table>

	<hr class="garis">

	<p style="text-align: center; font-size: 14px">
		DAFTAR MAHASISWA BERPRESTASI <br>
		TAHUN AJARAN 2018/2019
	</p>

	<table border="1" style="text-align: center;" width="100%">
		<tr>
			<th>NO</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No Telepon</th>
			<th>Tanggal Daftar</th>
		</tr>
		<?php
			$no=1;
			foreach($row as $data){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nim'] ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td><?php echo $data['alamat'] ?></td>
			<td><?php echo $data['no_telp'] ?></td>
			<td><?php echo date('d-m-Y',strtotime($data['tanggal_daftar'])) ?></td>
		</tr>
		<?php } ?>
	</table><br><br>
	
	<p>Demikianlah data mahasiswa berprestasi ini kami sampaikan, keputusan yang telah di buat oleh management kampus tidak dapat di ganggu gugat</p> <br><br>

	<p style="text-align: right;">
		Jakarta, <?php echo date('d-m-Y') ?> <br>
		Yang Mengesahkan <br><br><br><br>

		<u>Drs. Ahmad Jaelani</u> <br>
		<b>Ketua STMIK NH</b>

	</p>

</body>
</html>