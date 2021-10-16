<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View + Search Manual
        <small>View Data + Search Manual</small>
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
          
          <form method="post" action="<?php echo base_url().'search_manual' ?>"> 
            <table width="400px">
              <tr>
                <th>
                  <label for="cari">Pencarian : </label>
                </th>

                <td>
                  <input type="text" class="form-control" name="cari">
                </td>

                <td>
                  <button type="submit" class="btn btn-info" name="submit"><i class="fa fa-search"></i> Cari</button>
                </td>
              </tr>
            </table>
          </form>

          <table class="table table-bordered" style="margin-top: 5px">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Tanggal Daftar</th>
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