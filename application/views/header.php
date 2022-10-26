<?php  

    $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
    $jenis_kelamin = $this->libraryku->tampil_user()->jenis_kelamin;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CI-Jutsu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'asset' ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- jQuery 3 -->
  <script src="<?php echo base_url().'asset' ?>/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Jquery UI CSS -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>jquery-ui.css">

  <!-- Loader Style -->
  <style>
    .loader{
      height:100vh;
      width:100vw;
      overflow:hidden;
      background-color: #16191e;
      position:absolute;
    }

    .loader>div{
      height:100px;
      width:100px;
      border:15px solid #45474b;
      border-top-color: #2a88e6;
      position: absolute;
      margin: auto;
      top: 0;
      bottom: 0;
      left:0;
      right:0;
      border-radius: 50%;
      animation: spin 1.5s infinite linear;
    }

    @keyframes spin{
      100%{
        transform:rotate(360deg);
      }
    }
  </style>
  <!-- / Loader Style -->
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CI-</b>List Modul</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
          <?php  
            // Ambil Jumlah Total Siswa (Ingat, Semua Controller Harus load M_header, Kalo tidak pasti error)
            $jumlah_mhs = $this->M_header->jumlah_mhs();
          ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success" id="tot-mhs"><?php echo $jumlah_mhs; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada <?php echo $jumlah_mhs ?> Jumlah Mahasiswa</li>
              <li class="footer"><a href="#">Lihat Data</a></li>
            </ul>
          </li>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if($jenis_kelamin=='pria'){ ?>
                <img src="<?php echo base_url().'asset/' ?>dist/img/avatar5.png" class="user-image" alt="User Image">
              <?php }else{ ?>
                <img src="<?php echo base_url().'asset/' ?>dist/img/avatar2.png" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php echo $nama_lengkap; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if($jenis_kelamin=='pria'){ ?>
                  <img src="<?php echo base_url().'asset/' ?>dist/img/avatar5.png" class="user-image" alt="User Image">
                <?php }else{ ?>
                  <img src="<?php echo base_url().'asset/' ?>dist/img/avatar2.png" class="user-image" alt="User Image">
                <?php } ?>

                <p>
                  <?php echo $nama_lengkap; ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>



<!-- jQuery 3 -->
<script src="<?php echo base_url().'asset/' ?>bower_components/jquery/dist/jquery.min.js"></script>

<!-- Script Realtime Notification (Penambahan Mahasiswa) -->
<script>
  $(document).ready(function(){ 
    setInterval(function(){
      $.ajax({
        url:"<?php echo base_url().'header/get_totMahasiswa' ?>",
        type:"POST",
        dataType:"json",
        data{},
        success:function(data){
          $('#tot-mhs').html(data.total);
        }
      });
    },2000);
  })
</script>