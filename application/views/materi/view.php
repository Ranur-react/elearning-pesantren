<?php
  $level=$this->session->userdata('level');
  if($level==1 || $level==2){
  ?>
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
                <a href="<?php echo base_url('materi/add')?>"><button type="button" class="btn btn-block bg-gradient-info"><i class="fas fa-plus"></i> Tambah Data</button></a>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                `
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
                  <th>Tanggal Upload</th>
				  <th>Judul</th>
				  <th>Kelas</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post->result_array() as $i) :
					$id=$i['id_materi'];
					$judul=$i['judul_materi'];
					$tgl=$i['tgl_materi'];
					$kls=$i['nama_kelas'];
				?>
                <tr>
					  <td><?php $tgl1=date("Y-m-d",strtotime($tgl));echo tanggal_indonesia($tgl1);?></td>
					  <td><?php echo $judul; ?></td>
					  <td><?php echo $kls; ?></td>
					  <td>
					<a alt="Edit Data" class="btn" href="<?php echo base_url().'materi/edit/'.$id;?>"><span class="fa fa-edit"></span></a>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
					<th>Tanggal Upload</th>
					<th>Judul</th>
					<th>Kelas</th>
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
	
<?php foreach ($post->result_array() as $i) :
              $id=$i['id_materi'];
              $judul=$i['judul_materi'];
			  $file=$i['file_materi'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Hapus </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url().'materi/hapus'?>" method="post">
                    <div class="modal-body">       
						<input type="hidden" name="id" value="<?php echo $id;?>"/> 
						<input type="hidden" name="file" value="<?php echo $file;?>"/> 
                            <p>Apakah Anda yakin mau menghapus materi ini <b>"<?php echo $judul;?>"</b> </p>
                               
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
	
<?php }?>


<?php
  $level=$this->session->userdata('level');
  if($level==3){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Materi Pelajaran</h1>
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
              <div class="card-body">
                <h4 class="card-title"><font color="red">*** Silahkan Donwload Materi Pelajaran Yang Tersedia Dengan Meng-klik Icon </font><span class="fa fa-download"></span></h4>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
		<?php
			foreach ($post1->result_array() as $i) :
			$idj=$i['id_mapel_jadwal'];
			$nama=$i['nama_mapel'];
		?>
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $nama;?> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-plus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
				<?php
					foreach ($post2->result_array() as $i) :
					$idm=$i['id_mapel_materi'];
					$nama=$i['judul_materi'];
					$file=$i['file_materi'];
					$tgl=$i['tgl_materi'];
					$tgl1=date("Y-m-d",strtotime($tgl));
				?>
				
				
				
				  <?php if($idj==$idm)
					{echo "<div class='callout callout-info'><font color='blue'><span class='time'><i class='far fa-clock'></i> ".tanggal_indonesia($tgl1)."</span></font> || ".$nama. " <a class='float-right' target='_blank' href='".base_url().'materi/donwload/'.$file."'><i class='fa fa-download'></i></a></div>";
					}
					?>
				<?php endforeach;?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer"></div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
		<?php endforeach;?>
	</div>	
  </section>
 <?php }?>