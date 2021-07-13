<script>
function detailsiswa() {
	var csrf_nilai = "<?php echo $this->security->get_csrf_hash(); ?>";
	var id = $('input[name="id"]').val();
	var datanya = "&id=" + id + "&Ratusemut.com=" + csrf_nilai;
	$.ajax({
		url: "<?php echo site_url('kelas/tampilsiswa1'); ?>",
		data: datanya,
		type: "post",
		cache: false,
		beforeSend: function () {
			$('.detailsiswa').show();
			$('.detailsiswa').html('<i  class="fa  fa-spin  fa-spinner"></i>  Sedang  di Tampilkan');
		},
		success: function (data) {
			$('.detailsiswa').html(data);
		}
	})
}
$(document).ready(function () {
detailsiswa();
})
</script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelas</h1>
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
                <h3 class="card-title">Lihat Detail Kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo $this->session->flashdata('pesan');?>
			  <?php $b=$datakelas->row_array();?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Id Kelas</label>
                    <div class="col-sm-8">
                      <label class="form-label"><?php echo $b['id_kelas'];?></label>
					  <input type="hidden" name="id" value="<?php echo $b['id_kelas'];?>"/>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Kelas</label>
                    <div class="col-sm-8">
                      <label class="form-label"><?php echo $b['nama_kelas'];?></label>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Wali Kelas</label>
                    <div class="col-sm-8">
                      <label class="form-label">-----</label>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-8">
                      <label class="form-label">
					  <?php 
						  $bulan=date('m');
						  $tahun=date('Y');
						  
						  if ($bulan <= 6){
						  $ta=$tahun - 1;
						  echo $ta . '/' .$tahun;
						  };
						  if ($bulan > 6){
						  $ta=$tahun + 1;
						  echo $tahun . '/' .$ta;
						  }
						  ?>
						  </label>
                    </div>
                  </div>
				</div>
                <!-- /.card-body -->
				<div class="card-footer"></div>
              
            </div>
          </div>
		</div>
		<div class="detailsiswa" style="display: none;"></div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-primary">
				  <div class="card-body">
					<a type="button" target="_blank" href="<?php echo base_url().'kelas/cetak1/'.$b['id_kelas']?>" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
					<a type="button" href="<?php echo base_url().'kelas'?>" class="btn btn-default"><i class="fas fa-backward"></i> Kembali</a>					
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