<?php
  $level=$this->session->userdata('level');
  if($level==1){
  ?>
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard')?>" class="nav-link <?php if ($this->uri->segment(1)== 'dashboard') echo 'active'; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('mapel')?>" class="nav-link <?php if ($this->uri->segment(1)== 'mapel') echo 'active'; ?>">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>Pelajaran</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('kelas')?>" class="nav-link <?php if ($this->uri->segment(1)== 'kelas') echo 'active'; ?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>Kelas</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('siswa')?>" class="nav-link <?php if ($this->uri->segment(1)== 'siswa') echo 'active'; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Siswa</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('guru')?>" class="nav-link <?php if ($this->uri->segment(1)== 'guru') echo 'active'; ?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Guru</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('bukutamu')?>" class="nav-link <?php if ($this->uri->segment(1)== 'bukutamu') echo 'active'; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Buku Tamu</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('pengumuman')?>" class="nav-link <?php if ($this->uri->segment(1)== 'pengumuman') echo 'active'; ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Pengumuman</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('jadwal')?>" class="nav-link <?php if ($this->uri->segment(1)== 'jadwal') echo 'active'; ?>">
              <i class="nav-icon fas fa-clock"></i>
              <p>Jadwal</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('forum')?>" class="nav-link <?php if ($this->uri->segment(1)== 'forum') echo 'active'; ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Forum</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo site_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
<!-- /.sidebar-menu -->
<?php
  }?>
 
 
 <?php
  $level=$this->session->userdata('level');
  if($level==2){
  ?>
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard')?>" class="nav-link <?php if ($this->uri->segment(1)== 'dashboard') echo 'active'; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('jadwal/mengajar')?>" class="nav-link <?php if ($this->uri->segment(2)== 'mengajar') echo 'active'; ?>">
              <i class="nav-icon fas fa-clock"></i>
              <p>Jadwal Mengajar</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('materi')?>" class="nav-link <?php if ($this->uri->segment(1)== 'materi') echo 'active'; ?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>Materi</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('soal')?>" class="nav-link <?php if ($this->uri->segment(1)== 'soal') echo 'active'; ?>">
              <i class="nav-icon fas fa-cube"></i>
              <p>Bank Soal</p>
            </a>
          </li>
		  <li class="nav-header">___________________________</li>
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($this->uri->segment(1)== 'latihan') echo 'active'; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Latihan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php if ($this->uri->segment(1)== 'latihan') echo 'display: block;'; ?>">
              <li class="nav-item">
                <a href="<?php echo base_url('latihan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mulai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('latihan/hasillatihan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil Latihan</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('forum')?>" class="nav-link <?php if ($this->uri->segment(1)== 'forum') echo 'active'; ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Forum</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo site_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
<!-- /.sidebar-menu -->
<?php
  }?>
  
  
 
 <?php
  $level=$this->session->userdata('level');
  if($level==3){
  ?>
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard')?>" class="nav-link <?php if ($this->uri->segment(1)== 'dashboard') echo 'active'; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('jadwal/pelajaran')?>" class="nav-link <?php if ($this->uri->segment(2)== 'pelajaran') echo 'active'; ?>">
              <i class="nav-icon fas fa-clock"></i>
              <p>Jadwal Pelajaran</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('materi')?>" class="nav-link <?php if ($this->uri->segment(1)== 'materi') echo 'active'; ?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>Materi</p>
            </a>
          </li>
		  <li class="nav-header">___________________________</li>
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($this->uri->segment(1)== 'latihan') echo 'active'; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Latihan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php if ($this->uri->segment(1)== 'latihan') echo 'display: block;'; ?>">
              <li class="nav-item">
                <a href="<?php echo base_url('latihan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mulai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('latihan/hasillatihan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil Latihan</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url('forum')?>" class="nav-link <?php if ($this->uri->segment(1)== 'forum') echo 'active'; ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Forum</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo site_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
<!-- /.sidebar-menu -->
<?php
  }?>