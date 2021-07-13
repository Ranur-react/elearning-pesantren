<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
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
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Kelas</h3>
				<?php echo $this->session->flashdata('pesan');?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Kelas</th>
				  <th>Kelas</th>
				  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					foreach ($post->result_array() as $i) :
					$id=$i['id_kelas'];
					$nama=$i['nama_kelas'];
					$ket=$i['wali_kelas'];
				?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $nama; ?></td>
				  <td>
					<a href="<?php echo base_url('jadwal/add/'.$id)?>"><button type="button" class="btn btn-block bg-gradient-success btn-xs"><span class="fa fa-plus"> Tambah / Edit Jadwal</button></a>
					<a href="<?php echo base_url('jadwal/lihatjadwal/'.$id)?>"><button type="button" class="btn btn-block bg-gradient-info btn-xs"><span class="fa fa-eye"> View Jadwal</button></a>
				  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id Kelas</th>
				  <th>Nama</th>
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

	  </div>
    </section>
    <!-- /.content -->
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
