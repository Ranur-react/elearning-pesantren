<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Latihan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <?php
		  $level=$this->session->userdata('level');
		  if($level==2){
		  ?>
		<div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Input Latihan </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <a href="<?php echo base_url('latihan/add')?>"><button type="button" class="btn btn-block bg-gradient-info"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
				  <th>Tgl.Mulai</th>
				  <th>Tgl.Selesai</th>
                  <th>Judul</th>
                  <th>Kelas</th>
				  <th>Mapel</th>
				  <th>Aksi</th>
                </tr>
                </thead>				
                <tbody>
                <?php
					foreach ($post->result_array() as $i) :
					$id=$i['id_ujian'];
					$tglmulai=$i['tgl_mulai'];
					$tglselesai=$i['tgl_selesai'];
					$judul=$i['nama_ujian'];
					$kelas=$i['nama_kelas'];
					$mapel=$i['nama_mapel'];
				?>
                <tr>
                  <td><font color="blue"><?php echo date("H:i",strtotime($tglmulai));?></font> <?php $tgl=date("Y-m-d",strtotime($tglmulai));echo tanggal_indonesia($tgl);?></td>
				  <td><font color="red"><?php echo date("H:i",strtotime($tglselesai));?></font> <?php $tgl1=date("Y-m-d",strtotime($tglselesai));echo tanggal_indonesia($tgl1);?></td>
				  <td><?php echo $judul;?></td>
				  <td><?php echo $kelas;?></td>
				  <td><?php echo $mapel;?></td>
				  <td>
					<a alt="Edit Data" class="btn" href="<?php echo base_url().'latihan/edit/'.$id;?>"><span class="fa fa-edit"></span></a>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
				<tfoot>
                <tr>
                 <th>Tgl.Mulai</th>
				  <th>Tgl.Selesai</th>
                  <th>Judul</th>
                  <th>Kelas</th>
				  <th>Mapel</th>
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
		<?php }?>
		
		  <?php
		  $level=$this->session->userdata('level');
		  if($level==3){
		  ?>
		<div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-exclamation-triangle"> Pehatian !!</i></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                Klik tombol "<i class="fas fa-play"></i>" untuk memulai mengerjakan latihan, jika tombol tidak muncul silahkan refresh halaman ini dan jika tidak muncul juga
				pastikan anda telah berada pada rentang waktu yang di sediakan untuk mengerjakan soal...
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
				  <th>Tgl.Mulai</th>
				  <th>Tgl.Selesai</th>
                  <th>Judul</th>
                  <th>Guru</th>
				  <th>Mapel</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post1->result_array() as $i) :
					$id=$i['id_ujian'];
					$tglmulai=$i['tgl_mulai'];
					$tglselesai=$i['tgl_selesai'];
					$judul=$i['nama_ujian'];
					$guru=$i['nama_guru'];
					$mapel=$i['nama_mapel'];
					$kelas=$i['kelas_ujian'];
				?>
                <tr>
                  <td><font color="blue"><?php echo date("H:i",strtotime($tglmulai));?></font> <?php $tgl=date("Y-m-d",strtotime($tglmulai));echo tanggal_indonesia($tgl);?></td>
				  <td><font color="red"><?php echo date("H:i",strtotime($tglselesai));?></font> <?php $tgl1=date("Y-m-d",strtotime($tglselesai));echo tanggal_indonesia($tgl1);?></td>
				  <td><?php echo $judul;?></td>
				  <td><?php echo $guru;?></td>
				  <td><?php echo $mapel;?></td>
				  <td>
					<?php 
						$query=$this->db->query("SELECT * FROM ujian WHERE kelas_ujian='$kelas' AND NOW() BETWEEN tgl_mulai AND tgl_selesai");
						$jml=$query->num_rows();
						if ($jml > 0){
					?>
					<a alt="Pre" class="btn" href="<?php echo base_url().'latihan/pre/'.$id;?>"><span class="fa fa-play"></span></a>
					<?php } else {?>
					<a alt="Pre" class="btn btn-block btn-info btn-xs" href="<?php echo base_url().'latihan/hasillatihan'?>"><span class="fa fa-eyes"></span> Lihat hasil latihan </a>
					<?php }?>
					
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
				<tfoot>
                <tr>
                 <th>Tgl.Mulai</th>
				  <th>Tgl.Selesai</th>
                  <th>Judul</th>
                  <th>Guru</th>
				  <th>Mapel</th>
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
		<?php }?>
	  </div>
    </section>
    <!-- /.content -->
	
<?php foreach ($post->result_array() as $i) :
              $id=$i['id_ujian'];
			  $nama=$i['nama_ujian'];              
			 
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
                    <form class="form-horizontal" action="<?php echo base_url().'latihan/hapus'?>" method="post">
                    <div class="modal-body">       
						<input type="hidden" name="id" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus  latihan <b>"<?php echo $id;?>"</b> Nama Soal <b>"<?php echo $nama;?>"</b> </p>
                               
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