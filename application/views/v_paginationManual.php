  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View + Pagination
        <small>View Data + Pagination Manual</small>
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

          <table class="table table-bordered" style="margin-top: 5px">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $start = $this->uri->segment(3);
                foreach($row as $data){ 
              ?>
              <tr>
                <td><?php echo ++$start; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['email']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <!-- Tampilan Pagination -->
          <?php echo $this->pagination->create_links(); ?>

        </div>

      </div>
      <!-- / tampilan tabel -->
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->