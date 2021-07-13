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
                <h3 class="card-title">Edit Materi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$data->row_array();?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('materi/update')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['judul_materi'];?>" name="judul" required oninvalid="this.setCustomValidity('Judul tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Judul Materi">
					  <input type="hidden" value="<?php echo $b['id_materi'];?>" name="id">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <select required="required" class="form-control" name="kelas"> 
							<option value="">==Silahkan Pilih==</option>
							<?php
								foreach ($datakelas->result_array() as $i) {
								$id=$i['id_kelas'];
								$nama=$i['nama_kelas'];
								if($b['id_kelas_materi']==$id)
								echo "<option value='$id' selected>$nama</option>";
								else
								echo "<option value='$id'>$nama</option>";
							}?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">MataPelajaran</label>
                    <div class="col-sm-10">
                      <select required="required" class="form-control" name="mapel"> 
							<option value="">==Silahkan Pilih==</option>
							<?php
								foreach ($datamapel->result_array() as $i) {
								$id=$i['id_mapel'];
								$nama=$i['nama_mapel'];
								if($b['id_mapel_materi']==$id)
								echo "<option value='$id' selected>$nama</option>";
								else
								echo "<option value='$id'>$nama</option>";
							}?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
				  <label class="col-sm-2 col-form-label">File Materi</label>
                    <div class="col-sm-10">
						<input type="file" required oninvalid="this.setCustomValidity('File tidak boleh kosong')" oninput="setCustomValidity('')" name="foto" id="file">
						<input type="hidden" name="foto1" id="file" value="<?php echo $b['file_materi'];?>">
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
					<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button>
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