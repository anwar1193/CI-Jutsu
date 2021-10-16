  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nomor Otomatis
        <small>Generate Nomor Otomatis Setiap Berganti Hari </small>
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

              <h3>Form Tambah Data</h3>
              <hr style="border-width: 4px;">
              <form method="post" action="<?php echo base_url().'nomor_otomatis/simpan' ?>">

                <div class="form-group">
                  <label for="nik">NIK <span style="color: red;">*</span></label>
                  <input type="text" name="nik" class="form-control" value="<?php echo $nik_otomatis ?>" readonly>
                </div>

                <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                  <label for="nama">Nama <span style="color: red;">*</span></label>
                  <input type="text" name="nama" class="form-control" autocomplete="off" autofocus>
                  <?php echo form_error('nama'); ?>
                </div>

                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Simpan Data</button>
                <a href="<?php echo base_url().'crud_standar' ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Kembali</a>

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