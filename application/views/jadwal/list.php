<?php $b=$tampil->row_array();?>
<script>
function hapusitem(id) {
pesan = confirm('Hapus Jadwal Ini ?');
		if (pesan) {
		var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
		var id = id;
		var datanya = "&id=" + id + "&Ratusemut.com=" + csrf_nilai;
		$.ajax({
		url: "<?php echo site_url('jadwal/hapus'); ?>",
		data: datanya,
		type: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
		if (data.sukses) {
			alert(data.sukses);
			jadwal();
		}
		}
		})
		} else
		return false;
}
</script>
<!-- Default box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Jadwal Pelajaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Hari</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Senin</td>
                      <td><a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modaltambah1">Tambah</a><br>
						<table class="table">
						<tbody>
						<?php 
							foreach ($senin->result_array() as $k){
							$id=$k['id_jadwal'];
							?>
						<tr>
							<td><?php echo $k['nama_mapel'];?></td>
							<td><?php echo $k['jam_msk_jadwal'];?> - <?php echo $k['jam_keluar_jadwal'];?></td>
							<td><?php echo $k['nama_guru'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button></td>
						</tr>
						<?php } ?>						
						</table>
					  </td>
                    </tr>
					<tr>
                      <td>Selasa</td>
                      <td><a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modaltambah2">Tambah</a><br>
						<table class="table">
						<tbody>
						<?php 
							foreach ($selasa->result_array() as $k){
							$id=$k['id_jadwal'];
							?>
						<tr>
							<td><?php echo $k['nama_mapel'];?></td>
							<td><?php echo $k['jam_msk_jadwal'];?> - <?php echo $k['jam_keluar_jadwal'];?></td>
							<td><?php echo $k['nama_guru'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button></td>
						</tr>
						<?php } ?>						
						</table>
					  </td>
                    </tr>
					<tr>
                      <td>Rabu</td>
                      <td><a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modaltambah3">Tambah</a><br>
						<table class="table">
						<tbody>
						<?php 
							foreach ($rabu->result_array() as $k){
							$id=$k['id_jadwal'];
							?>
						<tr>
							<td><?php echo $k['nama_mapel'];?></td>
							<td><?php echo $k['jam_msk_jadwal'];?> - <?php echo $k['jam_keluar_jadwal'];?></td>
							<td><?php echo $k['nama_guru'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button></td>
						</tr>
						<?php } ?>						
						</table>
					  </td>
                    </tr>
					<tr>
                      <td>Kamis</td>
                      <td><a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modaltambah4">Tambah</a><br>
						<table class="table">
						<tbody>
						<?php 
							foreach ($kamis->result_array() as $k){
							$id=$k['id_jadwal'];
							?>
						<tr>
							<td><?php echo $k['nama_mapel'];?></td>
							<td><?php echo $k['jam_msk_jadwal'];?> - <?php echo $k['jam_keluar_jadwal'];?></td>
							<td><?php echo $k['nama_guru'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button></td>
						</tr>
						<?php } ?>						
						</table>
					  </td>
                    </tr>
					<tr>
                      <td>Jumat</td>
                      <td><a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modaltambah5">Tambah</a><br>
						<table class="table">
						<tbody>
						<?php 
							foreach ($jumat->result_array() as $k){
							$id=$k['id_jadwal'];
							?>
						<tr>
							<td><?php echo $k['nama_mapel'];?></td>
							<td><?php echo $k['jam_msk_jadwal'];?> - <?php echo $k['jam_keluar_jadwal'];?></td>
							<td><?php echo $k['nama_guru'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button></td>
						</tr>
						<?php } ?>						
						</table>
					  </td>
                    </tr>
					<tr>
                      <td>Sabtu</td>
                      <td><a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Modaltambah6">Tambah</a><br>
						<table class="table">
						<tbody>
						<?php 
							foreach ($sabtu->result_array() as $k){
							$id=$k['id_jadwal'];
							?>
						<tr>
							<td><?php echo $k['nama_mapel'];?></td>
							<td><?php echo $k['jam_msk_jadwal'];?> - <?php echo $k['jam_keluar_jadwal'];?></td>
							<td><?php echo $k['nama_guru'];?></td>
							<td><button type="button" class="btn btn-danger" onclick="return hapusitem('<?php echo $id ?>')">
							<i class="fa fa-trash"></i>
							</button></td>
						</tr>
						<?php } ?>						
						</table>
					  </td>
                    </tr>
				</div>
                <div class="card-footer"></div>
                <!-- /.card-footer -->
			</div>	
	
