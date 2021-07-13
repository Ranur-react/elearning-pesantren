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
                <h3 class="card-title">Edit Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$data->row_array();?>
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('siswa/update')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" readonly value="<?php echo $b['nis'];?>" name="nis" required oninvalid="this.setCustomValidity('NISN tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NISN">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['nama_siswa'];?>" name="nama" required oninvalid="this.setCustomValidity('Nama Siswa tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama">
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
								if($b['kelas_siswa']==$id)
								echo "<option value='$id' selected>$nama</option>";
								else
								echo "<option value='$id'>$nama</option>";
							}?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat/</br>Tgl.Lahir</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="<?php echo $b['tempatlahir_siswa'];?>" name="tempat" required oninvalid="this.setCustomValidity('Tempat Lahir tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Tempat Lahir">
                    </div>
					<div class="col-sm-4">
                      <input type="date" class="form-control" value="<?php echo $b['tgllahir_siswa'];?>" name="tgl" required oninvalid="this.setCustomValidity('Tgl.Lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select name="jenkel" class="custom-select">
                          <option>==Pilih==</option>
							<?php if ($b['jenkel_siswa']=='L'){
							echo "<option value='L' selected>Laki-laki</option>";
							}else{
							echo "<option value='L'>Laki-laki</option>";
							}?>
							<?php if ($b['jenkel_siswa']=='P'){
							echo "<option value='P' selected>Perempuan</option>";
							}else{
							echo "<option value='P'>Perempuan</option>";
							}?>
                        </select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $b['email_siswa'];?>" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Hp</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['notel_siswa'];?>" name="nohp" required oninvalid="this.setCustomValidity('No.Hp tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NoHP">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $b['alamat_siswa'];?></textarea>
                    </div>
                  </div>
				  <div class="form-group row">
				  <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <img id="previewing" src="<?php echo base_url().'/images/siswa/'.$b['foto_siswa']?>" width="250" height="325"></br>
						<input type="file" name="foto" id="file">
						<input type="hidden" name="foto1" value="<?php echo $b['foto_siswa']?>">
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
                <h3 class="card-title">Data OrangTua Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Ayah</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['namaayah_siswa'];?>" name="namaayah" required oninvalid="this.setCustomValidity('Nama Ayah tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Ayah">
                    </div>
                   </div>
				   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Telpon Ayah</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['notelayah_siswa'];?>" name="notelayah" required oninvalid="this.setCustomValidity('No.Telpon Ayah tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No.Telpon Ayah">
                    </div>
                   </div>
				   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Ibu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['namaibu_siswa'];?>" name="namaibu" required oninvalid="this.setCustomValidity('Nama Ibu tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Ibu">
                    </div>
                   </div>
				   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.Telpon Ibu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $b['notelibu_siswa'];?>" name="notelibu" required oninvalid="this.setCustomValidity('No.Telpon tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No.Telpon Ibu">
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