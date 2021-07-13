<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		/*if(!isset($_SESSION['loggedperpusdig_in'])){
            $url=base_url('login');
            redirect($url);
        };*/		
		$this->load->model('M_pengumuman','p'); 
		$this->load->helper('tanggal_indonesia');
		$this->load->library('upload');
	}
	function index(){
		$x['post'] = $this->p->datapengumuman();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('pengumuman/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	
	function add() {
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('pengumuman/add', '', TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	
	function simpan() {
		$config['upload_path'] = './images/pengumuman/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    $this->upload->initialize($config);
		if(!empty($_FILES['foto']['name']))
	      {
			if ($this->upload->do_upload('foto'))
	         {
	         $gbr = $this->upload->data();
	         //Compress Image
	         $config['image_library']='gd2';
	         $config['source_image']='./images/pengumuman/'.$gbr['file_name'];
	         $config['create_thumb']= FALSE;
	         $config['maintain_ratio']= FALSE;
	         $config['quality']= '60%';
	         $config['width']= 500;
	         $config['height']= 750;
	         $config['new_image']= './images/pengumuman/'.$gbr['file_name'];
	         $this->load->library('image_lib', $config);
	         $this->image_lib->resize();
				
			$gambar=$gbr['file_name'];
			$judul=$this->input->post('judul');
			$ket=$this->input->post('ket');
			$this->p->simpan($judul,$ket,$gambar);
			$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('pengumuman');			
			}else{
				$pesan = '<script>alert("Data Gagal Disimpan")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('pengumuman/add');
			}
		}else{
		$judul=$this->input->post('judul');
		$ket=$this->input->post('ket');
		$this->p->simpan_noimg($judul,$ket);
		$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('pengumuman');			
		}
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$gambar=$this->input->post('gambar');
		$path='./images/pengumuman/'.$gambar;
		unlink($path);		
		$this->p->hapus($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('pengumuman');
	}
	function lihat(){
		$id=$this->uri->segment(3);
		$x['data']=$this->p->cek($id);
		$this->load->view('pengumuman/lihat', $x);
	}
	
	function data(){
		$this->load->view('pengumuman/peng');
	}
	
	function edit(){
		$id=$this->uri->segment(3);
		$x['data']=$this->p->cek($id);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('pengumuman/edit', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function update(){
	$config['upload_path'] = './images/pengumuman'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['foto']['name']))
	      {
	       if ($this->upload->do_upload('foto'))
	          {
	          $gbr = $this->upload->data();
	           //Compress Image
	          $config['image_library']='gd2';
	          $config['source_image']='./images/pengumuman/'.$gbr['file_name'];
	          $config['create_thumb']= FALSE;
			  $config['maintain_ratio']= FALSE;
	          $config['quality']= '60%';
	          $config['width']= 500;
	          $config['height']= 750;
	          $config['new_image']= './images/pengumuman/'.$gbr['file_name'];
	          $this->load->library('image_lib', $config);
	          $this->image_lib->resize();
						
			  $gambar=$gbr['file_name'];
			$id=$this->input->post('id');		
			$judul=$this->input->post('judul');		
			$ket=$this->input->post('ket');
			$foto1=$this->input->post('foto1');
			$path='./images/pengumuman/'.$foto1;
			unlink($path);
			$this->p->update($id,$judul,$ket,$gambar);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('pengumuman');
			}else{
	             $pesan = '<script>alert("Data Gagal Diupdate")</script>';
				 $this->session->set_flashdata('pesan', $pesan);
				 redirect('pengumuman');
	             }
	
		}else{
			$id=$this->input->post('id');		
			$judul=$this->input->post('judul');		
			$ket=$this->input->post('ket');
			$this->p->update_noimg($id,$judul,$ket);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('pengumuman');
		}
	}
}