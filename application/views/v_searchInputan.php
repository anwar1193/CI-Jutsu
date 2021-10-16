
  <?php  

    // Fungsi tanggal / zona waktu biar gak error
    date_default_timezone_set("Asia/Jakarta");

    $no_invoice = $row_invoice['no_invoice'] + 1;

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
                  <label for="nim">NO Invoice <span style="color: red;">*</span></label>
                  <input type="text" name="no_invoice" class="form-control" value="<?= $no_invoice ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="tanggal_daftar">Tanggal Bayar <span style="color: red;">*</span></label>
                  <input type="text" name="tanggal_bayar" class="form-control" value="<?= date('d-m-Y'); ?>" readonly>
                </div>

                <div>
                  <label for="barcode">NIM *</label>
                </div>
                <div class="form-group input-group">
                  <input type="text" name="nim" id="nim" class="form-control" required autofocus>
                  <span class="input-group-btn">
                    <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mhs">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>

                <div class="form-group">
                  <label for="nama">Nama <span style="color: red;">*</span></label>
                  <input type="text" name="nama" id="nama" class="form-control" readonly>
                </div>

                <div class="form-group">
                  <label for="no_telp">Jumlah Bayar <span style="color: red;">*</span></label>
                  <input type="number" name="jumlah_bayar" class="form-control" placeholder="Rp">
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


  <!-- Modal Data Mahasiswa -->
  <div class="modal fade" id="modal-mhs">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Data Mahasiswa</h4>
        </div>
        <div class="modal-body">
          
          <table class="table table-bordered" id="tableDT">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach($row_mhs as $data) : ?>
              <tr>
                <td><?php echo $data['nim'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td>
                  <button class="btn btn-info btn-xs" id="pilih" type="button"
                    data-nim="<?php echo $data['nim'] ?>"
                    data-nama="<?php echo $data['nama'] ?>"
                  >
                  <i class="fa fa-check"></i> Pilih</button></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-danger"><i class="fa fa-times"></i> Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- / Modal Data Mahasiswa -->

  <!-- Script Jquery Data Mahasiswa -->
  <script>
    $(document).ready(function(){
      $(document).on('click','#pilih', function(){
        var nim = $(this).data('nim');
        var nama = $(this).data('nama');

        $('#nim').val(nim);
        $('#nama').val(nama);

        $('#modal-mhs').modal('hide');
      });
    });
  </script>
  <!-- / Script Jquery Data Mahasiswa -->