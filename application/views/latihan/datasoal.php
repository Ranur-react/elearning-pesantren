<script>
function hapusitem(idb) {
pesan = confirm('Hapus soal ini ??');
		if (pesan) {
		var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
		var id = $('input[name="id"]').val();
		var idb = idb;
		var datanya = "&id=" + id + "&idb=" + idb + "&Ratusemut.com=" + csrf_nilai;
		$.ajax({
		url: "<?php echo site_url('latihan/hapusitem'); ?>",
		data: datanya,
		type: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
		if (data.sukses) {
			alert(data.sukses);
		detailsoal();
		}
		}
		})
		} else
		return false;
}
</script>
<div class="row">
			<div class="col-md-12">
            <!-- Default box -->
			<div class="card collapsed-card card-info">
			
              <div class="card-header">
                <h3 class="card-title">List Soal</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
					<div class="input-group-append">
                       <button type="button" data-toggle="modal" data-target="#Modalsoal" class="btn-xs btn-danger"><i class="fa fa-plus"> Tambah Soal</i></button>
					   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
			  
            <!-- Default box -->
            <!-- /.card -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Soal</th>
					  <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					$no=0;
					foreach ($tampil->result_array() as $i) :
					$no ++;
					$id=$i['id'];
					$judul=$i['soal'];
					?>
                    <tr>
                      <td><?php echo $no;?></td>					  
                      <td><?php $j=character_limiter($judul,20); echo $j;?></td>
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
</div>

