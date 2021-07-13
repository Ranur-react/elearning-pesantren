<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengumuman</h1>
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
                <h3 class="card-title">Edit pengumuman</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$data->row_array();?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('pengumuman/update')?>" method="post">
                <div class="card-body">
                  <input type="hidden" class="form-control" value="<?php echo $b['id_pengumuman'];?>" name="id">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Pengumuman</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['judul_pengumuman'];?>" name="judul" required oninvalid="this.setCustomValidity('Judul Pengumuman tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Judul Pengumuman">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                      <textarea name="ket" class="textarea" placeholder="Input kan isi pengumuman" required oninvalid="this.setCustomValidity('Isi Pengumuman tidak boleh kosong')" oninput="setCustomValidity('')" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
					  <?php echo $b['ket_pengumuman']?>
					  </textarea>
                    </div>
                  </div>
				  <div class="form-group row">
				  <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <img id="previewing" src="<?php echo base_url().'/images/pengumuman/'.$b['foto_pengumuman']?>" width="250" height="325"></br>
						<input type="file" name="foto" id="file">
						<input type="hidden" name="foto1" value="<?php echo $b['foto_pengumuman']?>">
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