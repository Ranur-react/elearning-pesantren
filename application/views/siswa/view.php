<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Input Data </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <a href="<?php echo base_url('siswa/add')?>"><button type="button" class="btn btn-block bg-gradient-info"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Data </h3>
				<?php echo $this->session->flashdata('pesan');?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body table-responsive">
			  
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Foto</th>
                  <th>NIS</th>
				  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Email</th>
				  <th>Tingkat</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post->result_array() as $i) :
					$foto=$i['foto_siswa'];
					$nis=$i['nis'];
					$nama=$i['nama_siswa'];
					$alamat=$i['alamat_siswa'];
					$email=$i['email_siswa'];
					$tingkat=$i['tingkat_siswa'];
				?>
                <tr>
					<td><img style="width: 100px; height: 100px;" src="<?php echo base_url().'images/siswa/'.$foto?>"></td>     						
					  <td><?php echo $nis; ?></td>
					  <td><?php echo $nama; ?></td>
					  <td><?php echo $alamat; ?></td>
					  <td><?php echo $email; ?></td>
					  <td><?php if($tingkat==1){ ?> X <?php } ?> 
					  <?php if($tingkat==2){ ?> XI <?php } ?> 
					  <?php if($tingkat==3){ ?> XII <?php } ?> </td>
					  <td>
					<a alt="Edit Data" class="btn" href="<?php echo base_url().'siswa/edit/'.$nis;?>"><span class="fa fa-edit"></span></a>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $nis;?>"><span class="fa fa-trash"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
					<th>Foto</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>Tingkat</th>
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
              $nis=$i['nis'];
              $nama=$i['nama_siswa'];
			  $gambar=$i['foto_siswa'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $nis;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Hapus </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url().'siswa/hapus'?>" method="post">
                    <div class="modal-body">       
						<input type="hidden" name="nis" value="<?php echo $nis;?>"/> 
						<input type="hidden" name="gambar" value="<?php echo $gambar;?>"/> 
                            <p>Apakah Anda yakin mau menghapus siswa ini <b>"<?php echo $nama;?>"</b> </p>
                               
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