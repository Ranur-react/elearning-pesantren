<?php
class Latihan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $url=base_url('login');
			$this->session->set_flashdata('msg', '<script>alert("Akses Di Tolak Silahan Login!!")</script>');
            redirect($url);
        };	
		$this->load->model('M_latihan','l'); 
		$this->load->helper('tanggal_indonesia');
		$this->load->library('pagination');
		$this->load->helper('text'); // memanggil helper text
	}
	function index(){
		$user=$this->session->userdata('username');
		$kls=$this->session->userdata('kelas');
		$x['post'] = $this->l->datalatihan($user);
		$x['post1'] = $this->l->soal($kls);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('latihan/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function cetak(){
		$id=$this->uri->segment(3);
		$user=$this->session->userdata('username');
		$kelas = $this->input->post('kelas');
		$lat = $this->input->post('lat');
		$x['post'] = $this->l->cetak($id);
		$x['post1'] = $this->l->cetakguru($kelas,$user,$lat);
		$this->load->view('latihan/cetak', $x);
	
	}
	function cetakstudy(){
		$id=$this->uri->segment(3);
		$user=$this->session->userdata('username');
		$kelas = $this->input->post('kelas');
		$lat = $this->input->post('lat');
		$mata= $this->input->post('mata');
		$x['post'] = $this->l->cetak($id);
		$x['post1'] = $this->l->cetakguru($kelas,$user,$lat);
		$x['post2'] = $this->l->cetakhasil($kelas,$user,$mata);
		$x['jumlahsiswa'] = $this->l->cetakhasiljmlhsiswa($kelas,$user,$mata);

		$this->load->view('latihan/cetakstudy', $x);
	
	}
	function hasillatihan(){
		$user=$this->session->userdata('username');
		$kls=$this->session->userdata('kelas');		
		$x['datakelas'] = $this->l->datakelas($user);
		$x['datamapel'] = $this->l->datamapel($user);
		$x['dataujian'] = $this->l->namaujian($user);
		$x['post1'] = $this->l->datahasillatihan1($user);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('latihan/hasil', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function hasilstudy(){
		$user=$this->session->userdata('username');
		$kls=$this->session->userdata('kelas');		
		$x['datakelas'] = $this->l->datakelas($user);
		$x['datamapel'] = $this->l->datamapel($user);
		$x['dataujian'] = $this->l->namaujian($user);
		$x['post1'] = $this->l->datahasillatihan1($user);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('latihan/hasilstudy', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function tampilsoal() {
		$id = $this->input->post('id', TRUE);
		$query = $this->l->detailsoal($id);
		$data = array('tampil' => $query);
		$this->load->view('latihan/datasoal', $data);
	}
	public function simpantemp(){
        $id = $this->input->post('id', true);
        $idb = $this->input->post('idb', true);
        $cek=$this->l->cek($id,$idb);
			if($cek->num_rows() > 0){
			$msg = array('sukses' => 'Soal Sudah Ada Ditambahkan !!');
			echo json_encode($msg);
			}else{
			$this->l->simpantemp($id,$idb);
			$msg = array('sukses' => '1 Soal Berhasil Ditambahkan');
			echo json_encode($msg);
        }
    }
	function hapusitem() {
		$id = $this->input->post('id', true);
		$idb = $this->input->post('idb', true);
		$query = $this->l->hapusitem($id,$idb);
		$msg = array('sukses' => 'Berhasil di hapus');	
		echo json_encode($msg);
		
	}
	function buatnomor()
    {
        $this->db->select('RIGHT(id_ujian,7) as id_ujian', FALSE); 
		$this->db->order_by('id_ujian','DESC'); 
		$this->db->limit(1); 
		$query = $this->db->get('ujian');  
		if($query->num_rows() <> 0){ 
			$dt = $query->row(); 
			$id_ujian= intval($dt->id_ujian) + 1; 
		}else{ 
			$id_ujian = 1; 
		} 
		$kodemax  = str_pad($id_ujian, 7, "0", STR_PAD_LEFT); 
		$kodejadi = "UJNPNDKSP-".$kodemax;  
		return $kodejadi;
		
    }
	function add() {
		$user=$this->session->userdata('username');		
		$id=$this->buatnomor();
		$x['id'] = $this->buatnomor();
		$x['data'] = $this->l->datasoal($user);
		$x['data'] = $this->l->datasoal($user);
		$x['datamapel'] = $this->l->datamapel($user);
		$x['datakelas'] = $this->l->datakelas($user);
		$x['tampilsoal'] = $this->l->datakelas($user);		
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('latihan/add', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	function pre() {		
		$id=$_SESSION['username'];
		$user=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * FROM hasil_ujian WHERE siswa_hasil='$id' AND id_ujian_hasil='$user'");
		$jml1=$query1->num_rows();
		if ($jml1 > 0) {
		$pesan = '<script>alert("Anda sudah melakukan ujian ini !!")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('latihan/hasillatihan');
		}
		else{
			
			$x['data'] = $this->l->dataujian($user);		
			$template = array(
			'isi' => $this->load->view('latihan/pre', $x, TRUE),
			);
			$this->parser->parse('template/templatesoal', $template);
		}
	}
	
	function mulai() {
		$user=$_SESSION['rtsmmulai'];
		$x['soal'] = $this->l->soalujian($user);
		$x['data'] = $this->l->dataujian($user);		
		$x['jmlh'] = $this->l->jmlh($user);
		$template = array(
		'isi' => $this->load->view('latihan/mulai', $x, TRUE),
		);
		$this->parser->parse('template/templatesoal', $template);
	}
	/*function mulai() {
		$user=$_SESSION['rtsmmulai'];
		$jum=$this->l->soalujian($user);
		$page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
			//Ini Konfigurasi Pagination
				$config['base_url'] = site_url('latihan/mulai/');
				$config['total_rows'] = $jum->num_rows();
				$config['per_page'] = '1';
				$config['uri_segment'] = 3;
				$config['next_link'] = '>';
				$config['prev_link'] = '<';
				$config['first_link'] = '<<';
				$config['last_link'] = '>>';
				//Custom Pagination
				$config['full_tag_open'] = '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';
				$config['full_tag_close'] = '</ul></nav>';
				$config['num_tag_open'] = '<li class="page-item">';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-item disabled"><li class="page-item active"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				$config['next_tag_open'] = '<li class="page-item">';
				$config['next_tag_close'] = '</li>';
				$config['prev_tag_open'] = '<li class="page-item">';
				$config['prev_tag_close'] = '</li>';
				$config['first_tag_open'] = '<li class="page-item">';
				$config['first_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li class="page-item">';
				$config['last_tag_close'] = '</li>';
				//custom pagination
		$this->pagination->initialize($config);
		$limit = $config['per_page'];		
		$x['data'] = $this->l->dataujian($user);		
		$x['soal']=$this->l->soalujian_perpage($offset,$limit,$page,$user);
		$template = array(
		'isi' => $this->load->view('latihan/mulai', $x, TRUE),
		);
		$this->parser->parse('template/templatesoal', $template);
	} 
	function data() {
	$this->load->view('latihan/data','');
	}*/
	function simpan() {

		$id=$this->input->post('id');
		$user=$this->session->userdata('username');
		$tglmulai=$this->input->post('tglmulai');
		$tglselesai=$this->input->post('tglselesai');
		$mapel=$this->input->post('mapel');
		$kelas=$this->input->post('kelas');
		$waktu=$this->input->post('waktu');
		$judul=$this->input->post('judul');
		$jmlh=$this->l->jmlh($id);
		
		$q=$this->l->simpan($id,$user,$mapel,$kelas,$judul,$jmlh,$waktu,$tglmulai,$tglselesai);
		if($q){
		$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('latihan');
		}else{
		$pesan = '<script>alert("Data Gagal Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('latihan/add');
	   }
	}
	function simpanhasil() {

		$id=$_SESSION['rtsmmulai'];
		$jumlah=$this->l->jmlh($id);
		//$pilihan=$_POST["pilihan"];
        //$id_soal=$_POST["id"];
		$user=$this->session->userdata('username');
		$kelas=$this->session->userdata('kelas');
		$pilihan=$this->input->post('pilihan',true);
		$id_soal=$this->input->post('id',true);
		$guru=$this->input->post('guru',true);
		$score=0;
        $benar=0;
        $salah=0;
        $kosong=0;
		
			for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
				//jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
					$query=$this->l->hasil($nomor,$jawaban);
                    $cek=$query;
                    
                    if($cek){
                        //jika jawaban cocok (benar)
						$benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
				
            }
        $score = $benar/$jumlah*100;	
		
		$q=$this->l->hasilujian($id,$kelas,$guru,$user,$benar,$salah,$kosong,$jumlah,$score);
		if($q){
		$msg = array('sukses' => 'Data Berhasil Disimpan');
        echo json_encode($msg);
		$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		unset(
			$_SESSION['rtsmmulai'],
			$_SESSION['mulai']
		);
		redirect('latihan');
		}
	}
	
	function update() {

		$id=$this->input->post('id');
		$user=$this->session->userdata('username');
		$tglmulai=$this->input->post('tglmulai');
		$tglselesai=$this->input->post('tglselesai');
		$mapel=$this->input->post('mapel');
		$kelas=$this->input->post('kelas');
		$waktu=$this->input->post('waktu');
		$judul=$this->input->post('judul');
		$jmlh=$this->l->jmlh($id);
		
		$q=$this->l->update($id,$user,$mapel,$kelas,$judul,$jmlh,$waktu,$tglmulai,$tglselesai);
		if($q){
		$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('latihan');
		}else{
		$pesan = '<script>alert("Data Gagal Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('latihan/add');
	   }
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$this->l->hapus($id);
		$this->l->hapusdetail($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('latihan');
	}
	function edit(){
		$id=$this->uri->segment(3);
		$user=$this->session->userdata('username');
		$x['data'] = $this->l->dataujian($id);
		$x['data1'] = $this->l->datasoal($user);
		$x['datamapel'] = $this->l->datamapel($user);
		$x['datakelas'] = $this->l->datakelas($user);
		$x['tampilsoal'] = $this->l->datakelas($user);
		$x['jmlh'] = $this->l->jmlh($user);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('latihan/edit', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}	
	
}