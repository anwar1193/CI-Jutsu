  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUD Standar
        <small>CRUD biasa dengan validasi standar (per form) </small>
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
              <form method="post" action="<?php echo base_url().'crud_standar/simpan' ?>">

                <div class="form-group">
                  <label for="nim">NIM <span style="color: red;">*</span></label>
                  <input type="text" name="nim" class="form-control" autofocus autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="nama">Nama <span style="color: red;">*</span></label>
                  <input type="text" name="nama" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat <span style="color: red;">*</span></label>
                  <textarea name="alamat" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label for="no_telp">Nomor Telepon <span style="color: red;">*</span></label>
                  <input type="number" name="no_telp" class="form-control">
                </div>

                <div class="form-group">
                  <label for="tanggal_daftar">Tanggal Daftar <span style="color: red;">*</span></label>
                  <input type="date" name="tanggal_daftar" class="form-control">
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