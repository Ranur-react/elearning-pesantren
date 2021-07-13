<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Materi</h1>
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
                <h3 class="card-title">Data Materi Pelajaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('materi/simpan')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Materi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="judul" required oninvalid="this.setCustomValidity('Nama materi tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <select required="required" class="form-control" name="kelas"> 
						<option selected value="">=Silahkan Pilih=</option>
							<?php 
							foreach ($datakelas->result_array() as $k){
							echo '<option value="'.$k['id_kelas'].'">'.$k['nama_kelas'].'</option>';
							}
							?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
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
				  <label class="col-sm-2 col-form-label">File Materi</label>
                    <div class="col-sm-10">
						<input type="file" name="foto" required oninvalid="this.setCustomValidity('File tidak boleh kosong')" oninput="setCustomValidity('')">
						<br><font color="red"><h6>*File Berupa Doc, Docx, Pdf, Ppt, Pptx</h6></font>
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