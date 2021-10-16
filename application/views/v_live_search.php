<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Live Search Jquery Ajax
        <small>Live Search Combobox </small>
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

            Tahun Masuk :
            <select name="tahun_masuk" id="tahun_masuk">
                <option value="all">All</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>

          <table class="table table-bordered" style="margin-top: 10px;" id="tabel_pegawai">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tahun Masuk</th>
              </tr>
            </thead>

            <tbody></tbody>
          </table>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
      $(document).ready(function(){

        tampil_pegawai();
        $('#tahun_masuk').change(function(){
            tampil_pegawai();
        });

        function tampil_pegawai(){
            let tahun_masuk = $('#tahun_masuk').val();
            $.ajax({
                url : "<?php echo base_url().'live_search_combobox/load_pegawai' ?>",
                data : "tahun_masuk=" + tahun_masuk,
                success:function(data){
                    $('#tabel_pegawai tbody').html(data);
                }
            });
        }

      });
  </script>