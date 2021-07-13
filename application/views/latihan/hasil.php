<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hasil Latihan</h1>
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
                <h3 class="card-title">Filter Data Berdasarkan Kelas Dan Matapelajaran</h3>
				<?php echo $this->session->flashdata('pesan');?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
			  <form class="form-horizontal" target="_blank" action="<?php echo site_url('latihan/cetak')?>" method="post">
			  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Latihan</label>
                    <div class="col-sm-10">
                      <select required="required" class="form-control" name="lat">
						<option selected value="">=Silahkan Pilih=</option>
							<?php
							foreach ($dataujian->result_array() as $k){
							echo '<option value="'.$k['id_ujian'].'">'.$k['nama_ujian'].'</option>';
							}
							?>
						</select>
                    </div>
                  </div>
			  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <select required="required" class="form-control" name="kelas">
						<option selected value="">=Silahkan Pilih=</option>
							<?php
							foreach ($datakelas->result_array() as $k){
							echo '<option value="'.$k['id_kelas'].'">'.$k['nama_kelas'].'</option>';
							}
							?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
					<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Print</button>
				  </div>
				  </form>
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
				  <th>No</th>
                  <th>Nama Latihan</th>
				  <th>Score</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$no=0;
					foreach ($post1->result_array() as $i) :
					$no++;
					$id=$i['id_hasil'];
					$nlatihan=$i['nama_ujian'];
					$score=$i['score'];
				?>
                <tr>
				  <td><?php echo $no;?></td>
				  <td><?php echo $nlatihan;?></td>
				  <td><?php echo $score;?></td>
				  <td>
					<a alt="Edit Data" target="_blank" class="btn" href="<?php echo base_url().'latihan/cetak/'.$id;?>"><span class="fa fa-print"></span></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
				<tfoot>
                <tr>
                 <th>No</th>
                  <th>Nama Latihan</th>
				  <th>Score</th>
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
