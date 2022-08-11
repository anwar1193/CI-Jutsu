<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Export Excel
        <small>View + Export Excel </small>
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
          
          <a href="<?php echo base_url().'export_excel/proses_excel' ?>" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-file-excel-o"></i> Export Excel</a>

          <a href="<?php echo base_url().'export_excel/proses_phpexcel' ?>" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-file-excel-o"></i> Export PHPExcel</a>

          <a href="<?php echo base_url().'export_excel/proses_phpspreadsheet' ?>" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-file-excel-o"></i> Export PHPSpreadsheet</a>

          <table class="table table-bordered">
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