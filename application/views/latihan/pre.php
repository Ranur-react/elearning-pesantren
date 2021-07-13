<!-- Content Header (Page header) -->
<?php $b=$data->row_array();?>
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
             
            var detik   = 30; 
			var jam   = 0; 
			var hari   = 0;
			var bulan   = 0; 
            var menit   = 0;
              
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
                     var peringatan = 'style="color:white"';
                };
 
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h4 align="center"'+peringatan+'><i class="icon fas fa-clock"></i>  ' + detik + ' Detik</h4>'
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
                                    window.location = "<?php echo site_url('latihan/mulai/');?>";
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
		  <div class="alert alert-primary alert-dismissible">
			   <h5 align="center">
			   <span id="timer"></span>
			   Halaman Ini Akan Di Alihkan Otomatis ...
				</h5>
			 </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Latihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>			  
                <div class="card-body">
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Siswa</label>
                    <label class="col-sm-8 col-form-label text-success"><?php echo $this->session->userdata('nama');?></label>
					<?php $_SESSION['rtsmmulai'] = $b['id_ujian'];?>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Latihan</label>
                    <label class="col-sm-8 col-form-label text-success"><?php echo $b['nama_ujian']?></label>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Guru</label>
                    <label class="col-sm-8 col-form-label text-success"><?php echo $b['nama_guru']?></label>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                    <label class="col-sm-8 col-form-label text-success"><?php echo $b['nama_mapel']?></label>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jumlah Soal</label>
                    <label class="col-sm-8 col-form-label text-success"><?php echo $b['jumlah_soal']?></label>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Waktu Pengerjaan</label>
                    <label class="col-sm-8 col-form-label text-success"><?php echo $b['waktu']?> Menit</label>
                  </div>
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
					<a class="btn btn-warning" href="<?php echo base_url('latihan')?>"><i class="fas fa-backward"></i> Kembali</a>
				  </div>
				  <div class="card-footer"></div>
                <!-- /.card-footer -->
				  <!-- /.card-body -->
				</div>
			</div>
		</div>
		
		</div>
    </section>
    <!-- /.content -->