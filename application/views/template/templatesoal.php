<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pondok Pesantren | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/summernote/summernote-bs4.css">
  <!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

  <!-- Google Font: Source Sans Pro 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
  <script type="text/javascript" src="<?php echo base_url('theme/')?>jquery-3.3.1.min.js"></script> <!-- Plugin JQuery yang di butuhkan untuk preview image -->
	<script type="text/javascript"> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];

        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimage.png');
          $("#message").html("<p id='error'>Format Gambar Tidak Sesuai</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });

    function imageIsLoaded(e) {
      $("#file").css("color","green");
      $('#image_preview').css("display", "block");
      $('#previewing').attr('src', e.target.result);
      $('#previewing').attr('width', '250px');
      $('#previewing').attr('height', '325px');
    }
  </script> 
</head>
<body id="MyBody" class="hold-transition layout-navbar-fixed layout-top-nav"> 
<!-- <body class="hold-transition layout-top-nav"> -->
<?php $b=$data->row_array();?>	
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-pink">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <font color="white"><h2><i class="fas fa-book"></i> <?php echo $b['nama_ujian'];?></h2></font>
      </li>
    </ul>    
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    {isi}
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
	//Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $("#example1").DataTable();
	$("#example3").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
