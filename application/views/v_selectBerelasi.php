  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SELECT SALING BERELASI
        <small>Select Saling Berelasi</small>
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
              <label for="">Pilih Provinsi</label>
              <select id="provinsi" class="form-control">
                <option>- Pilih Provinsi -</option>
                <?php foreach($result as $row) : ?>
                <option value="<?php echo $row['id_prov'] ?>"><?php echo $row['nama_prov'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Pilih Kabupaten</label>
              <select id="kabupaten" class="form-control">
                <option></option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Pilih Kecamatan</label>
              <select id="kecamatan" class="form-control">
                <option></option>
              </select>
            </div>

          </div>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    
  $(function(){

    $.ajaxSetup({
      type : 'POST',
      url : '<?php echo base_url().'select_berelasi/ambil_data' ?>',
      cache : false
    });

    $("#provinsi").change(function(){
      var value=$(this).val();
      if(value>0){
        $.ajax({
          data:{modul:'kabupaten',id:value},
          success: function(respond){
            $("#kabupaten").html(respond);
          }
        })
      }
    });

    $("#kabupaten").change(function(){
      var value=$(this).val();
      if(value>0){
        $.ajax({
          data:{modul:'kecamatan',id:value},
          success: function(respond){
            $("#kecamatan").html(respond);
          }
        })
      }
    });

  });

  </script>