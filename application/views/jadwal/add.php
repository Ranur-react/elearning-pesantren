<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
<?php $b=$data->row_array();?>
<script>
function jadwal() {
	var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
	var id = "<?php echo $b['id_kelas'];?>";
	var datanya = "&id=" + id + "&Ratusemut.com=" + csrf_nilai;
	$.ajax({
		url: "<?php echo site_url('jadwal/list'); ?>",
		data: datanya,
		type: "post",
		cache: false,
		beforeSend: function () {
			$('.jadwal').show();
			$('.jadwal').html('<i  class="fa  fa-spin  fa-spinner"></i>  Sedang  di Tampilkan');
		},
		success: function (data) {
			$('.jadwal').html(data);
		}
	})
}
$(document).ready(function () {
jadwal();
})
</script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal</h1>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $c=$data->row_array();?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="form-label">Id Kelas</label>
                      <input type="text" class="form-control" readonly name="id" value="<?php echo $c['id_kelas']?>">
                  </div>
                  <div class="form-group row">
                    <label class="form-label">Kelas</label>
                      <input type="text" class="form-control" readonly name="kelas" value="<?php echo $c['nama_kelas']?>">
                  </div>
				  <div class="form-group row">
                    <label class="form-label">Wali Kelas</label>					
						<input type="text" class="form-control" readonly name="wali" value="<?php echo $c['nama_guru']?>">
                  </div>
                </div>
                <!-- /.card-body -->
				<div class="card-footer"></div>
            </div>
          </div>
		  </div>
		  <div class="row">
			<div class="col-md-12 jadwal" style="display: none;"></div>
		  </div>
		  <div class="row">
			<div class="col-12">
				<div class="card card-outline card-primary">
				  <div class="card-body">
					<a href="<?php echo base_url('jadwal');?>"><button type="submit" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</button></a>
				  </div>
				  <div class="card-footer"></div>
                <!-- /.card-footer -->
				  <!-- /.card-body -->
				</div>
			</div>
		</div>
		  
		</div>
    </section>
    <!-- /.content -->
	
<!--Modal Tambah Jadwal-->
       <div class="modal fade" id="Modaltambah1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <script>
			function pilih1() {
			var id = $('input[name="id"]').val();
			var hari = $('input[name="hari"]').val();
			var mapel = $('select[name="mapel"]').val();
			var msk = $('input[name="msk"]').val();
			var keluar = $('input[name="keluar"]').val();
			var guru = $('select[name="guru"]').val();
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&hari=" + hari + "&mapel=" + mapel + "&msk=" + msk + "&keluar=" + keluar + "&guru=" + guru +
					"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('jadwal/simpan'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							jadwal();
							$('#Modaltambah1').modal('hide');
						}
					}
				})
			
			};
			</script>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Tambah Jadwal Hari Senin </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <div class="modal-body">       
						<input type="hidden" name="id" value="<?php echo $b['id_kelas']?>"/> 
						<input type="hidden" name="hari" value="1"/> 
						<div class="form-group row">
							<label class="form-label">MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="mapel"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($mapel->result_array() as $k){
								echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="form-label">Guru MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Masuk</label>
							<div class="col-sm-8">
							  <input required oninvalid="this.setCustomValidity('Jam masuk tidak boleh kosong')" oninput="setCustomValidity('')" type="time" class="form-control" name="msk">
							  </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Keluar</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam keluar tidak boleh kosong')" oninput="setCustomValidity('')" name="keluar">
							  </div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" onclick="return pilih1('')" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
<!--Modal Tambah Jadwal Selasa-->
       <div class="modal fade" id="Modaltambah2" role="dialog" aria-labelledby="myModalLabel">
            <script>
			function pilih2() {
			var id = $('input[name="id1"]').val();
			var hari = $('input[name="hari1"]').val();
			var mapel = $('select[name="mapel1"]').val();
			var msk = $('input[name="msk1"]').val();
			var keluar = $('input[name="keluar1"]').val();
			var guru = $('select[name="guru1"]').val();
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&hari=" + hari + "&mapel=" + mapel + "&msk=" + msk + "&keluar=" + keluar + "&guru=" + guru +
					"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('jadwal/simpan'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							jadwal();
							$('#Modaltambah2').modal('hide');
						}
					}
				})
			
			};
			</script>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Tambah Jadwal Hari Selasa </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <div class="modal-body">       
						<input type="hidden" name="id1" value="<?php echo $b['id_kelas']?>"/> 
						<input type="hidden" name="hari1" value="2"/> 
						<div class="form-group row">
							<label class="form-label">MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="mapel1"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($mapel->result_array() as $k){
								echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="form-label">Guru MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru1"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Masuk</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam masuk tidak boleh kosong')" oninput="setCustomValidity('')" name="msk1">
							  </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Keluar</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam keluar tidak boleh kosong')" oninput="setCustomValidity('')" name="keluar1">
							  </div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" onclick="return pilih2('')" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
<!--Modal Tambah Jadwal Rabu-->
       <div class="modal fade" id="Modaltambah3" role="dialog" aria-labelledby="myModalLabel">
            <script>
			function pilih3() {
			var id = $('input[name="id2"]').val();
			var hari = $('input[name="hari2"]').val();
			var mapel = $('select[name="mapel2"]').val();
			var msk = $('input[name="msk2"]').val();
			var keluar = $('input[name="keluar2"]').val();
			var guru = $('select[name="guru2"]').val();
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&hari=" + hari + "&mapel=" + mapel + "&msk=" + msk + "&keluar=" + keluar + "&guru=" + guru +
					"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('jadwal/simpan'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							jadwal();
							$('#Modaltambah3').modal('hide');
						}
					}
				})
			
			};
			</script>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Tambah Jadwal Hari Rabu </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <div class="modal-body">       
						<input type="hidden" name="id2" value="<?php echo $b['id_kelas']?>"/> 
						<input type="hidden" name="hari2" value="3"/> 
						<div class="form-group row">
							<label class="form-label">MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="mapel2"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($mapel->result_array() as $k){
								echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="form-label">Guru MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru2"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Masuk</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam masuk tidak boleh kosong')" oninput="setCustomValidity('')" name="msk2">
							  </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Keluar</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam keluar tidak boleh kosong')" oninput="setCustomValidity('')" name="keluar2">
							  </div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" onclick="return pilih3('')" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
<!--Modal Tambah Jadwal Kamis-->
       <div class="modal fade" id="Modaltambah4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <script>
			function pilih4() {
			var id = $('input[name="id3"]').val();
			var hari = $('input[name="hari3"]').val();
			var mapel = $('select[name="mapel3"]').val();
			var msk = $('input[name="msk3"]').val();
			var keluar = $('input[name="keluar3"]').val();
			var guru = $('select[name="guru3"]').val();
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&hari=" + hari + "&mapel=" + mapel + "&msk=" + msk + "&keluar=" + keluar + "&guru=" + guru +
					"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('jadwal/simpan'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							jadwal();
							$('#Modaltambah4').modal('hide');
						}
					}
				})
			
			};
			</script>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Tambah Jadwal Hari Kamis </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <div class="modal-body">       
						<input type="hidden" name="id3" value="<?php echo $b['id_kelas']?>"/> 
						<input type="hidden" name="hari3" value="4"/> 
						<div class="form-group row">
							<label class="form-label">MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="mapel3"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($mapel->result_array() as $k){
								echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="form-label">Guru MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru3"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Masuk</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam masuk tidak boleh kosong')" oninput="setCustomValidity('')" name="msk3">
							  </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Keluar</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam keluar tidak boleh kosong')" oninput="setCustomValidity('')" name="keluar3">
							  </div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" onclick="return pilih4('')" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
<!--Modal Tambah Jadwal Jumat-->
       <div class="modal fade" id="Modaltambah5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <script>
			function pilih5() {
			var id = $('input[name="id4"]').val();
			var hari = $('input[name="hari4"]').val();
			var mapel = $('select[name="mapel4"]').val();
			var msk = $('input[name="msk4"]').val();
			var keluar = $('input[name="keluar4"]').val();
			var guru = $('select[name="guru4"]').val();
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&hari=" + hari + "&mapel=" + mapel + "&msk=" + msk + "&keluar=" + keluar + "&guru=" + guru +
					"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('jadwal/simpan'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							jadwal();
							$('#Modaltambah5').modal('hide');
						}
					}
				})
			
			};
			</script>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Tambah Jadwal Hari Jumat </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <div class="modal-body">       
						<input type="hidden" name="id4" value="<?php echo $b['id_kelas']?>"/> 
						<input type="hidden" name="hari4" value="5"/> 
						<div class="form-group row">
							<label class="form-label">MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="mapel4"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($mapel->result_array() as $k){
								echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="form-label">Guru MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru4"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Masuk</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam masuk tidak boleh kosong')" oninput="setCustomValidity('')" name="msk4">
							  </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Keluar</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam keluar tidak boleh kosong')" oninput="setCustomValidity('')" name="keluar4">
							  </div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" onclick="return pilih5('')" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
<!--Modal Tambah Jadwal Sabtu-->
       <div class="modal fade" id="Modaltambah6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <script>
			function pilih6() {
			var id = $('input[name="id5"]').val();
			var hari = $('input[name="hari5"]').val();
			var mapel = $('select[name="mapel5"]').val();
			var msk = $('input[name="msk5"]').val();
			var keluar = $('input[name="keluar5"]').val();
			var guru = $('select[name="guru5"]').val();
			var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
					var datanya = "&id=" + id + "&hari=" + hari + "&mapel=" + mapel + "&msk=" + msk + "&keluar=" + keluar + "&guru=" + guru +
					"&Ratusemut.com=" + csrf_nilai;
					$.ajax({
						url: "<?php echo site_url('jadwal/simpan'); ?>",
						data: datanya,
						type: 'post',
						dataType: 'json',
						cache: false,
					success: function (data) {
						if (data.sukses) {
							alert(data.sukses);	
							jadwal();
							$('#Modaltambah6').modal('hide');
						}
					}
				})
			
			};
			</script>
			<div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Tambah Jadwal Hari Sabtu </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                          </button>
                        </div>
                    <div class="modal-body">       
						<input type="hidden" name="id5" value="<?php echo $b['id_kelas']?>"/> 
						<input type="hidden" name="hari5" value="6"/> 
						<div class="form-group row">
							<label class="form-label">MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="mapel5"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($mapel->result_array() as $k){
								echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label>Guru MataPelajaran</label>
							<select required="required" class="form-control select2bs4" style="width: 100%;" name="guru5"> 
							<option selected value="">=Silahkan Pilih=</option>
								<?php 
								foreach ($guru->result_array() as $k){
								echo '<option value="'.$k['nip'].'">'.$k['nama_guru'].', '.$k['pendidikan_guru'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Masuk</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam masuk tidak boleh kosong')" oninput="setCustomValidity('')" name="msk5">
							  </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jam Keluar</label>
							<div class="col-sm-8">
							  <input type="time" class="form-control" required oninvalid="this.setCustomValidity('Jam keluar tidak boleh kosong')" oninput="setCustomValidity('')" name="keluar5">
							  </div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-round btn-primary" onclick="return pilih6('')" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
<?php }?>



		
<?php
  $level=$this->session->userdata('level');
  if($level==2 || $level==3){
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