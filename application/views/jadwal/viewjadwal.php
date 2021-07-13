 <?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lihat Jadwal Kelas <?php echo $this->uri->segment(3);?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Senin</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($senin->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Selasa</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($selasa->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Rabu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($rabu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Kamis</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($kamis->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Jumat</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($jumat->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Sabtu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($sabtu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?php echo base_url('jadwal');?>"><button type="submit" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</button></a> 
		  <a target="_blank" href="<?php $id=$this->uri->segment(3);echo base_url('jadwal/cetakjadwal/'.$id);?>"><button type="submit" class="btn bg-olive"><i class="fas fa-file-pdf"></i> Cetak Jadwal</button></a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
<?php
  }?>
  
  
 <?php
  $level=$this->session->userdata('level');
  if($level==2){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lihat Jadwal Mengajar <?php echo $this->session->userdata('nama');?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Senin</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($senin->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$kelas=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $kelas;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Selasa</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($selasa->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Rabu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($rabu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Kamis</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($kamis->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Jumat</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($jumat->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Sabtu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($sabtu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_kelas'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?php echo base_url('jadwal');?>"><button type="submit" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</button></a> 
		  <a target="_blank" href="<?php $id=$this->uri->segment(3);echo base_url('jadwal/cetakjadwalmengajar/'.$this->session->userdata('username'));?>"><button type="submit" class="btn bg-olive"><i class="fas fa-file-pdf"></i> Cetak Jadwal</button></a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
<?php
  }?>
  
  
<?php
  $level=$this->session->userdata('level');
  if($level==3){
  ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lihat Jadwal Pelajaran <?php echo $this->session->userdata('nama');?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Senin</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($senin->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$kelas=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $kelas;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Selasa</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($selasa->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Rabu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($rabu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Kamis</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($kamis->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Jumat</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($jumat->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2><u>Sabtu</u></h2>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
					<?php
					foreach ($sabtu->result_array() as $i) :
						$nama=$i['nama_mapel'];
						$guru=$i['nama_guru'];
						$msk=$i['jam_msk_jadwal'];
						$keluar=$i['jam_keluar_jadwal'];
					?>
						
						<h4 class="lead"><b><?php echo $nama;?></b></h4>
						<p class="text-muted text-sm"><b><?php echo $msk;?> - <?php echo $keluar?></b><br>(<?php echo $guru;?>)</p>
					<?php endforeach;?>
                    </div>
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?php echo base_url('jadwal');?>"><button type="submit" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</button></a> 
		  <a target="_blank" href="<?php $id=$this->uri->segment(3);echo base_url('jadwal/cetakjadwalpelajaran/'.$this->session->userdata('kelas'));?>"><button type="submit" class="btn bg-olive"><i class="fas fa-file-pdf"></i> Cetak Jadwal</button></a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
<?php
  }?>  