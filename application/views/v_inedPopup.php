<?php  
  date_default_timezone_set("Asia/Jakarta");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUD (Input-Edit) Pop-Up
        <small>CRUD Dengan Input dan Edit Menggunakan Pop Up</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- tampilan tabel -->
      <div class="box box-widget">
        <div class="box-body table-responsive">

          <?php echo $this->session->flashdata('pesan'); ?>
          
          <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data</button>

          <table class="table table-bordered" id="tableDT">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Tanggal Daftar</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $no=1;
                foreach($row as $data){ 
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
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal Tambah -->
  <form action="<?php echo base_url().'ined_popup/simpan' ?>" method="post">
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Form Input Data</h4>
        </div>
        <div class="modal-body">
          
          <table width="100%">

            <tr>
              <td style="vertical-align: top">
                <label for="nim"><span style="color: red">*</span> Nim :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" name="nim" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="nama"><span style="color: red">*</span> Nama :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="alamat"><span style="color: red">*</span> Alamat :</label>
              </td>

              <td>
                <div class="form-group">
                  <textarea name="alamat" class="form-control" rows="5"></textarea>
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="no_telp"><span style="color: red">*</span> No Telp :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="number" name="no_telp" class="form-control">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="tanggal_daftar"><span style="color: red">*</span> Tanggal Daftar :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="date" name="tanggal_daftar" class="form-control">
                </div>
              </td>
            </tr>

          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  </form>
  <!-- / Modal Tambah -->



  <!-- Modal Edit -->
  <form action="<?php echo base_url().'ined_popup/update' ?>" method="post">
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Form Update Data</h4>
        </div>
        <div class="modal-body">
          
          <table width="100%">

            <tr>
              <td style="vertical-align: top">
                <label for="nim"><span style="color: red">*</span> Nim :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" id="nim" name="nim" class="form-control" autocomplete="off" readonly>
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="nama"><span style="color: red">*</span> Nama :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" id="nama" name="nama" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="alamat"><span style="color: red">*</span> Alamat :</label>
              </td>

              <td>
                <div class="form-group">
                  <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="no_telp"><span style="color: red">*</span> No Telp :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="number" name="no_telp" id="no_telp" class="form-control">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="tanggal_daftar"><span style="color: red">*</span> Tanggal Daftar :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control">
                </div>
              </td>
            </tr>

          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  </form>
  <!-- / Modal Edit -->


  <!-- Script Jquery Edit -->
  <script>
    $(document).ready(function(){
      $(document).on('click','#pilih', function(){

        var nim = $(this).data('nim');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var no_telp = $(this).data('no_telp');
        var tanggal_daftar = $(this).data('tanggal_daftar');

        $('#nim').val(nim);
        $('#nama').val(nama);
        $('#alamat').val(alamat);
        $('#no_telp').val(no_telp);
        $('#tanggal_daftar').val(tanggal_daftar);
      });
    });
  </script>
  <!-- / Script Jquery Edit -->