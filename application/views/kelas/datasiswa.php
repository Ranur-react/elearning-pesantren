<script>
function hapusitem(idb) {
pesan = confirm('Hapus Siswa Di Kelas Ini ?');
		if (pesan) {
		var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
		var id = idb;
		var datanya = "&id=" + id + "&Ratusemut.com=" + csrf_nilai;
		$.ajax({
		url: "<?php echo site_url('kelas/hapussiswa'); ?>",
		data: datanya,
		type: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
		if (data.sukses) {
			alert(data.sukses);
		detailsiswa();
		}
		}
		})
		} else
		return false;
}
</script>
<?php $c=$totsiswa->row_array();?>
<div class="row">
			<div class="col-md-12">
            <!-- Default box -->
			<div class="card">
			
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <div class="input-group-append">
                       <button type="button" data-toggle="modal" data-target="#Modalbuku" class="btn-xs btn-primary"><i class="fa fa-plus"> Tambah Siswa</i>
                    </div>
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
					  <th>Aksi</th>
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
					  <td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button>
						</td>
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

