<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pop Up
        <small>Tampilan Detail Data Berbentuk Pop-Up (Modal)</small>
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

          <table class="table table-bordered" id="tableDT">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Tanggal Daftar</th>
                <th>Detail</th>
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

                  <button 
                    type="button" id="select" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-detail"
                    data-nim="<?php echo $data['nim'] ?>"
                    data-nama="<?php echo $data['nama'] ?>"
                    data-alamat="<?php echo $data['alamat'] ?>"
                    data-no_telp="<?php echo $data['no_telp'] ?>"
                    data-tanggal_daftar="<?php echo date('d-m-Y',strtotime($data['tanggal_daftar'])) ?>"
                  >
                    <i class="fa fa-eye"></i> View Detail
                  </button>
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

  <!-- Modal Detail -->
  <div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detail Data</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>

              <tr>
                <th>NIM : </th>
                <th><span id="nim"></span></th>
              </tr>

              <tr>
                <th>Nama : </th>
                <th><span id="nama"></span></th>
              </tr>

              <tr>
                <th>Alamat : </th>
                <th><span id="alamat"></span></th>
              </tr>

              <tr>
                <th>No Telp : </th>
                <th><span id="no_telp"></span></th>
              </tr>

              <tr>
                <th>Tanggal Daftar : </th>
                <th><span id="tanggal_daftar"></span></th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- / Modal Detail -->


  <!-- Script Jquery Tampil Detail Data -->
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click', '#select', function(){

        var nim = $(this).data('nim');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var no_telp = $(this).data('no_telp');
        var tanggal_daftar = $(this).data('tanggal_daftar');

        $('#nim').text(nim);
        $('#nama').text(nama);
        $('#alamat').text(alamat);
        $('#no_telp').text(no_telp);
        $('#tanggal_daftar').text(tanggal_daftar);

      });
    });
  </script>