<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sweet Alert
        <small>Alert Dengan Desain Animasi Keren</small>
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
          
          <!-- Ambil Data Flashdata untuk kata sweet alert -->
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
          
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

                  <a href="<?php echo base_url().'sweet_alert/hapus/'.$data['id'] ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
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
  <form action="<?php echo base_url().'sweet_alert/simpan' ?>" method="post">
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
  <form action="<?php echo base_url().'sweet_alert/update' ?>" method="post">
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


<!-- Panggil File JS SweetAlert -->
<script src="<?php echo base_url().'asset/sweetAlert/sweetalert2.all.min.js' ?>"></script>

<!-- Script Sweet Alert -->
  <script>

    // Jika Berhasil Melakukan Aksi (Simpan, Edit, Hapus)
    var flashData = $('.flash-data').data('flashdata');
    if(flashData){
      Swal.fire({
        icon: 'success', //Icon : success, error, warning, info, question
        title: 'Berhasil',
        text: 'Data ' + flashData
        // footer: 'Data Mahasiswa Tersimpan Ke Database'
      });
    }

    // Pesan Konfimasi Sebelum Hapus Data
    $('.tombol-hapus').on('click', function(e){ //tombol-hapus = a href

      e.preventDefault(); // Mematikan fungsi href pada a

      // Ambil Link dari tombol hapus yang sedang di klik
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Mahasiswa Akan Dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
      }).then((result) => {
        if (result.value) { //Jika Ya
          document.location.href = href; //ke alamat hapus (sweet_alert/hapus)
        }
      });

    });

    
  </script>
  <!-- / Script Sweet Alert-->