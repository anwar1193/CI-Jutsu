  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Total Data (value)
        <small>Menampilkan Jumlah nilai data dengan Jquery</small>
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

          <table class="table table-bordered" id="tableDT">
            <thead>
              <tr class="bg-success">
                <th>NO</th>
                <th>No Invoice</th>
                <th>Tanggal Bayar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jumlah Bayar</th>
              </tr>
            </thead>

            <tbody id="table_data">
              <?php 
                $no=1;
                foreach($result as $data){ 
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['no_invoice']; ?></td>
                <td><?php echo $data['tanggal_bayar']; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td style="text-align: right;"><?php echo number_format($data['jumlah_bayar'],0,'.',',') ?></td>
                <td id="bayar" style="display: none;"><?php echo $data['jumlah_bayar'] ?></td>
              </tr>
              <?php } ?>
            </tbody>

            <tfoot>
              <tr>
                <td colspan="5" style="text-align: right;">TOTAL : </td>
                <td style="text-align: right;" id="total"></td>
              </tr>
            </tfoot>

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
          total += Number($(this).find('#bayar').text());
        });

        isNaN(total) ? $('#total').text(0) : $('#total').text(rubah(total));

      }

      hitung_total();

    });

  </script>
  
  <!--  
    simpan_transaksi

    total
    diskon
    grandTotal
    
  -->