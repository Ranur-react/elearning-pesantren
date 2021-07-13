<!-- Content Header (Page header) -->
<script>
$(document).ready(function(){
	$(window).scroll(function(){
		if ($(window).scrollTop() > 100) {
			$('#tombolScrollTop').fadeIn();
		} else {
			$('#tombolScrollTop').fadeOut();
		}
	});
});

function scrolltotop()
{
	$('html, body').animate({scrollTop : 0},500);
}
</script>
<style type="text/css">
/* Back to Top Pure CSS by igniel.com */
html {scroll-behavior:smooth;}
.ignielToTop {width:50px; height:50px; position:fixed; bottom:30px; right: 30px; z-index:99; cursor:pointer; border-radius:100px; transition:all .5s; background:#008c5f url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z' fill='%23fff'/%3E%3C/svg%3E") no-repeat center center;}
.ignielToTop:hover {background:#1d2129 url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z' fill='%23fff'/%3E%3C/svg%3E") no-repeat center center;}
</style>
<style type="text/css">
.act-btn{
      background:#00848d;
      display: block;
      width: 50px;
      height: 50px;
      line-height: 50px;
      text-align: center;
      color: white;
      font-size: 30px;
      font-weight: bold;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      text-decoration: none;
      transition: ease all 0.3s;
      position: fixed;
      right: 30px;
      bottom:85px;
    }
.act-btn:hover{background: #1d2129}

</style>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Forum</h1>
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
              <div class="card-body">
                <div class="callout callout-danger">
                  <h5>Peringatan !</h5>

                  <p>Mohon menggunkan kata-kata yang sopan selama berdiskusi di forum ini demi kenyamanan kita bersama ....</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
       <div class="row">
	   <?php echo $this->session->flashdata('pesan');?>
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
			  <?php
					foreach ($date->result_array() as $i) :
					$tgl=$i['tgl'];
					$a=date("d",strtotime($i['tgl']));
				?>
              <div class="time-label">
                <span class="<?php if ($a % 2 == 0){echo 'bg-red';}else{echo 'bg-green';}?>"><?php echo tanggal_indonesia($tgl);?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
				  <?php
					foreach ($post->result_array() as $i) :
					$id=$i['id_forum'];
					$judul=$i['judul_forum'];
					$mapel=$i['nama_mapel'];
					$isi=$i['isi_forum'];
					$aut=$i['author'];
					$tgl1=date("Y-m-d",strtotime($i['created']));
					?>
				  <div>
				  <?php if($tgl==$tgl1) {?>
					<i class="fas fa-user bg-blue"></i>
					<div class="timeline-item">
					  <span class="time"><i class="fas fa-clock"></i> <?php echo date("H:i",strtotime($i['created']));?></span>
					  <h3 class="timeline-header"><font color="green"><?php echo $judul;?></font> <font color="blue"> <?php echo $mapel;?></font></h3>

					  <div class="timeline-body">
						<p><i class="fas fa-user bg-blue"></i> Penulis : <?php echo $aut?></p>
						<?php echo $isi;?>
					  </div>
					  <div class="timeline-footer">
						<a href="<?php echo base_url('forum/komentari/'.$id)?>" class="btn btn-warning btn-sm">Komentari</a>
						<?php $user=$_SESSION['nama'];if ($user==$aut) {?>
						<a onclick="konfirmasiDulu()" class="btn btn-danger btn-sm">Delete</a>
						<script>
						function konfirmasiDulu(){
							var konfirmasi = confirm("Apakah anda yakin ingin menghapus forum ini ??");
							if(konfirmasi === true) {
								window.location='<?php echo base_url('forum/hapus/'.$id)?>';
							}else{
								return true;
								}
							}
						</script>
						<?php }?>
					  </div>
					  <div class="card collapsed-card">
						  <div class="card-header">
							<h3 class="card-title"><i class="fas fa-comments bg-yellow"></i> Show Komentar</h3>

							<div class="card-tools">
							  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
							  </button>
							</div>
							<!-- /.card-tools -->
						  </div>
						  <!-- /.card-header -->
						  <div class="card-body" style="display: none;">
							<?php
								foreach ($komentar->result_array() as $i) :
								$idk=$i['id_komentar'];
								$idkf=$i['id_forum_komentar'];
								$isik=$i['isi_komentar'];
								$autk=$i['author_komentar'];
								$tglk=$i['created_komentar'];
								$tglkk=date("Y-m-d",strtotime($tglk));
								$tglkkk=date("H:i",strtotime($tglk));
							?>
								<?php if($id==$idkf){?>
									<br>
									<?php echo "<span class='time'><i class='far fa-clock'></i><font color='blue'> ".tanggal_indonesia($tglkk).", ".$tglkkk."</font></span>"?>
									<br>
									<?php if($aut==$autk){?> <?php echo "<font color='green'> Author ".$autk."</font>"?> <?php }else{?> <?php echo "<font color='red'> ".$autk."</font>"?> <?php }?> mengomentari : <br> <?php echo $isik;?>
										<?php if ($user==$autk) {?>
										<br>
										<a onclick="konfirmasiDulu1()" class="btn btn-danger btn-sm"><font color="white">Delete</font></a>
										<script>
										function konfirmasiDulu1(){
											var konfirmasi = confirm("Apakah anda yakin ingin menghapus komentar ini ??");
											if(konfirmasi === true) {
												window.location='<?php echo base_url('forum/hapuskom/'.$idk)?>';
											}else{
												return true;
												}
											}
										</script>
										<?php }?>
									<hr>
									<?php }?> 
							<?php endforeach;?>
						  </div>
						  <!-- /.card-body -->
						</div>
					</div>
					<?php }?>
				  </div>
				  <?php endforeach;?>
			  <?php endforeach;?>
              <!-- END timeline item -->
              <!-- timeline time label -->
            </div>
          </div>
		  <a href="#" class="ignielToTop"></a>
		  <a data-toggle="modal" data-target="#Modaltambah" class="act-btn">
			  <font color="white">+</font>
			</a>

          <!-- /.col -->
        </div>
	  </div>
    </section>
    <!-- /.content -->
<!--Modal Tambah Pengguna-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel2">Tambah Forum</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
				</div>
                <form class="form-horizontal" action="<?php echo base_url().'forum/simpan'?>" method="post">
                    <div class="modal-body">
						<div class="form-group row">
						<div class="col-sm-12">
						<select required="required" class="form-control" name="mapel">
						<option selected value="">=Silahkan Pilih=</option>
							<?php
							foreach ($datamapel->result_array() as $k){
							echo '<option value="'.$k['id_mapel'].'">'.$k['nama_mapel'].'</option>';
							}
							?>
						</select>
						</div>
						</div>
						<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="judul" required oninvalid="this.setCustomValidity('Forum tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Judul Forum" />
						</div>
						</div>
						<div class="form-group row">
						<div class="col-sm-12">
							<textarea name="isi" class="textarea" placeholder="Inputkan Soal" required oninvalid="this.setCustomValidity('Isi tidak boleh kosong')" oninput="setCustomValidity('')" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Isi Forum ...</textarea>
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-round btn-primary" id="simpan">Simpan</button>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
