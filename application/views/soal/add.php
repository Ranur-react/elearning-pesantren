<?php
  $level=$this->session->userdata('level');
  if($level==2){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Soal</h1>
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
                <h3 class="card-title">Data Soal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('soal/simpan')?>" method="post">
                <div class="card-body">
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Matapelajaran</label>
                    <div class="col-sm-10">
                      <select required="required" class="form-control" name="mapel"> 
						<option selected value="">=Silahkan Pilih=</option>
							<?php 
							foreach ($datamapel->result_array() as $k){
							echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
							}
							?>
						</select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                      <input type="file" name="file">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Soal</label>
                    <div class="col-sm-10">
                      <textarea name="soal" class="textarea" placeholder="Inputkan Soal" required oninvalid="this.setCustomValidity('Soal tidak boleh kosong')" oninput="setCustomValidity('')" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File A</label>
                    <div class="col-sm-10">
                      <input type="file" name="filea">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Opsi A</label>
                    <div class="col-sm-10">
                      <textarea name="opsia" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File B</label>
                    <div class="col-sm-10">
                      <input type="file" name="fileb">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Opsi B</label>
                    <div class="col-sm-10">
                      <textarea name="opsib" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File C</label>
                    <div class="col-sm-10">
                      <input type="file" name="filec">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Opsi C</label>
                    <div class="col-sm-10">
                      <textarea name="opsic" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File D</label>
                    <div class="col-sm-10">
                      <input type="file" name="filed">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Opsi D</label>
                    <div class="col-sm-10">
                      <textarea name="opsid" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban</label>
                    <div class="col-sm-10">
                      <select name="jawaban" class="custom-select">
                          <option>==Pilih==</option>
						  <option value="A">A</option>
                          <option value="B">B</option>
						  <option value="C">C</option>
						  <option value="D">D</option>
                       </select>
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
					<a href="<?php echo base_url('soal');?>"><button type="button" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</button></a>
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
  if($level==1 || $level==3){
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