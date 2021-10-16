  <?php  

    $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
    $jenis_kelamin = $this->libraryku->tampil_user()->jenis_kelamin;

  ?>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- Jika Pria Foto Pria, Jika Wanita Foto Wanita -->
          <?php if($jenis_kelamin=='pria'){ ?>
            <img src="<?php echo base_url().'asset/' ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
          <?php }else{ ?>
            <img src="<?php echo base_url().'asset/' ?>dist/img/avatar2.png" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_lengkap; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?= $this->uri->segment(1)=='home' ? 'active' : null ?>"><a href="<?php echo base_url().'home' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="<?= $this->uri->segment(1)=='crud_standar' ? 'active' : null ?>"><a href="<?php echo base_url().'crud_standar' ?>"><i class="fa fa-list-alt"></i> <span>CRUD Standar</span></a></li>

        <li class="<?= $this->uri->segment(1)=='view_dataTable' ? 'active' : null ?>"><a href="<?php echo base_url().'view_dataTable' ?>"><i class="fa fa-list"></i> <span>View Data Table</span></a></li>

        <li class="<?= $this->uri->segment(1)=='detail_popup' ? 'active' : null ?>"><a href="<?php echo base_url().'detail_popup' ?>"><i class="fa fa-list-alt"></i> <span>Detail Pop Up</span></a></li>

        <li class="<?= $this->uri->segment(1)=='search_inputan' ? 'active' : null ?>"><a href="<?php echo base_url().'search_inputan' ?>"><i class="fa fa-list"></i> <span>Search Inputan</span></a></li>

        <li class="<?= $this->uri->segment(1)=='ined_popup' ? 'active' : null ?>"><a href="<?php echo base_url().'ined_popup' ?>"><i class="fa fa-list-alt"></i> <span>Input-Edit PopUp</span></a></li>

        <li class="<?= $this->uri->segment(1)=='validasi_inputan' ? 'active' : null ?>"><a href="<?php echo base_url().'validasi_inputan' ?>"><i class="fa fa-list"></i> <span>Validasi Per-Inputan</span></a></li>

        <li class="<?= $this->uri->segment(1)=='nomor_otomatis' ? 'active' : null ?>"><a href="<?php echo base_url().'nomor_otomatis' ?>"><i class="fa fa-list-alt"></i> <span>Nomor Otomatis</span></a></li>

        <li class="<?= $this->uri->segment(1)=='search_manual' ? 'active' : null ?>"><a href="<?php echo base_url().'search_manual' ?>"><i class="fa fa-list"></i> <span>View + Search Manual</span></a></li>

        <li class="<?= $this->uri->segment(1)=='pagination_manual' ? 'active' : null ?>"><a href="<?php echo base_url().'pagination_manual' ?>"><i class="fa fa-list-alt"></i> <span>View + Pagination Manual</span></a></li>

        <li class="<?= $this->uri->segment(1)=='view_2table' ? 'active' : null ?>"><a href="<?php echo base_url().'view_2table' ?>"><i class="fa fa-list"></i> <span>View 2 Tabel (JOIN)</span></a></li>

        <li class="<?= $this->uri->segment(1)=='crud_gambar' ? 'active' : null ?>"><a href="<?php echo base_url().'crud_gambar' ?>"><i class="fa fa-list-alt"></i> <span>CRUD Gambar</span></a></li>

        <li class="<?= $this->uri->segment(1)=='export_pdf' ? 'active' : null ?>"><a href="<?php echo base_url().'export_pdf' ?>"><i class="fa fa-list"></i> <span>Export PDF</span></a></li>

        <li class="<?= $this->uri->segment(1)=='export_excel' ? 'active' : null ?>"><a href="<?php echo base_url().'export_excel' ?>"><i class="fa fa-list-alt"></i> <span>Export Excel</span></a></li>

        <li class="<?= $this->uri->segment(1)=='email' ? 'active' : null ?>"><a href="<?php echo base_url().'email' ?>"><i class="fa fa-envelope-o"></i> <span>Kirim Email</span></a></li>

        <li class="<?= $this->uri->segment(1)=='sweet_alert' ? 'active' : null ?>"><a href="<?php echo base_url().'sweet_alert' ?>"><i class="fa fa-list"></i> <span>Sweet Alert</span></a></li>

        <li class="<?= $this->uri->segment(1)=='crud_ajax' ? 'active' : null ?>"><a href="<?php echo base_url().'crud_ajax' ?>"><i class="fa fa-list-alt"></i> <span>CRUD AJAX</span></a></li>

        <li class="<?= $this->uri->segment(1)=='total_data' ? 'active' : null ?>"><a href="<?php echo base_url().'total_data' ?>"><i class="fa fa-list"></i> <span>Total Value Data</span></a></li>

        <li class="<?= $this->uri->segment(1)=='select_berelasi' ? 'active' : null ?>"><a href="<?php echo base_url().'select_berelasi' ?>"><i class="fa fa-list-alt"></i> <span>Select Berelasi</span></a></li>

        <li class="<?= $this->uri->segment(1)=='autocomplete' ? 'active' : null ?>"><a href="<?php echo base_url().'autocomplete' ?>"><i class="fa fa-list"></i> <span>Autocomplete</span></a></li>

        <li class="<?= $this->uri->segment(1)=='checkbox_multiple' ? 'active' : null ?>"><a href="<?php echo base_url().'checkbox_multiple' ?>"><i class="fa fa-list-alt"></i> <span>Input Checkbox Multiple</span></a></li>

        <li class="<?= $this->uri->segment(1)=='input_looping' ? 'active' : null ?>"><a href="<?php echo base_url().'input_looping' ?>"><i class="fa fa-list"></i> <span>Input Looping</span></a></li>

        <li class="<?= $this->uri->segment(1)=='live_search_combobox' ? 'active' : null ?>"><a href="<?php echo base_url().'live_search_combobox' ?>"><i class="fa fa-list-alt"></i> <span>Live Search ComboBox</span></a></li>
        
        <li class="header">USER</li>
        <li><a href="<?php echo base_url().'login/logout' ?>"><i class="fa fa-times" style="color: red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>