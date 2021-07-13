<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_pesantren');
 
// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);
?>
<?php
						  $page = (isset($_POST['page']))? $_POST['page'] : 1;
						  $limit = 1; 
						  $limit_start = ($page - 1) * $limit;
						  $no = $limit_start + 1;
						  $user1=$_SESSION['rtsmmulai'];
						  $query = "SELECT * FROM tmp_soal join soal on id_soal=id_soal_temp where id_ujian_temp='$user1' ORDER BY id_soal_temp DESC LIMIT $limit_start, $limit";
						  $dewan1 = $db1->prepare($query);
						  $dewan1->execute();
						  $res1 = $dewan1->get_result();
						  while ($row = $res1->fetch_assoc()) {
								$id=$row['id_soal_temp'];
								$soal=$row['soal'];
								$a=$row['opsi_a'];
								$b=$row['opsi_b'];
								$c=$row['opsi_c'];
								$d=$row['opsi_d'];
						?>
						 <input type="hidden" name="id[]" value=<?php echo $id; ?>>
						<div class="form-group row">
						<label class="col-sm-12 col-form-label"><?php echo $soal;?></label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
							<div class="form-check">							
							  <input class="form-check-input" type="radio" value="A" <?php if (isset($_POST['pilihan[<?php echo $id;?>]']) && $_POST['pilihan[<?php echo $id;?>]']=="A") echo "checked";?> name="pilihan[<?php echo $id;?>]">
							  <label class="form-check-label"><?php echo $a;?></label>
							</div>
							</div>
							<br>
							<div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" value="B" type="radio" <?php if (isset($_POST['pilihan[<?php echo $id;?>]']) && $_POST['pilihan[<?php echo $id;?>]']=="B") echo "checked";?> name="pilihan[<?php echo $id;?>]">
							  <label class="form-check-label"><?php echo $b;?></label>
							</div>
							</div>
							<br>
							<div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" value="C" type="radio" <?php if (isset($_POST['pilihan[<?php echo $id;?>]']) && $_POST['pilihan[<?php echo $id;?>]']=="C") echo "checked";?> name="pilihan[<?php echo $id;?>]">
							  <label class="form-check-label"><?php echo $c;?></label>
							</div>
							</div>
							<br>
							<div class="col-sm-12">
							<div class="form-check">
							  <input class="form-check-input" value="D" type="radio" name="pilihan[<?php echo $id;?>]">
							  <label class="form-check-label"><?php echo $d;?></label>
							</div>
							</div>
						</div>
						<?php } ?>
<?php
          $user1=$_SESSION['rtsmmulai'];
		  $query_jumlah = "SELECT count(*) AS jumlah FROM tmp_soal join soal on id_soal=id_soal_temp where id_ujian_temp='$user1'";
          $dewan1 = $db1->prepare($query_jumlah);
          $dewan1->execute();
          $res1 = $dewan1->get_result();
          $row = $res1->fetch_assoc();
          $total_records = $row['jumlah'];
        ?>
        <p>Total baris : <?php echo $total_records; ?></p>
        <nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              
 
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }
 
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }
 
              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
          </ul>
        </nav>