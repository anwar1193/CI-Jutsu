  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        AUTOCOMPLETE
        <small>Pencarian Autocomplete</small>
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
        <div class="box-body">

          <div class="col-md-6">
            
            <div class="form-group">
              <label for="">Nama Provinsi</label>
              <input type="text" name="prov" id="prov" placeholder="Masukan Nama Provinsi" class="form-control">
            </div>

          </div>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Jquery UI -->
  <script src="<?php echo base_url().'asset' ?>/jquery-ui.js"></script>

  <script>
    $('#prov').autocomplete({
      source : '<?php echo base_url().'autocomplete/proses' ?>'
    });
  </script>