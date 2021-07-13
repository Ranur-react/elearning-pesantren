<?php $c=$totsiswa->row_array();?>
<div class="row">
			<div class="col-md-12">
            <!-- Default box -->
			<div class="card">
			
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
			  
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Siswa</th>
                      <th>Jenkel</th>
                      <th>Tingkat</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					$no=0;
					foreach ($tampil->result_array() as $i) :
					$no ++;
					$id=$i['nis'];
					$nama=$i['nama_siswa'];
					$jenkel=$i['jenkel_siswa'];
					$tingkat=$i['tingkat_siswa'];
					?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $nama;?></td>
                      <td><?php if ($jenkel=='L') {echo 'Laki-Laki';};?><?php if ($jenkel=='P') {echo 'Perempuan';};?></td>
					  <td><?php echo $tingkat;?></td>
                    </tr>
					<?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
			</div>
		</div>
<div class="row">
	<div class="col-md-12">
		<div class="card card-outline card-primary">
		  <div class="card-body">
			 <div class="form-group row">
                 <label class="col-sm-4 col-form-label">Jumlah Siswa Laki-Laki</label>                 
				 <div class="col-sm-8">
                 <label class="form-label"><?php echo $c['laki'];;?></label>
                  </div>
             </div>
			 <div class="form-group row">
                 <label class="col-sm-4 col-form-label">Jumlah Siswa Perempuan</label>                 
				 <div class="col-sm-8">
                 <label class="form-label"><?php echo $c['perempuan'];;?></label>
                  </div>
             </div>
			 <div class="form-group row">
                 <label class="col-sm-4 col-form-label">Total Siswa</label>
                 <div class="col-sm-8">
                 <label class="form-label"><?php echo $c['total'];?></label>
                  </div>
             </div>
		  </div>
		  <div class="card-footer"></div>
                <!-- /.card-footer -->
				  <!-- /.card-body -->
		</div>
	</div>
</div>

