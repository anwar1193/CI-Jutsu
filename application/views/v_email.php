  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Kirim Email
        <small>Kirim Email Dengan Codeigniter </small>
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

              <h3>Form Kirim Email</h3>
              <hr style="border-width: 4px;">
              <form method="post" action="<?php echo base_url().'email/kirim_email' ?>">

                <div class="form-group">
                  <label for="nim">To <span style="color: red;">*</span></label>
                  <input type="email" name="to" class="form-control" autofocus autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label for="nama">Subject (Judul) <span style="color: red;">*</span></label>
                  <input type="text" name="subject" class="form-control" autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label for="alamat">Isi Pesan <span style="color: red;">*</span></label>
                  <textarea name="pesan" rows="5" class="form-control"></textarea>
                </div>

                <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-send"></i> Kirim Email</button>

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