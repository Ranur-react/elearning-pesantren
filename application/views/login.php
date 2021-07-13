<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pondok Pesantren Sipirok | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/toastr/toastr.min.css">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('')?>"><b>Pondok Pesantren </b>Sipirok</a>
  </div>
  <p><?php echo $this->session->flashdata('msg');?></p>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="<?php echo site_url('Login/auth')?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
			<select required="required" class="form-control" name="level"> 
				<option selected value="">==Silahkan Pilih==</option>
				<option value="1">Admin</option>
				<option value="2">Guru</option>
				<option value="3">Siswa</option>
			</select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas  fa-user-plus"></span>
            </div>
          </div>
        </div>
        <div class="row">          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
	</div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/toastr/toastr.min.js"></script>
</body>
</html>
