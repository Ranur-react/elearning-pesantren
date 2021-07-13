<script>
function detailsoal() {
	var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
	var id = $('input[name="id"]').val();
	var datanya = "&id=" + id + "&Ratusemut.com=" + csrf_nilai;
	$.ajax({
		url: "<?php echo site_url('latihan/tampilsoal'); ?>",
		data: datanya,
		type: "post",
		cache: false,
		beforeSend: function () {
			$('.detailsoal').show();
			$('.detailsoal').html('<i  class="fa  fa-spin  fa-spinner"></i>  Sedang  di Tampilkan');
		},
		success: function (data) {
			$('.detailsoal').html(data);
		}
	})
}
$(document).ready(function () {
detailsoal();
})
</script>
<?php
	$level=$this->session->userdata('level');
	if($level==2){
	?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>latihan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- Default box -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data latihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>			  
              <form class="form-horizontal" action="<?php echo site_url('latihan/simpan')?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Id latihan</label>
                    <div class="col-sm-8">
                      <label class="text-success"><?php echo $id;?></label>
					  <input type="hidden" name="id" value="<?php echo $id?>"/>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tgl. Mulai</label>
                    <div class="col-sm-8">
                      <input type="datetime-local" name="tglmulai" required oninvalid="this.setCustomValidity('Tgl.Mulai tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control" />
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tgl.Selesai</label>
                    <div class="col-sm-8">
					  <input type="datetime-local" required oninvalid="this.setCustomValidity('Tgl.Selesai tidak boleh kosong')" oninput="setCustomValidity('')" name="tglselesai" class="form-control" />
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
				<div class="card-footer"></div>
              
            </div>
          </div>
			<div class="col-md-6">
            <!-- Default box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Latihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Matapelajaran</label>
                    <div class="col-sm-8">
                      <select required oninvalid="this.setCustomValidity('Matapelajaran tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control" name="mapel"> 
						<option selected value="">==Silahkan Pilih==</option>
							<?php 
							foreach ($datamapel->result_array() as $k){
							echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
							}
							?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <select required oninvalid="this.setCustomValidity('Kelas tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control" name="kelas"> 
						<option selected value="">==Silahkan Pilih==</option>
							<?php 
							foreach ($datakelas->result_array() as $k){
							echo '<option value="'.$k['id_kelas'].'">'.$k['nama_kelas'].'</option>';
							}
							?>
						</select>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Waktu</label>
                    <div class="col-sm-6">
                      <input type="number" required oninvalid="this.setCustomValidity('Waktu pengerjaan tidak boleh kosong')" oninput="setCustomValidity('')" name="waktu" class="form-control" />
                    </div>
					<label class="col-sm-2 col-form-label">/ Menit</label>
                  </div>

                 </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
                <!-- /.card-footer -->
			</div>	
            </div>
          </div>
		<div class="row">
		<div class="col-md-12">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Latihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
				
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Latihan</label>
                    <div class="col-sm-10">
                      <input type="text" required oninvalid="this.setCustomValidity('Judul tidak boleh kosong')" oninput="setCustomValidity('')" name="judul" class="form-control" />
                    </div>
                  </div>

                 </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
                <!-- /.card-footer -->
			</div>	
			</div>
		</div>
		<div class="detailsoal" style="display: none;"></div>
		<!------ -->
		
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-primary">
				  <div class="card-body">
					<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
					<button type="reset" class="btn btn-default"><i class="fas fa-spinner"></i> Reset</button>					
				  </div>
				  <div class="card-footer"></div>
                <!-- /.card-footer -->
				  <!-- /.card-body -->
				</div>
			</div>
		</div>
		</form>
		</div>
    </section>
    <!-- /.content -->
<!-- modal soal -->
        <div class="modal fade" id="Modalsoal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<script>
			function pilih1(idb) {
			var id = $('input[name="id"]').val();
			var idb = idb;
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&idb=" + idb +"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('latihan/simpantemp'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							detailsoal();
							$('#Modalsoal').modal('hide');
						}
					}
				})
			
			};
			</script>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
					<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Pilih Soal </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                    </div>
                    <div class="modal-body">
					<table id="example3" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>No</th>
						  <th>Soal</th>
						  <th>Mapel</th>
						  <th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$no=0;
							foreach ($data->result_array() as $i) :
							$no++;
							$idb=$i['id_soal'];
							$soal=$i['soal'];
							$mapel=$i['nama_mapel'];
							$guru=$i['guru_soal'];
						?>
						<tr>
						  <td><?php echo $no; ?></td>
						  <td><?php echo $soal;?></td>
						  <td><?php echo $mapel;?></td>
						  <td>
							<button type="button" class="btn btn-primary" onclick="return pilih1('<?php echo $idb ?>')">
							Pilih
							</button>
						  </td>
						</tr>
						<?php endforeach;?>
						</tbody>
						<tfoot>
						<tr>
						 <th>No</th>
						  <th>Soal</th>
						  <th>Mapel</th>
						  <th>Aksi</th>
						</tr>
						</tfoot>
					  </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>