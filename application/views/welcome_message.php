<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Ponpre KH.Ahmad Dahlan Sipirok | E-Learning</title>
<!--
DREAM PULSE
https://templatemo.com/tm-536-dream-pulse
-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>slick/slick.css"/>    
    <link rel="stylesheet" href="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>slick/slick-theme.css"/>    
    <link rel="stylesheet" href="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>css/templatemo-dream-pulse.css" />
	 <script type="text/javascript" src="<?php echo base_url('theme/')?>jquery-3.3.1.min.js"></script> <!-- Plugin JQuery yang di butuhkan untuk preview image -->
  </head>
  <body>
    <main class="container-fluid">
      <div class="row">        
          <nav id="tmSidebar" class="tm-bg-black-transparent tm-sidebar">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <div class="tm-sidebar-sticky">
              <div class="tm-brand-box">
                <div class="tm-double-border-1">
                  <div class="tm-double-border-2">
                    <h1 class="tm-brand text-uppercase"><img src="<?php echo base_url('')?>logo.png" alt="Our Work Image" class="img-fluid"></h1>
                  </div>
                </div>
              </div>

              <ul id="tmMainNav" class="nav flex-column text-uppercase text-right tm-main-nav">
                <li class="nav-item">
                  <a href="#intro" class="nav-link active">
                    <span class="d-inline-block mr-3">Home</span>
                    <span class="d-inline-block tm-white-rect"></span>
                  </a>
                </li>
				<li class="nav-item">
                  <a href="#login" class="nav-link">
                    <span class="d-inline-block mr-3">Login</span>
                    <span class="d-inline-block tm-white-rect"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#about" class="nav-link">
                    <span class="d-inline-block mr-3">Visi & Misi</span>
                    <span class="d-inline-block tm-white-rect"></span>
                  </a>
                </li>
				<li class="nav-item">
                  <a href="#pengumuman" class="nav-link">
                    <span class="d-inline-block mr-3">Pengumuman</span>
                    <span class="d-inline-block tm-white-rect"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#sarana" class="nav-link">
                    <span class="d-inline-block mr-3">Sarana Prasarana</span>
                    <span class="d-inline-block tm-white-rect"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#bukutamu" class="nav-link">
                    <span class="d-inline-block mr-3">Buku Tamu</span>
                    <span class="d-inline-block tm-white-rect"></span>
                  </a>
                </li>
              </ul>
              <footer class="text-center text-white small">
                <p class="mb--0 mb-2">Copyright 2020 Dream Pulse</p>
                <p class="mb-0">Design:
                  <a rel="nofollow" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
              </footer>
            </div>
          </nav>
          
          <main role="main" class="ml-sm-auto col-12">
            <div
              class="parallax-window"
              data-parallax="scroll"
              data-image-src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>img/dream-pulse-header.jpg">
              <div class="tm-section-wrap">
			  <p><?php echo $this->session->flashdata('msg');?></p>
                <section id="intro" class="tm-section">
                    <div class="tm-bg-white-transparent tm-intro">
                        <h2 class="tm-section-title mb-5 text-uppercase tm-color-primary">Selamat Datang</h2>
                        <p class="tm-color-gray">
                          Selamat datang di E-Learning Pondok Pesantren KH.Ahmad Dahlan Sipirok. 
                        </p>
                        <p class="mb-0 tm-color-gray">
                          Silahka login menggunakan username dan password yang telah diberikan.
                        </p>
                    </div>              
                </section>
            </div>            
          </div>
			  <div class="tm-section-wrap bg-white">
            <section id="login" class="row tm-section">
                <div class="col-xl-12 mb-5">
                  <div class="tm-double-border-1 tm-border-gray">
                    <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                        <h2 class="tm-color-primary tm-section-title mb-4">Login</h2>
                          <form action="<?php echo site_url('Login/auth')?>" method="POST" class="tm-contact-form">
                        <div class="form-group">
                          <input type="text" id="contact_name" name="username" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Username" required="" />
                        </div>
                        <div class="form-group">
                          <input type="password" id="contact_email" name="password" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Password" required="" />
                        </div>
						<div class="form-group">
							<select required="required" class="form-control" name="level"> 
								<option selected value="">==Silahkan Pilih==</option>
								<option value="1">Admin</option>
								<option value="2">Guru</option>
								<option value="3">Siswa</option>
							</select>
						</div>
                
                        <div class="form-group mb-0">
                          <button type="submit" class="btn rounded-0 d-block ml-auto tm-btn-primary">
                            Login
                          </button>
                        </div>
                      </form>
                  
                    </div>                    
                  </div>                  
                </div>
              </section>
          </div>
        
          <div class="tm-section-wrap bg-white">
            <section id="about" class="row tm-section">
              <div class="col-xl-6">
                <div class="tm-section-half">    
                    <div><i class="fas fa-6x fa-balance-scale mb-5 tm-section-icon"></i></div>                        
                    <h2 class="tm-section-title tm-color-primary mb-5">Visi</h2>
                    <p class="mb-5">
                      Menjadikan Pondok Pesantren Muhammadiyah KH.Ahmad Dahlan Sipirok sebagai pusat pendidikan kader unggulan bagi persyerikatan,umat dan bangsa
                    </p>                    
                </div>
              </div>
              <div class="col-xl-6">
                <div class="tm-section-half">
                    <div><i class="far fa-6x fa-building mb-5 tm-section-icon"></i></div>
                    <h2 class="tm-section-title tm-color-primary mb-5">Misi</h2>
                    <p class="mb-5">
                      Mengupayakan terbentuknya manusia yang unggul dalam :<br>
						1. IBADAH<br>
						2. KEILMUAN<br>
						3. KETERAMPILAN<br>
						4. KEBAHASAAN<br>
						5. KEBANGSAAN<br>
						6. KEMANDIRIAN
                    </p>                    
                </div>
              </div>
            </section>
          </div>
		  <div class="tm-section-wrap bg-white">
            <section id="pengumuman" class="row tm-section">
              <div class="col-12 tm-section-pad">
                  <div class="tm-flex-item-left">
                      <div class="tm-w-80" id="data">
                          
                      </div>
					  <script>
						 $(document).ready(function(){
							  load_data();
							  function load_data(page){
								   $.ajax({
										url:"<?php echo base_url('pengumuman/data')?>",
										method:"POST",
										data:{page:page},
										success:function(data){
											 $('#data').html(data);
										}
								   })
							  }
							  $(document).on('click', '.halaman', function(){
								   var page = $(this).attr("id");
								   load_data(page);
							  });
						 });
						 </script>
                  </div> 
              </div>                             
            </section>
          </div>
          <div class="tm-section-wrap bg-white">
            <section id="sarana" class="row tm-section">
              <div class="col-12">
                <div class="w-100 tm-double-border-1 tm-border-gray">
                    <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                      <div class="tm-gallery-wrap">
                          <h2 class="tm-color-primary tm-section-title mb-4 ml-2">Sarana Prasarana</h2>
                          <div class="tm-gallery">
                            <div class="tm-gallery-item">                        
                              <figure class="effect-bubba">
                                <img src="<?php echo base_url('images/sarana/')?>kamarmandisantri.jpeg" alt="Our Work Image" class="img-fluid">
                                <figcaption>
                                  <h2><span>Kamar Mandi Santri</span></h2>
                                  <p>Tersedia kamar mandi santri yang bagus dan layak digunakan.</p>
                                  <a href="<?php echo base_url('images/sarana/')?>kamarmandisantri.jpeg">View more</a>
                                </figcaption>
                              </figure>
                            </div>
                            <div class="tm-gallery-item">
                              <figure class="effect-bubba">
                                <img src="<?php echo base_url('images/sarana/')?>laborkomputer.jpeg" alt="Our Work Image" class="img-fluid">
                                <figcaption>
                                  <h2><span>Labor Komputer</span></h2>
                                  <p>Labor komputer yang nyaman dan ruangan ber-AC.</p>
                                  <a href="<?php echo base_url('images/sarana/')?>laborkomputer.jpeg">View more</a>
                                </figcaption>
                              </figure>
                            </div>
                            <div class="tm-gallery-item">
                              <figure class="effect-bubba">
                                <img src="<?php echo base_url('images/sarana/')?>ruangkelas.jpeg" alt="Our Work Image" class="img-fluid">
                                <figcaption>
                                  <h2><span>Ruang Kelas</span></h2>
                                  <p>Ruang kelas luas dan ber-AC.</p>
                                  <a href="<?php echo base_url('images/sarana/')?>laborkomputer.jpeg">View more</a>
                                </figcaption>
                              </figure>
                            </div>
                            <div class="tm-gallery-item">
                              <figure class="effect-bubba">
                                <img src="<?php echo base_url('images/sarana/')?>mesjid.jpeg" alt="Our Work Image" class="img-fluid">
                                <figcaption>
                                  <h2><span>Mesjid</span></h2>
                                  <p>Mesjid yang sedang di dalam pembangunan.</p>
                                  <a href="<?php echo base_url('images/sarana/')?>mesjid.jpeg">View more</a>
                                </figcaption>
                              </figure>
                            </div>
                          </div>
                      </div>                        
                    </div>                  
                  </div>     
              </div>         
            </section>
          </div>
            
		  <div class="tm-section-wrap bg-white">
            <section id="bukutamu" class="row tm-section">
                <div class="col-xl-12 mb-5">
                  <div class="tm-double-border-1 tm-border-gray">
                    <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                        <h2 class="tm-color-primary tm-section-title mb-4">Buku Tamu</h2>
                        <form action="<?php echo site_url('bukutamu/simpan')?>" method="POST" class="tm-contact-form">
                        <div class="form-group">
                          <input type="text" id="contact_name" name="nama" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" required oninvalid="this.setCustomValidity('Nama Tamu tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Tamu" />
                        </div>
                        <div class="form-group">
                          <input type="email" id="contact_email" name="email" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email" />
                        </div>
                
                        <div class="form-group">
                          <textarea rows="4" id="contact_message" name="saran" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Isi Saran..." required oninvalid="this.setCustomValidity('Saran tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                        </div>
                
                        <div class="form-group mb-0">
                          <button type="submit" class="btn rounded-0 d-block ml-auto tm-btn-primary">
                            SEND
                          </button>
                        </div>
                      </form>
                    </div>                    
                  </div>                  
                </div>                
              </section>
          </div>        
		</main>        
      </div>
    </div>
    <script src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>js/jquery.min.js"></script>
    <script src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>js/jquery.singlePageNav.min.js"></script>
    <script src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>js/parallax.min.js"></script>
    <script src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>slick/slick.min.js"></script>
    <script src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url('theme/templatemo_536_dream_pulse/')?>js/templatemo-scripts.js"></script>
  </body>
</html>