<?php
class Materi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $url=base_url('login');
			$this->session->set_flashdata('msg', '<script>alert("Akses Di Tolak Silahan Login!!")</script>');
            redirect($url);
        };
		$this->load->model('M_materi','m'); 
		$this->load->library('upload');
		$this->load->helper('tanggal_indonesia');
		$this->load->helper('download');
	}
	function index(){
		$id=$this->session->userdata('username');
		$id1=$this->session->userdata('kelas');
		$x['post'] = $this->m->datamateri($id);
		$x['post2'] = $this->m->datamateri1($id1);
		$x['post1'] = $this->m->datakelas1($id1);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('materi/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function donwload($file){
		$gmbr='file/'.$file;
		force_download($gmbr,NULL);
	}
	function add() {
		$id=$this->session->userdata('username');
		$x['datakelas'] = $this->m->datakelas($id);
		$x['datamapel'] = $this->m->datamapel($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('materi/add', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	
	function simpan() {
		$judul=$this->input->post('judul');
		$guru=$this->session->userdata('username');
		$config['upload_path'] = './file/'; //path folder
		$config['allowed_types'] = 'pdf|pptx|ppt|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
		$config['file_name'] = $judul; //nama yang terupload nantinya
	    $this->upload->initialize($config);
		if ($this->upload->do_upload('foto'))
	         {
	         $gbr = $this->upload->data();
				$gambar=$gbr['file_name'];
				$mapel=$this->input->post('mapel');
				$kelas=$this->input->post('kelas');				
				$this->m->simpan($mapel,$kelas,$guru,$judul,$gambar);
				$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('materi');
			}else{
				$pesan = '<script>alert("Data Gagal Disimpan")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('materi/add');
				}		
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$file=$this->input->post('file');
		$path='./file/'.$file;
		unlink($path);
		$this->m->hapus($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('materi');
	}
	function edit(){
		$id=$this->uri->segment(3);
		$x['data']=$this->m->cek($id);
		$x['datakelas'] = $this->m->datak();
		$x['datamapel'] = $this->m->datam();
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('materi/edit', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function update(){
		$judul=$this->input->post('judul');
		$id=$this->input->post('id');
		$foto1=$this->input->post('foto1');
		$config['upload_path'] = './file/'; //path folder
		$config['allowed_types'] = 'pdf|pptx|ppt|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
		$config['file_name'] = $judul; //nama yang terupload nantinya

	     $this->upload->initialize($config);
	     if(!empty($_FILES['foto']['name']))
	       {
	        if ($this->upload->do_upload('foto'))
	           {
				$gbr = $this->upload->data();
				$gambar=$gbr['file_name'];
				$mapel=$this->input->post('mapel');
				$kelas=$this->input->post('kelas');
				$path='./file/'.$foto1;
				unlink($path);
				$this->m->update($id,$mapel,$kelas,$judul,$gambar);
				$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('materi');
	                    
	            }else{
	            $pesan = '<script>alert("Data Gagal Diupdate")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('materi');
	            }
	                
	      }else{
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('materi');
	      } 

	}
	
	
	
	
}