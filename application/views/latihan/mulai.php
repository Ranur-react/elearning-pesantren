<!-- Content Header (Page header) -->
<?php $b=$data->row_array();?>	
<?php $c=$soal->row_array();?>	
<?php
    
    
     
    //set session dulu dengan nama $_SESSION["mulai"]
    if (isset($_SESSION["mulai"])) { 
        //jika session sudah ada
        $telah_berlalu = time() - $_SESSION["mulai"];
    } else { 
        //jika session belum ada
        $_SESSION["mulai"]  = time();
        $telah_berlalu      = 0;
    } 
?>
<?php    
    $temp_waktu = ($b['waktu']*60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
    $temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
    $temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik
     
    if ($temp_menit < 60) { 
        /* Apabila $temp_menit yang kurang dari 60 meni */
        $jam    = 0; 
        $menit  = $temp_menit; 
        $detik  = $temp_detik; 
    } else { 
        /* Apabila $temp_menit lebih dari 60 menit */           
        $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
        $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
        $detik  = $temp_detik;
    }   
?>	
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">	
<script type="text/javascript">
   $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik = 0,
                * var menit = 1,
                * var jam = 1
            */
             
            var detik   = <?= $detik; ?>; 
			var jam   = <?= $jam; ?>; 
			var hari   = 0;
			var bulan   = 0; 
            var menit   = <?= $menit; ?>;
              
             /**
               * Membuat function hitung() sebagai Penghitungan Waktu
             */
              
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                    * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0 && hari == 0 && bulan == 0){
                     var peringatan = 'style="color:red"';
                };
 
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h4 align="center"'+peringatan+'><i class="icon fas fa-clock"></i>  ' + jam + ' Jam :  ' + menit + ' Menit : ' + detik + ' Detik</h4>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
 
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
 
                    /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
                         
                        /** Jika jam < 0
                            * Maka jam akan dikembali ke 23
                            * Jam akan Berkurang 1
                        */
                        if(jam < 0) {
                            jam = 23;
                            hari --;
                             
                            /** Jika hari < 0
                                * Maka hari akan dikembali ke 29
                                * Jam akan Berkurang 1
                            */                             
                            if(hari < 0) {
                                hari = 29
                                bulan --;
                                 
                                /** Jika var bulan < 0
                                    * clearInterval() Memberhentikan Interval dan submit secara otomatis
                                */
                                if(bulan < 0){
                                    clearInterval(); 
                                    /** Variable yang digunakan untuk submit secara otomatis di Form */
                                    var frmSoal = document.getElementById("frmSoal"); 
									alert('Waktu Anda telah habis, Jawaban akan tersimpan secara otomatis');
									frmSoal.submit(); 
                                }
                            }
                        }
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
      }); 
      // ]]>
    
</script>
<div class="card card-info">              
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <span id="timer">
				
				</span>
              </div>
              <!-- /.card-body -->
</div>
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
              <form id="frmSoal" class="form-horizontal" action="<?php echo site_url('latihan/simpanhasil')?>" method="post">  
				<input type="hidden" name="guru" value="<?php echo $b['nip'];?>"/>
				<script>
			 $(document).ready(function(){
				  load_data();
				  function load_data(page){
					   $.ajax({
							url:"data.php",
							method:"POST",
							data:{page:page},
							success:function(data){
								 $('#data').html(data);
							}
					   })
				  }
				  $(document).on('click', '.halaman', function(){
					   var page = $(this).attr("id");
					   load_data(page);
				  });
			 });
			 </script>
				<div class="card-body" style="overflow: auto;width: 100%; height: 500px;"> 
                    <?php
							$no = 0;
							foreach ($soal->result_array() as $j) :
								$no ++;
								$id=$j['id_soal_temp'];
								$soal=$j['soal'];
								$file=$j['file'];
								$filea=$j['file_a'];
								$fileb=$j['file_b'];
								$filec=$j['file_c'];
								$filed=$j['file_d'];
								$a=$j['opsi_a'];
								$b=$j['opsi_b'];
								$c=$j['opsi_c'];
								$d=$j['opsi_d'];
								
						?>
						<h4 class="text-success"><?php echo $no;?></h4>
						 <input type="hidden" name="id[]" value=<?php echo $id; ?>>
						<div class="form-group row">
						<?php if(isset($file)){ ?>
						<img style="width: 500px; height: 300px;" src="<?php echo base_url().'images/soal/'.$file?>">
						<?php }?>
						<label class="col-sm-12 col-form-label"><?php echo $soal;?></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
							<div class="form-check">							
							  <input class="form-check-input" type="radio" value="A" name="pilihan[<?php echo $id;?>]">
							  <?php if(isset($filea)){ ?>
							 <img style="width: 300px; height: 100px;" src="<?php echo base_url().'images/soal/'.$filea?>">
						     <?php }?>
							  <label class="form-check-label"><?php echo $a;?></label>
							</div>
							</div>
							<br>
							<div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" value="B" type="radio" name="pilihan[<?php echo $id;?>]">
							  <?php if(isset($fileb)){ ?>
								<img style="width: 300px; height: 100px;" src="<?php echo base_url().'images/soal/'.$fileb?>">
								<?php }?>
							  <label class="form-check-label"><?php echo $b;?></label>
							</div>
							</div>
							<br>
							<div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" value="C" type="radio" name="pilihan[<?php echo $id;?>]">
							  <?php if(isset($filec)){ ?>
								<img style="width: 300px; height: 100px;" src="<?php echo base_url().'images/soal/'.$filec?>">
								<?php }?>
							  <label class="form-check-label"><?php echo $c;?></label>
							</div>
							</div>
							<br>
							<div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" value="D" type="radio" name="pilihan[<?php echo $id;?>]">
							  <?php if(isset($filed)){ ?>
								<img style="width: 300px; height: 100px;" src="<?php echo base_url().'images/soal/'.$filed?>">
								<?php }?>
							  <label class="form-check-label"><?php echo $d;?></label>
							</div>
							</div>
						</div>
						<hr>
						<?php endforeach;?>

                </div>
                <!-- /.card-body -->
				<div class="card-footer"></div>
              
            </div>
          </div>
		 </div>	
		
			   
			 
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-info">
				  <div class="card-body">
					<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Selesai</button>
				  </div>
				  <div class="card-footer"></div>
                <!-- /.card-footer -->
				  <!-- /.card-body -->
				</div>
			</div>
		</div>
		</form>
		
		</div>
    </section>
    <!-- /.content -->
		<script>
		$(document).ready(function () {
		$('.pagination a').addClass('page-link');
		});
		</script> 
		