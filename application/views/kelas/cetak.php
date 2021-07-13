<?php
	$level=$this->session->userdata('level');
	if($level==1){
	?>
<?php $b=$datakelas->row_array();?>	
<?php $c=$totsiswa->row_array();?>	
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Cetak Data Siswa Per-Kelas <?php echo $b['nama_kelas']?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('theme/AdminLTE-3.0.1/')?>dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12" align="center">
        <h2 class="page-header">
         PONDOK PESANTREN MUHAMMADIYAH KH.AHMAD DAHLAN SIPIROK
        </h2>
      </div>
	  <br>
	  <div class="col-12" align="center">
        <h5 class="page-header">
          Jln. Baringin, Sipirok, Kab.Tapanuli Selatan, Sumatera Utara -22742 <br>
		  <?php 
		  $bulan=date('m');
		  $tahun=date('Y');
		  
		  if ($bulan <= 6){
		  $ta=$tahun - 1;
		  echo 'Tahun Ajaran ' .$ta . '/' .$tahun;
		  };
		  if ($bulan > 6){
		  $ta=$tahun + 1;
		  echo 'Tahun Ajaran ' .$tahun . '/' .$ta;
		  }
		  ?> 
		  
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <br>
	<br>
	<br>
	<div class="row invoice-info">
	  <div class="col-sm-4 invoice-col">
			<p><h5 class="page-header">Kelas</h5></p>
			<p><h5 class="page-header">Wali Kelas</h5></p>
			<p><h5 class="page-header">Jumlah Siswa Laki-Laki</h5></p>
			<p><h5 class="page-header">Jumlah Siswa Perempuan</h5></p>
			<p><h5 class="page-header">Total Siswa</h5></p>
		</div>		
		<div class="col-sm-8 invoice-col">
			<p><h5 class="page-header"><?php echo $b['nama_kelas']?></h5></p>
			<p><h5 class="page-header"><?php echo $b['nama_guru']?></h5></p>
			<p><h5 class="page-header"><?php echo $c['laki']?></h5></p>
			<p><h5 class="page-header"><?php echo $c['perempuan']?></h5></p>
			<p><h5 class="page-header"><?php echo $c['total']?></h5></p>
		</div>
      </div>
	  <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
			<th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
          </tr>
          </thead>
          <tbody>
          <?php
			$no=0;
			foreach ($datasiswa->result_array() as $i) :
			$no++;
			$nama=$i['nama_siswa'];
			$nis=$i['nis'];
			$jenkel=$i['jenkel_siswa'];
	      ?>
		  <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $nis;?></td>
            <td><?php echo $nama;?></td>
            <td><?php if($jenkel=='P'){echo 'Perempuan';}?><?php if($jenkel=='L'){echo 'Laki-Laki';}?></td>
          </tr>
		  <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
      <!-- /.col -->    
    <!-- /.row -->

    <!-- Table row -->    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
<?php }?>