<?php
	$level=$this->session->userdata('level');
	if($level==3){
	?>
<?php $b=$post2->row_array();?>	
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Cetak Hasil Study <?php echo $b['nama_ujian']?></title>
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
			<p><h5 class="page-header">Nama Siswa</h5></p>
			<p><h5 class="page-header">Kelas</h5></p>
			<p><h5 class="page-header">Nama Latihan</h5></p>
			<p><h5 class="page-header">Tanggal Mengerjakan</h5></p>
			<p><h5 class="page-header">Jumlah Jawaban Benar</h5></p>
			<p><h5 class="page-header">Jumlah Jawaban Salah</h5></p>
			<p><h5 class="page-header">Jumlah Jawaban Kosong</h5></p>
			<p><h5 class="page-header">Jumlah Soal</h5></p>
			<p><h5 class="page-header">Score</h5></p>
		</div>		
		<div class="col-sm-8 invoice-col">
			<p><h5 class="page-header"><?php echo $b['nama_siswa']?></h5></p>
			<p><h5 class="page-header"><?php echo $b['nama_kelas']?></h5></p>
			<p><h5 class="page-header"><?php echo $b['nama_ujian']?></h5></p>
			<p><h5 class="page-header"><?php $tgl1=date("Y-m-d",strtotime($b['tgl']));echo tanggal_indonesia($tgl1);?>, <?php echo $tgl2=date("H:i",strtotime($b['tgl'])); ?></h5></p>
			<p><h5 class="page-header"><?php echo $b['benar']?></h5></p>
			<p><h5 class="page-header"><?php echo $b['salah']?></h5></p>
			<p><h5 class="page-header"><?php echo $b['kosong']?></h5></p>
			<p><h5 class="page-header"><?php echo $b['jumlah_soal']?></h5></p>
			<p><h2 class="page-header">
			<?php $sc=$b['score']; if($sc > 70 ){?><font color="green"><?php echo $b['score'];?></font><?php }?>
			<?php $sc=$b['score']; if($sc < 70 ){?><font color="red"><?php echo $b['score'];?></font><?php }?>
			</h2></p>
		</div>
      </div>
      <!-- /.col -->    
    </div>
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


<?php
	$level=$this->session->userdata('level');
	if($level==2){
	?>
<?php $b=$post1->row_array();?>	
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Cetak Hasil Latihan </title>
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
        <h2 class="page-header">
         Laporan Hasil Studi
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <br>
	<br>
	<br>
	<div class="row invoice-info">
    <?php $b=$post2->row_array();?>
	  <div class="col-sm-4 invoice-col">
			<p><h5 class="page-header">Nama Guru</h5></p>
			<p><h5 class="page-header">Kelas</h5></p>
			<p><h5 class="page-header">Matapelajaran</h5></p>
			<p><h5 class="page-header">Jumlah Soal</h5></p>
			<p><h5 class="page-header">Jumlah Siswa</h5></p>
		</div>		
		<div class="col-sm-8 invoice-col">
			<p><h5 class="page-header">:&nbsp;<?php echo $this->session->userdata('nama');?></h5></p>
			<p><h5 class="page-header">:&nbsp;<?php echo $b['nama_kelas']?></h5></p>
			<p><h5 class="page-header">:&nbsp;<?php echo $b['nama_mapel']?></h5></p>
			<p><h5 class="page-header">:&nbsp;<?php echo $b['jumlah']?></h5></p>
			<p><h5 class="page-header">:&nbsp;<?php echo $jumlahsiswa->num_rows();?></h5></p>
		</div>
     </div>
	 <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Soal</th>
            <th>Jawaban Benar</th>
            <th>Jawaban Salah</th>
			<th>Jawaban Kosong</th>
            <th>Score</th>
          </tr>
          </thead>
          <tbody>
          <?php
			$no=0;
			foreach ($post2->result_array() as $i) :
			$no++;
			$nama=$i['soal'];
			$benar=$i['totalbenar'];
			$salah=$i['totalsalah'];
			$score=$i['totalscore'];
			$kosong=$i['totalkosong'];
	      ?>
		  <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $nama;?></td>
            <td><?php echo $benar;?></td>
            <td><?php echo $salah;?></td>
			<td><?php echo $kosong;?></td>
            <td>
				<?php if($score > 70 ){?><font color="green"><?php echo round($score, 2);?>%</font><?php }?>
				<?php if($score < 70 ){?><font color="red"><?php echo round($score, 2);?>%</font><?php }?>
			</td>
          </tr>
		  <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
      <!-- /.col -->    
    </div>
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
