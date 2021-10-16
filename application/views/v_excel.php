<?php  

	// Script Excel (Tanpa Tambahan Library) Apapun
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/x-msexcel");
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Nama_File.xls");

?>

<style>
	table,th,td{
		border-collapse: collapse;
		padding: 15px;
		margin: 10px;
		color: #000;
	}
</style>

<div style="text-align: center;">
	<span style="margin-left: 20px; font-size: 20px"><b>Data Mahasiswa</b></span>
</div>

<table border="1">
	<thead>
		<tr>
			<th>NO</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No Telepon</th>
			<th>Tanggal Daftar</th>
		</tr>
	</thead>	

	<tbody>

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
			<td><?php echo $data['tanggal_daftar'] ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>