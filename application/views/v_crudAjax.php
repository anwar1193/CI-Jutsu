  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUD AJAX
        <small>(Tanpa Reload Halaman)</small>
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

            <tbody id="data_mahasiswa">
              <?php $this->view('data_crudAjax'); ?>
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
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-sm">
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
                  <input type="text" name="nim" id="nim" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="nama"><span style="color: red">*</span> Nama :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
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
                <label for="tanggal_daftar"><span style="color: red">*</span> TGL Daftar :</label>
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
          <button type="submit" id="simpan_data" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- / Modal Tambah -->



  <!-- Modal Edit -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-sm">
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
                  <input type="text" id="nim_edit" name="nim" class="form-control" autocomplete="off" readonly>
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="nama"><span style="color: red">*</span> Nama :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" id="nama_edit" name="nama" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="alamat"><span style="color: red">*</span> Alamat :</label>
              </td>

              <td>
                <div class="form-group">
                  <textarea name="alamat" id="alamat_edit" class="form-control" rows="5"></textarea>
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="no_telp"><span style="color: red">*</span> No Telp :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="number" name="no_telp" id="no_telp_edit" class="form-control">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="tanggal_daftar"><span style="color: red">*</span> Tgl Daftar </label>
              </td>

              <td>
                <div class="form-group">
                  <input type="date" name="tanggal_daftar" id="tanggal_daftar_edit" class="form-control">
                </div>
              </td>
            </tr>

          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" id="update_data" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- / Modal Edit -->


  <!-- Script Jquery -->
  <script>
    $(document).ready(function(){

      // Ketika Tombol Pilih Di Klik (Untuk Edit)
      $(document).on('click','#pilih', function(){
        var nim = $(this).data('nim');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var no_telp = $(this).data('no_telp');
        var tanggal_daftar = $(this).data('tanggal_daftar');

        $('#nim_edit').val(nim);
        $('#nama_edit').val(nama);
        $('#alamat_edit').val(alamat);
        $('#no_telp_edit').val(no_telp);
        $('#tanggal_daftar_edit').val(tanggal_daftar);
      });


      // Ketika Tombol #simpan_data di klik
      $(document).on('click', '#simpan_data', function(){
        var nim = $('#nim').val();
        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var no_telp = $('#no_telp').val();
        var tanggal_daftar = $('#tanggal_daftar').val();

        if(nim == "" || nama=="" || alamat=="" || no_telp=="" || tanggal_daftar=="" ){
          alert('Masih Ada Data Yang Kosong, Harap Isi Semua !!');
          $('#nim').focus();
        }else{
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url().'crud_ajax/proses' ?>',
            dataType : 'json',
            data : {'simpan_data' : true, 'nim' : nim, 'nama' : nama, 'alamat' : alamat, 'no_telp' : no_telp, 'tanggal_daftar' : tanggal_daftar},
            success : function(result){
              if(result.success == true){
                $('#data_mahasiswa').load('<?php echo base_url().'crud_ajax/reload_data' ?>', function(){
                });
                $('#nim').val('');
                $('#nama').val('');
                $('#alamat').val('');
                $('#no_telp').val('');
                $('#tanggal_daftar').val('');
                $('#modal-tambah').modal('hide');
              }else{
                alert('Gagal Tambah Data');
              }
            }
          });
        }

      });

      // Ketika tombol hapus (#hapus_data) di klik
      $(document).on('click', '#hapus_data', function(){
        if(confirm('Apakah Anda Yakin')){
          var nim = $(this).data('nim');
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url().'crud_ajax/proses' ?>',
            dataType : 'json',
            data : {'hapus_data' : true, 'nim' : nim},
            success : function(result){
              if(result.success == true){
                $('#data_mahasiswa').load('<?php echo base_url().'crud_ajax/reload_data' ?>', function(){
                });
              }else{
                alert('Data Gagal Dihapus');
              }
            }
          });
        }
      });


      // Ketika Tombol Update (#update_data) Di Klik
      $(document).on('click', '#update_data', function(){
        var nim = $('#nim_edit').val();
        var nama = $('#nama_edit').val();
        var alamat = $('#alamat_edit').val();
        var no_telp = $('#no_telp_edit').val();
        var tanggal_daftar = $('#tanggal_daftar_edit').val();

        $.ajax({
          type : 'POST',
          url : '<?php echo base_url().'crud_ajax/proses' ?>',
          dataType : 'json',
          data : {'update_data' : true, 'nim' : nim, 'nama' : nama, 'alamat' : alamat, 'no_telp' : no_telp, 'tanggal_daftar' : tanggal_daftar},
          success : function(result){
            if(result.success == true){
              $('#data_mahasiswa').load('<?php echo base_url().'crud_ajax/reload_data' ?>', function(){
                  // script tambahan
              });
              $('#modal-edit').modal('hide');
            }else{
              alert('Data Gagal di Update');
            }
          }
        });
      })


    });
  </script>
  <!-- / Script Jquery -->