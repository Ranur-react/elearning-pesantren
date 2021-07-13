<?php
  $level=$this->session->userdata('level');
  if($level==2){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Soal</h1>
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
                <h3 class="card-title">Input Soal </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <a href="<?php echo base_url('soal/add')?>"><button type="button" class="btn btn-block bg-gradient-info"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
                <h3 class="card-title">View Data Soal</h3>
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
					<th>Matapelajaran</th>
                  <th>Soal</th>
				  <th>Create</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post->result_array() as $i) :
					$soal=$i['soal'];
					$mapel=$i['nama_mapel'];
					$create=$i['created_on'];
					$tgl=date("Y-m-d",strtotime($create));
					$id=$i['id_soal'];
				?>
                <tr>
					  <td><?php echo $mapel; ?></td>
					  <td><?php echo $soal; ?></td>
					  <td><?php echo tanggal_indonesia($tgl); ?></td>
					  <td>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
					<th>Matapelajaran</th>
					  <th>Soal</th>
					  <th>Create</th>
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
  if($level==1 || $level==3){
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
              $id=$i['id_soal'];
              $soal=$i['soal'];
			  $gambar=$i['file'];
			  $gambar1=$i['file_a'];
			  $gambar2=$i['file_b'];
			  $gambar3=$i['file_c'];
			  $gambar4=$i['file_d'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Hapus </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url().'soal/hapus'?>" method="post">
                    <div class="modal-body">       
						<input type="hidden" name="id" value="<?php echo $id;?>"/> 
						<input type="hidden" name="gambar" value="<?php echo $gambar;?>"/> 
						<input type="hidden" name="gambar1" value="<?php echo $gambar1;?>"/> 
						<input type="hidden" name="gambar2" value="<?php echo $gambar2;?>"/> 
						<input type="hidden" name="gambar3" value="<?php echo $gambar3;?>"/> 
						<input type="hidden" name="gambar4" value="<?php echo $gambar4;?>"/> 
                            <p>Apakah Anda yakin mau menghapus soal ini</p><b>"<?php echo $soal;?>"</b>
                               
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