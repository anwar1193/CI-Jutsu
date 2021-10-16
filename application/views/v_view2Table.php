<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View 2 Table 
        <small>(Menggabungkan 2 Table)</small>
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
          
          <p>Kasus : Menggabungkan tbl_mhs(nim, nama, alamat, no_telp, tanggal daftar) Dengan tbl_pembayaran(tanggal_bayar, nim, nama, jumlah_bayar)</p>

          <table class="table table-bordered">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>Tanggal Bayar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Jumlah Bayar</th>
              </tr>
            </thead>

            <tbody>
              <?php  
                $no=1;
                foreach($row as $data){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['tanggal_bayar'])); ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['no_telp']; ?></td>
                <td><?php echo number_format($data['jumlah_bayar'],0,'.',','); ?></td>
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