<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Perpustakaan Digital | SMA 1 Hiliran Gumanti</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo site_url('')?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo site_url('login')?>" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
	</br>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
			<form action="<?php echo site_url('welcome/cari')?>" method="post">
			<div class="input-group mb-3">
               <input placeholder="Nama Buku, Kategori, Penerbit" value="<?php echo $this->session->userdata('ccari');?>" name="cari" type="text" class="form-control">
               <span class="input-group-append">
               <button name="tombolcari" type="submit" class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
               </span>
            </div>
			</form>
		  </div>
          <!-- /.col-md-6 -->          
        </div>
        <!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<?php
							foreach ($post->result_array() as $i) :
							$cover=$i['cover_buku'];
							$judul=$i['judul_buku'];
							$url=base_url().'images/buku/'.$cover;
							$kategori=$i['nama_kategori'];
							$pengarang=$i['pengarang'];
							$penerbit=$i['penerbit'];
							$thnterbit=$i['thnterbit'];
							$ketersediaan=$i['ketersediaan'];
						?>
				<div class="card">
					  <div class="card-body">
						<div class="form-group row">
							<div class="col-sm-2">
							<img class="img-fluid" src="<?php echo $url;?>" alt="Photo">
							</div>
							<div class="col-sm-10 row fontawesome-icon-list">
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-book"></i> Judul Buku : <?php echo $judul;?></span>
								</div>
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-home"></i> Penerbit : <?php echo $penerbit;?></span>
								</div>
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-male"></i> Pengarang : <?php echo $pengarang?></span>
								</div>
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-rocket"></i> Kategori : <?php echo $kategori;?></span>
								</div>
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-calendar"></i> Tahun Terbit : <?php echo tanggal_indonesia(date($thnterbit));?></span>
								</div>
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-cube"></i><font color="red"> <?php echo $ketersediaan;?> buah</font></span>
								</div>
								<div class="col-md-8 col-sm-8">
								<span><i class="fa fa-fw fa-map-marker"></i><font color="blue"> Lokasi : Bagian "<?php echo $kategori;?>", Rak "<?php echo substr($judul,0,1);?>" </font></span>
								</div>
							</div>
						</div>
					  </div>
					  <!-- /.card-body -->
				 </div>
				 <?php endforeach;?>
				 <?php echo $this->pagination->create_links(); ?> 
			</div>
		</div>
		<!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Perpustakaan Digital
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2022.</strong> SMA NEGERI 1 HILIRAN GUMANTI
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/js/adminlte.min.js"></script>
<script>
	$(document).ready(function () {
	$('.pagination a').addClass('page-link');
	});
</script> 
</body>
</html>
