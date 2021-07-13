<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buku Tamu</h1>
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
                <h3 class="card-title">Edit Buku Tamu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$data->row_array();?>
              <form class="form-horizontal" action="<?php echo site_url('bukutamu/update')?>" method="post">
                <div class="card-body">
                  <input type="hidden" class="form-control" value="<?php echo $b['id_tamu'];?>" name="id">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['nama_tamu'];?>" name="nama" required oninvalid="this.setCustomValidity('Nama Guru tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $b['email_tamu'];?>" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Saran</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="saran" required oninvalid="this.setCustomValidity('Saran Tamu tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $b['saran_tamu'];?></textarea>
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