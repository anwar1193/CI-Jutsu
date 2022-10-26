
  <?php  

// Fungsi tanggal / zona waktu biar gak error
date_default_timezone_set("Asia/Jakarta");

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Search Inputan
    <small>Pencarian Inputan Dengan Pop Up Data Table -> Mempengaruhi text lain </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  
  <!-- Tampilan Form Tambah Data -->
  <div class="box box-widget">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <?php echo $this->session->flashdata('pesan'); ?>

          <h3>Input Data Pembayaran Semester</h3>
          <hr style="border-width: 4px;">
          <form method="post" action="<?php echo base_url().'search_inputan/simpan' ?>">

            <div class="form-group">
              <label for="tanggal_daftar">Tanggal Bayar <span style="color: red;">*</span></label>
              <input type="text" name="tanggal_bayar" class="form-control" value="<?= date('d-m-Y'); ?>" readonly>
            </div>

            <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Simpan Data</button>
            <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-times"></i> Reset</button>

          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- / Tampilan Form Tambah Data -->
  
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

