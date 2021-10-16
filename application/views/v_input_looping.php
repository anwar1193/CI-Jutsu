<?php date_default_timezone_set("Asia/Jakarta"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Looping
        <small>Inputan yang Bisa di Tambah-tambah</small>
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
          
          <h4>Input Data Anggota</h4>

          <form method="post" action="<?php echo base_url().'input_looping/simpan' ?>">

            <table class="table table-bordered" id="tableLoop">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Nama Depan</th>
                  <th>Nama Belakang</th>
                  <th>Nominal</th>
                  <th class="text-center">
                    <button class="btn btn-primary btn-xs" id="BarisBaru">
                      <i class="fa fa-plus"></i> Baris Baru
                    </button>
                  </th>
                </tr>
              </thead>

              <tbody id="table_data"></tbody>
            </table>

            <div style="font-weight: bold; font-size: 20px;">
              <span>TOTAL :</span>
              <span id="total">0</span>
            </div>

            <br>
            <button type="submit" class="btn btn-success btn-sm">
              <i class="fa fa-save"></i> Simpan Data
            </button>

          </form>

        </div>
      </div>
      <!-- / tampilan tabel -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">

    $(document).ready(function(){
      for(b=1; b<=1; b++){
        barisBaru();
      }
      $('#BarisBaru').click(function(e){
        e.preventDefault();
        barisBaru();
      });

      $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
    });
    
    function barisBaru(){
      $(document).ready(function(){
        $("[data-toggle='tooltip'").tooltip();
      });

      var Nomor = $("#tableLoop tbody tr").length + 1;
      var Baris = '<tr>';
              Baris += '<td class="text-center">'+Nomor+'</td>';

              Baris += '<td>';
                Baris += '<input type="text" name="nama_depan[]" class="form-control" placeholder="Nama Depan" required>';
              Baris += '</td>';

              Baris += '<td>';
                Baris += '<input type="text" name="nama_belakang[]" class="form-control" placeholder="Nama Belakang" required>';
              Baris += '</td>';

              Baris += '<td>';
                Baris += '<input type="number" name="nominal[]" id="nominal" class="form-control" placeholder="Rp">';
              Baris += '</td>';

              Baris += '<td class="text-center">';
                Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
              Baris += '</td>';
          Baris += '</tr>';

      $("#tableLoop tbody").append(Baris);
      $("#tableLoop tbody tr").each(function(){
        $(this).find('td:nth-child(2) input').focus();
      });

    }

    $(document).on('click', '#HapusBaris', function(e){
      e.preventDefault();
      var Nomor = 1;
      $(this).parent().parent().remove();
      $('tableLoop tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
      });
    });

  </script>




<script>
  $(document).ready(function(){

  // Rubah format angka javascript
  function rubah(angka){
     var reverse = angka.toString().split('').reverse().join(''),
     ribuan = reverse.match(/\d{1,3}/g);
     ribuan = ribuan.join(',').split('').reverse().join('');
     return ribuan;
  }

  function hitung_total(){
    var total = 0;

    $('#table_data tr').each(function(){
      total += parseInt($(this).find('#nominal').val());
    });

    isNaN(total) ? $('#total').text(0) : $('#total').text(rubah(total));

  }

  $(document).on('keyup', '#nominal', function(){
    hitung_total();
  });

  // hitung_total();

});
</script>