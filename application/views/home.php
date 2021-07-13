<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
	  <?php
		$level=$this->session->userdata('level');
		if($level==1){
		?>
		<?php $a=$pelajaran->row_array();?>
		<?php $b=$siswa->row_array();?>
		<?php $c=$guru->row_array();?>
		<?php $d=$tamu->row_array();?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $a['total'];?></h3>

                <p>Pelajaran</p>
              </div>
              <div class="icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <a href="<?php echo base_url('mapel')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $b['total'];?></h3>

                <p>Siswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="<?php echo base_url('siswa');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $c['total'];?></h3>

                <p>Guru</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?php echo base_url('guru');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $d['total'];?></h3>

                <p>Buku Tamu</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="<?php echo base_url('bukutamu');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
	<?php }?>	
		<div class="row">
          <div class="col-md-3">
			<?php echo $this->session->flashdata('pesan');?>
			<?php $b=$post->row_array();?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('')?><?php echo $b['foto_user'];?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $b['nama_user'];?></h3>

                <p class="text-muted text-center"><?php if($b['level_user']==1)
				{echo 'Admin';}
				if($b['level_user']==2){echo 'Guru';}
				if($b['level_user']==3){echo 'Siswa';}?></p>
                <button data-toggle="modal" data-target="#Modalf" class="btn btn-primary btn-block"><i class="fas fa-camera"></i><b> Ganti Foto</b></button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><?php $jk=$b['jenkel_user'];if($jk=='L'){echo '<i class="fas fa-male mr-1"></i> Laki-Laki';}elseif($jk=='P'){echo '<i class="fas fa-female mr-1"></i> Perempuan';}?></strong>
				<?php
				  $level=$this->session->userdata('level');
				  if($level==3){
				  ?>
				<strong><i class="fas fa-book mr-1"></i> Kelas</strong>
                <p class="text-muted">
                  <?php $username=$b['username'];
						$query = $this->db->query("select * from siswa join kelas on id_kelas=kelas_siswa where nis='$username'");		
						$c=$query->row_array();
						echo $c['nama_kelas'];
					?>
                </p>
				<?php }?>
                <hr>
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p class="text-muted"><?php echo $b['email_user'];?></p>
                <hr>
                <strong><i class="fas fa-phone mr-1"></i> No.Telpon</strong>
                <p class="text-muted"><?php echo $b['notel_user'];?></p>
				<hr>
				<strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted"><?php echo $b['alamat_user'];?></p>
				<hr>
				<strong><i class="fas fa-circle text-success"></i> Active</strong>
                <p class="text-muted"> <?php echo $tgl2=date("H:i",strtotime($b['aktiftgl'])); ?>, <?php $tgl1=date("Y-m-d",strtotime($b['aktiftgl']));echo tanggal_indonesia($tgl1);?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#pengumuman" data-toggle="tab"><i class="fas fa-bullhorn"></i> Pengumuman</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-cog"></i> Pengaturan</a></li>
				  <li class="nav-item"><a class="nav-link" href="#ganti" data-toggle="tab"><i class="fas fa-wrench"></i> Ganti Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="pengumuman">
                    <!-- Post -->
                    <div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
					  <thead>
						<tr>
							<th>Tanggal</th>
							<th>Judul</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							foreach ($pengumuman->result_array() as $i) :
							$id=$i['id_pengumuman'];
							$judul=$i['judul_pengumuman'];
							$ket=$i['ket_pengumuman'];
							$tgl=$i['tgl_pengumuman'];
							$foto=$i['foto_pengumuman'];
						?>
						<tr>
							<td><?php $tgl1=date("Y-m-d",strtotime($tgl));echo tanggal_indonesia($tgl1);?>, <?php echo $tgl2=date("H:i",strtotime($tgl)); ?></td>
							<td><a data-toggle="modal" data-target="#ModalP" class="btn" ><?php echo character_limiter($judul,50);?><a></td>
						</tr>				
<!--Modal Pengumuman-->
        <div class="modal fade" id="ModalP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2"><?php echo $judul;?></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                    </div>
					<div class="modal-body">
						<div class="col-sm-12">
							<div align="center">
							<img src="<?php echo base_url('images/pengumuman/');?><?php echo $foto;?>" height="70%" width="50%">
							</div>
							<br>
							<p>
								<i class="fas fa-clock"></i><?php $tgl1=date("Y-m-d",strtotime($tgl));echo tanggal_indonesia($tgl1);?><br>
								<?php echo $ket;?>
							</p>
						</div>
					</div>	
					<div class="modal-footer justify-content-between">
					  
					</div>
                </div>
            </div>
        </div>
<!--END Modal Pengumuman-->
						<?php endforeach;?>
					  </tbody>
                     </table>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
				  <?php
					  $level=$this->session->userdata('level');
					  if($level==1){
					  ?>
                    <form class="form-horizontal" action="<?php echo base_url().'dashboard/update'?>" method="post">
					<?php }?>
				  <?php
					  $level=$this->session->userdata('level');
					  if($level==2){
					  ?>
                    <form class="form-horizontal" action="<?php echo base_url().'dashboard/updateg'?>" method="post">
					<?php }?>
					<?php
					  $level=$this->session->userdata('level');
					  if($level==3){
					  ?>
                    <form class="form-horizontal" action="<?php echo base_url().'dashboard/updates'?>" method="post">
					<?php }?>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" value="<?php echo $b['nama_user']?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Name">
						  <input type="hidden" name="id" value="<?php echo $b['username']?>">
                        </div>
                      </div>
					  <div class="form-group row">
						<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-10">
						  <select name="jenkel" class="custom-select">
							  <option>==Pilih==</option>
								<?php if ($b['jenkel_user']=='L'){
								echo "<option value='L' selected>Laki-laki</option>";
								}else{
								echo "<option value='L'>Laki-laki</option>";
								}?>
								<?php if ($b['jenkel_user']=='P'){
								echo "<option value='P' selected>Perempuan</option>";
								}else{
								echo "<option value='P'>Perempuan</option>";
								}?>
							</select>
						</div>
						</div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" value="<?php echo $b['email_user'];?>" name="email" required oninvalid="this.setCustomValidity('E-mail tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">No.Telpon</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $b['notel_user'];?>" name="notel" required oninvalid="this.setCustomValidity('No.Telpon tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No.Telpon">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Alamat"><?php echo $b['alamat_user'];?> </textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info"> <i class="fas fa-save"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
				  <div class="tab-pane" id="ganti">
				  
                    <form class="form-horizontal" action="<?php echo base_url().'dashboard/change'?>" method="post">					
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="pwl" required oninvalid="this.setCustomValidity('Password Lama boleh kosong')" oninput="setCustomValidity('')" placeholder="Password Lama">
                        </div>
                      </div>
					  <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="pwb" required oninvalid="this.setCustomValidity('Password Baru boleh kosong')" oninput="setCustomValidity('')" placeholder="Password Baru">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info"> <i class="fas fa-save"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
<!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
                        
			</div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<!-- /.content -->

<!--Modal Ganti Foto-->
        <div class="modal fade" id="Modalf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Ganti Foto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                    </div>
					<?php
					$level=$this->session->userdata('level');
					if($level==1){
					?>
					<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('dashboard/upfoto')?>" method="post">
					<?php }?>
					<?php
					$level=$this->session->userdata('level');
					if($level==2){
					?>
					<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('dashboard/upfotog')?>" method="post">
					<?php }?>
					<?php
					$level=$this->session->userdata('level');
					if($level==3){
					?>
					<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('dashboard/upfotos')?>" method="post">
					<?php }?>
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-sm-12">
								<img id="previewing" src="<?php echo base_url().''.$this->session->userdata('foto');?>" width="250" height="325"></br>
							</div>
						</div>
						<div class="form-group row">
						<label class="col-sm-4 col-form-label">Input Foto Baru</label>
							<div class="col-sm-8">
								<input type="file" name="foto" id="file">
								<input type="hidden" name="id" value="<?php echo $this->session->userdata('username');?>">
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="submit" class="btn btn-primary">Save</button>
					</div>
					</form>
                </div>
            </div>
        </div>
<!--END Modal Ganti Foto-->