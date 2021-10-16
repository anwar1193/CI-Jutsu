  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUD Gambar
        <small>Manipulasi CRUD Gambar (Mempengaruhi File Terupload)</small>
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
          
          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-simpan" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Data</button>

          <table class="table table-bordered" id="tableDT">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php
              $no=1; 
              foreach($row as $data) : 
            ?>
             <tr>
               <td><?php echo $no++; ?></td>
               <td><?php echo $data['nama_barang']; ?></td>
               
               <td>
                 <img src="<?php echo base_url().'asset/gambar/'.$data['gambar'] ?>" width="70px" height="70px" style="border-radius: 50%">
               </td>

               <td>
                 <a class="btn btn-info btn-sm" id="pilih" data-toggle="modal" data-target="#modal-edit"
                 data-id="<?php echo $data['id'] ?>" 
                 data-nama="<?php echo $data['nama_barang'] ?>" 
                 data-gambar="<?php echo $data['gambar'] ?>">
                 <i class="fa fa-edit"></i> Edit</a>

                 <a href="<?php echo base_url().'crud_gambar/hapus/'.$data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
               </td>
             </tr>
            <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal Simpan -->
  <form action="<?php echo base_url().'crud_gambar/simpan' ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modal-simpan">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Input Data</h4>
          </div>

          <div class="modal-body">
            <table>

              <tr>
                <th style="vertical-align: top"><label for="nama_barang">Nama Barang : </label></th>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" name="nama_barang" autocomplete="off" onfocus>
                  </div>
                </td>
              </tr>

              <tr>
                <th>Gambar : </th>
                <td>
                  <input type="file" class="form-control" name="gambar" required>
                </td>
              </tr>

            </table>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </form>
  <!-- / Modal Simpan -->



  <!-- Modal Edit -->
  <form action="<?php echo base_url().'crud_gambar/update' ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Update Data</h4>
          </div>

          <div class="modal-body">
            <table>
              
              <input type="text" id="id" name="id" hidden>

              <tr>
                <th style="vertical-align: top"><label for="nama_barang">Nama Barang : </label></th>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" autocomplete="off" onfocus>
                  </div>
                </td>
              </tr>

              <tr>
                <th>Gambar : </th>
                <td>
                  <input type="file" class="form-control" name="gambar">
                </td>
              </tr>

            </table>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </form>
  <!-- / Modal Edit -->



  <!-- Jquery Tampil Edit -->
  <script>
    $(document).ready(function(){
      $(document).on('click','#pilih', function(){
        var nama = $(this).data('nama');
        var id = $(this).data('id');

        $('#id').val(id);
        $('#nama_barang').val(nama);
      });
    });
  </script>
  <!-- Jquery / Tampil Edit -->