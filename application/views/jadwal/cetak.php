<?php
	$level=$this->session->userdata('level');
	if($level==1){
	?>
<?php $id=$this->uri->segment(3);
	$query = $this->db->query("select * from kelas where id_kelas='$id'");		
	$b=$query->row_array();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Cetak Jadwal Pelajaran</title>
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
         PONDOK PESANTREN KH.AHMAD DAHLAN SIPIROK
        </h2>
      </div>
	  <br>
	  <div class="col-12" align="center">
        <h5 class="page-header">
          Jln. Baringin, Sipirok, Kab.Tapanuli Selatan, Sumatera Utara -22742 <br>
		  <?php echo $b['ket_kelas']?>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <br>
	<div class="row invoice-info">
	  <div class="col-sm-12 invoice-col">
        
		  <p><h3 class="page-header">Jadwal Pelajaran</h3></p>
		  <p><h4 class="page-header">Kelas : <b><?php echo $b['nama_kelas']?></b></h4></p>
      </div>
      <!-- /.col -->    
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Senin</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($senin->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Selasa</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($selasa->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Rabu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($rabu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Kamis</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($kamis->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Jumat</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($jumat->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Sabtu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($sabtu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.row -->
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
<?php $id=$this->uri->segment(3);
		$query = $this->db->query("select * from guru where nip='$id'");
		
		$b=$query->row_array();
		?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Cetak Jadwal Mengajar</title>
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
         PONDOK PESANTREN KH.AHMAD DAHLAN SIPIROK
        </h2>
      </div>
	  <br>
	  <div class="col-12" align="center">
        <h5 class="page-header">
          Jln. Baringin, Sipirok, Kab.Tapanuli Selatan, Sumatera Utara -22742 <br>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <br>
	<div class="row invoice-info">
	  <div class="col-sm-12 invoice-col">
        
		  <p><h3 class="page-header">Jadwal Mengajar</h3></p>
		  <p><h4 class="page-header">Guru : <b><?php echo $b['nama_guru']?></b></h4></p>
      </div>
      <!-- /.col -->    
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Senin</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($senin->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Selasa</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($selasa->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Rabu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($rabu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Kamis</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($kamis->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Jumat</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($jumat->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Sabtu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($sabtu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.row -->
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
	if($level==3){
	?>
<?php $id=$this->uri->segment(3);
		$query = $this->db->query("select * from kelas where id_kelas='$id'");
		
		$b=$query->row_array();
		?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Cetak Jadwal Pelajaran</title>
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
         PONDOK PESANTREN KH.AHMAD DAHLAN SIPIROK
        </h2>
      </div>
	  <br>
	  <div class="col-12" align="center">
        <h5 class="page-header">
          Jln. Baringin, Sipirok, Kab.Tapanuli Selatan, Sumatera Utara -22742 <br>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <br>
	<div class="row invoice-info">
	  <div class="col-sm-12 invoice-col">
        
		  <p><h3 class="page-header">Jadwal Pelajaran</h3></p>
		  <p><h4 class="page-header">Kelas : <b><?php echo $b['nama_kelas']?></b></h4></p>
      </div>
      <!-- /.col -->    
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Senin</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($senin->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Selasa</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($selasa->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Rabu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($rabu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Kamis</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($kamis->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Jumat</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($jumat->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Sabtu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($sabtu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- /.row -->
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