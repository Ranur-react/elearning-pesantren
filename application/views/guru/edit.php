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
                <h3 class="card-title">Edit Guru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$data->row_array();?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('Guru/update')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" readonly value="<?php echo $b['nip'];?>" name="nip" required oninvalid="this.setCustomValidity('NIK boleh kosong')" oninput="setCustomValidity('')" placeholder="NIK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['nama_guru'];?>" name="nama" required oninvalid="this.setCustomValidity('Nama Guru tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" value="L" type="radio" <?php if($b['jenkel_guru']=="L")  echo "checked";?> name="jenkel">
                          <label class="form-check-label">Laki-Laki</label>
						</div>
					</div>
					<div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" value="P" <?php if($b['jenkel_guru']=="P")  echo "checked";?> type="radio" name="jenkel">
                          <label class="form-check-label">Perempuan</label>
						</div>
					</div>
					</div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $b['email_guru'];?>" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['pendidikan_guru'];?>" name="pendidikan" required oninvalid="this.setCustomValidity('Pendidikan Terakhir tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Pendidikan Terakhir">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Hp</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['notel_guru'];?>" name="nohp" required oninvalid="this.setCustomValidity('No.Hp tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NoHP">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat Guru tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $b['alamat_guru'];?></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
				  <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <img id="previewing" src="<?php echo base_url().'/images/guru/'.$b['foto_guru']?>" width="250" height="325"></br>
						<input type="file" name="foto" id="file">
						<input type="hidden" name="foto1" value="<?php echo $b['foto_guru']?>">
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