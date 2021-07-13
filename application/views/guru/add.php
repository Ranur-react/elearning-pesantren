<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Guru</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Guru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('guru/simpan')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" maxlength="16" name="nip" required oninvalid="this.setCustomValidity('NIK tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NIK (18 Karakter Tanpa Spasi)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" required oninvalid="this.setCustomValidity('Nama Guru tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" value="L" type="radio" checked name="jenkel">
                          <label class="form-check-label">Laki-Laki</label>
						</div>
					</div>
					<div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" value="P" type="radio" name="jenkel">
                          <label class="form-check-label">Perempuan</label>
						</div>
					</div>
					</div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pendidikan" required oninvalid="this.setCustomValidity('Pendidikan Terakhir tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Pendidikan Terakhir">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Hp</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nohp" required oninvalid="this.setCustomValidity('No.Hp tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NoHP">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Nama Siswa tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
				  <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <img id="previewing" src="#" width="250" height="325"></br>
						<input type="file" name="foto" required oninvalid="this.setCustomValidity('Foto tidak boleh kosong')" oninput="setCustomValidity('')" id="file">
					  </div>
                    </div>
                </div>
                <!-- /.card-body -->
				<div class="card-footer"></div>
              
            </div>
          </div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-primary">
				  <div class="card-body">
					<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
					<button type="reset" class="btn btn-default"><i class="fas fa-spinner"></i> Reset</button>					
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
<?php }?>
<?php
  $level=$this->session->userdata('level');
  if($level==2 || $level==3){
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="<?php echo base_url('dashboard')?>">return to home</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php }?>  	