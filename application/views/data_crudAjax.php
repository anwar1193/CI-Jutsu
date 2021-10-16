<?php date_default_timezone_set("Asia/Jakarta"); ?>
<?php 
  $no=1;
  foreach($result as $data){ 
?>
<tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $data['nim']; ?></td>
  <td><?php echo $data['nama']; ?></td>
  <td><?php echo $data['alamat']; ?></td>
  <td><?php echo $data['no_telp']; ?></td>
  <td><?php echo date('d-m-Y',strtotime($data['tanggal_daftar'])); ?></td>
  <td>
    <button class="btn btn-info btn-xs" id="pilih" data-toggle="modal" data-target="#modal-edit"
      data-nim="<?php echo $data['nim'] ?>"
      data-nama="<?php echo $data['nama'] ?>"
      data-alamat="<?php echo $data['alamat'] ?>"
      data-no_telp="<?php echo $data['no_telp'] ?>"
      data-tanggal_daftar="<?php echo $data['tanggal_daftar'] ?>"
    ><i class="fa fa-edit"></i> Edit</button>

    <button id="hapus_data" class="btn btn-danger btn-xs" data-nim='<?php echo $data['nim'] ?>'>
      <i class="fa fa-trash"></i> Hapus
    </button>
  </td>
</tr>
<?php } ?> 