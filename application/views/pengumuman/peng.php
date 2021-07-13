<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_pesantren');
 
// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);
?>

<h2 class="tm-color-primary tm-section-title mb-4">Pengumuman</h2>
   <?php
      $page = (isset($_POST['page']))? $_POST['page'] : 1;
      $limit = 5; 
      $limit_start = ($page - 1) * $limit;
      $no = $limit_start + 1;
      $query = "SELECT * FROM pengumuman ORDER BY tgl_pengumuman DESC LIMIT $limit_start, $limit";
      $dewan1 = $db1->prepare($query);
      $dewan1->execute();
      $res1 = $dewan1->get_result();
	  $no=0;
      while ($b = $res1->fetch_assoc()) {
	  $no++;
   ?>
		<p class="mb-5">
		<a target="_blank" href="<?php echo base_url('pengumuman/lihat/').$b['id_pengumuman']?>" class="btn" ><?php echo $no;?>. <b><font color="green">(<?php $tgl1=date("Y-m-d",strtotime($b['tgl_pengumuman']));echo tanggal_indonesia($tgl1);?>, <?php echo $tgl2=date("H:i",strtotime($b['tgl_pengumuman'])); ?>)</b></font> <?php echo $b['judul_pengumuman'];?></a>
		</p>
 <?php } ?>		
 
<?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM pengumuman";
          $dewan1 = $db1->prepare($query_jumlah);
          $dewan1->execute();
          $res1 = $dewan1->get_result();
          $row = $res1->fetch_assoc();
          $total_records = $row['jumlah'];
      ?>
<p>Total data : <?php echo $total_records; ?></p>
 <nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              
 
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#pengumuman">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#pengumuman"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#pengumuman">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#pengumuman"><span aria-hidden="true">&laquo;</span></a></li>';
              }
 
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#pengumuman">'.$i.'</a></li>';
              }
 
              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#pengumuman"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#pengumuman">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#pengumuman"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#pengumuman">Last</a></li>';
              }
            ?>
          </ul>
        </nav>