<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Input Data Kelas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <a data-toggle="modal" data-target="#Modaltambah"><button type="button" class="btn btn-block bg-gradient-info"><i class="fas fa-plus"></i> Tambah Data</button></a>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
		<div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Data Kelas</h3>
				<?php echo $this->session->flashdata('pesan');?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Kelas</th>
				  <th>Nama</th>
				  <th>Wali Kelas</th>
				  <th>Thn.Ajaran</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post->result_array() as $i) :
					$id=$i['id_kelas'];
					$nama=$i['nama_kelas'];
					$wali=$i['nama_guru'];
				?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $nama; ?></td>				  
				  <td><?php echo $wali; ?></td>	
				  <td><?php 
					$sql=$this->db->query("select thnajaran from tahunajaran where id=1");
					$u=$sql->row_array();
					$thn=$u['thnajaran'];
					echo $thn; ?></td>	
				  <td>
					<a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>" alt="Edit Data"><span class="fa fa-edit"></span></a>
					<a class="btn" href="<?php echo base_url().'kelas/lihat/'.$id?>" alt="Lihat Data"><span class="fa fa-eye"></span></a>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id Kelas</th>
				  <th>Nama</th>
				  <th>Wali Kelas</th>
				  <th>Thn.Ajaran</th>
				  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
		<div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Histori Data Kelas</h3>
				<?php echo $this->session->flashdata('pesan');?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Kelas</th>
				  <th>Nama</th>
				  <th>Thn.Ajaran</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post1->result_array() as $i) :
					$id=$i['id_kelas_temp'];
					$nama=$i['nama_kelas'];
					$thn=$i['thn_temp'];
				?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $nama; ?></td>				  
				  <td><?php echo $thn; ?></td>				  
					<td>					
					<a class="btn" href="<?php echo base_url().'kelas/lihat1/'.$id?>" alt="Lihat Data"><span class="fa fa-eye"></span></a>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id Kelas</th>
				  <th>Nama</th>
				  <th>Thn.Ajaran</th>
				  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
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
<?php foreach ($post->result_array() as $i) :
              $id=$i['id_kelas'];
              $nama=$i['nama_kelas'];              
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Hapus Kelas</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kelas/hapus'?>" method="post">
                    <div class="modal-body">       
						<input type="hidden" name="id" value="<?php echo $id;?>"/> 						
                            <p>Apakah anda yakin mau menghapus kelas ini : <b>"<?php echo $nama;?>"</b> ?</p><br>
							<font color="red">***Seluruh daftar pelajaran yang bersangkutan dengan kelas ini akan terhapus</font>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>
<?php foreach ($post->result_array() as $i) :
              $id=$i['id_kelas'];
              $nama=$i['nama_kelas'];              
			  $wali=$i['wali_kelas'];
			  $pen=$i['pendidikan_guru'];
            ?>
	<!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Edit Kelas</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url().'kelas/update'?>" method="post">
                    <div class="modal-body">
						<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="nama" value="<?php echo $nama;?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Kelas" />                                
						</div>
						</div>
						<div class="form-group row">
						<div class="col-sm-12">
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru"> 
							<option selected value="">==Silahkan Pilih Wali Kelas==</option>
								<?php
								foreach ($guru->result_array() as $i) {
								$nip=$i['nip'];
								$nama=$i['nama_guru'];
								if($wali==$nip)
								echo "<option value='$nip' selected>$nama, $pen</option>";
								else
								echo "<option value='$nip'>$nama, $pen</option>";
							}?>
							</select>
						</div>
						</div>
						<input type="hidden" name="id" value="<?php echo $id;?>"/> 						
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" id="simpan">Edit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>	
<!--Modal Tambah Pengguna-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel2">Tambah Kelas</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
				</div>
                <form class="form-horizontal" action="<?php echo base_url().'kelas/simpan'?>" method="post">
                    <div class="modal-body"> 
						<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Kelas" />                                
						</div>
						</div>
						<div class="form-group row">
						<div class="col-sm-12">
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru"> 
							<option selected value="">==Silahkan Pilih Wali Kelas==</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-round btn-primary" id="simpan">Simpan</button>
						</div>
					</div>
				</form>
		</div>
	</div>	
</div>	