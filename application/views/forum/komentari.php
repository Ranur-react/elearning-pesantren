<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Komentari</h1>
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
                <h3 class="card-title">Edit Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$post->row_array();?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('forum/simpkomen')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pertanyaan</label>
                    <label class="col-sm-10 col-form-label"><?php echo $b['isi_forum'];?></label>
					<input type="hidden" class="form-control" name="id" value="<?php echo $b['id_forum'];?>"/>  
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Isi Komentar</label>
                    <div class="col-sm-10">
                      <textarea name="isi" class="textarea" required oninvalid="this.setCustomValidity('Isi komentar tidak boleh kosong')" oninput="setCustomValidity('')" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Isi Komentar Anda ...</textarea>
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