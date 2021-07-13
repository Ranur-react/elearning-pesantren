<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Siswa</h1>
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
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('siswa/simpan')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" maxlength="8" name="nis" required oninvalid="this.setCustomValidity('NIS tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NIS (8 Karakter)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" required oninvalid="this.setCustomValidity('Nama Siswa tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Siswa">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat/</br>Tgl.Lahir</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="tempat" required oninvalid="this.setCustomValidity('Tempat Lahir tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Tempat Lahir">
                    </div>
					<div class="col-sm-4">
                      <input type="date" class="form-control" name="tgl" required oninvalid="this.setCustomValidity('Tgl.Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select name="jenkel" class="custom-select">
                          <option>==Pilih==</option>
						  <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
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
		  <div class="row">
			<div class="col-md-12">
            <!-- Default box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Orang Tua Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Ayah</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="namaayah" required oninvalid="this.setCustomValidity('Nama Ayah tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Ayah">
                    </div>
                   </div>
				   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Telpon Ayah</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="notelayah" required oninvalid="this.setCustomValidity('No.Telpon Ayah tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No.Telpon Ayah">
                    </div>
                   </div>
				   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Ibu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="namaibu" required oninvalid="this.setCustomValidity('Nama Ibu tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Ibu">
                    </div>
                   </div>
				   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Telpon Ibu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="notelibu" required oninvalid="this.setCustomValidity('No.Telpon Ibu tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No.Telpon Ibu">
                    </div>
                   </div>
                 </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
                <!-- /.card-footer -->
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