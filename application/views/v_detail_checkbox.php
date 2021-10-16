<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Checkbox Multiple
        <small>Input Banyak Item Sekaligus Hanya Sekali Klik</small>
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

          <h4 style="float: left;">Detail Transaksi</h4>
          <span style="margin-left: 80%">
            <a href="<?php echo base_url().'checkbox_multiple' ?>" class="btn btn-danger btn-xs">Kembali</a>
          </span>
          <hr>

          <table class="table">
            <tr>
              <th width="20%">No Transaksi</th>
              <td width="2%">:</td>
              <td><?php echo $row_transaksi['no_transaksi'] ?></td>
            </tr>

            <tr>
              <th>Tanggal Transaksi</th>
              <td>:</td>
              <td><?php echo date('d-m-Y', strtotime($row_transaksi['tanggal'])) ?></td>
            </tr>

            <tr>
              <th>Keterangan</th>
              <td>:</td>
              <td><?php echo $row_transaksi['keterangan'] ?></td>
            </tr>

            <tr>
              <th>List Barang Yang Dibeli</th>
              <td>:</td>
              <td>
              
                <ol>
                  <?php foreach($row_item as $data){ ?>
                    <li><?php echo $data['item'] ?></li>
                  <?php } ?>
                </ol>
              
              </td>
            </tr>
          </table>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal Tambah -->
  <form action="<?php echo base_url().'checkbox_multiple/simpan' ?>" method="post">
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
                <label for="no_transaksi"> Nomor Transaksi :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="text" name="no_transaksi" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="tanggal"> Tanggal Transaksi :</label>
              </td>

              <td>
                <div class="form-group">
                  <input type="date" name="tanggal" class="form-control" autocomplete="off">
                </div>
              </td>
            </tr>

            <tr>
              <td style="vertical-align: top">
                <label for="item"> Item :</label>
              </td>

              <td>
                <!-- checkbox -->
              <div class="form-group">

                <?php foreach($row_barang as $data_barang){ ?>
                  <label>
                    <input type="checkbox" name="item[]" class="minimal" value="<?php echo $data_barang['nama_barang'] ?>">
                    <?php echo $data_barang['nama_barang'] ?>
                  </label> &nbsp; &nbsp;
                <?php } ?>

              </div>
              </td>
            </tr>


            <tr>
              <td style="vertical-align: top">
                <label for="keterangan"> Keterangan :</label>
              </td>

              <td>
                <div class="form-group">
                  <textarea class="form-control" name="keterangan"></textarea>
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