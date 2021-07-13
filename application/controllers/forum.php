<?php
class Forum extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $url=base_url('login');
			$this->session->set_flashdata('msg', '<script>alert("Akses Di Tolak Silahan Login !!")</script>');
            redirect($url);
        };
		$this->load->model('M_forum','f'); 
		$this->load->helper('tanggal_indonesia');
	}
	function index(){
		$x['post'] = $this->f->dataforum();
		$x['date'] = $this->f->date();
		$x['komentar'] = $this->f->komentar();
		$x['datamapel'] = $this->f->datamapel();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('forum/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function simpan() {
		$id=$this->session->userdata('nama');
		$mapel=$this->input->post('mapel');
		$judul=$this->input->post('judul');
		$isi=$this->input->post('isi');
		
		$this->f->simpan($judul,$mapel,$isi,$id);
		$pesan = '<script>alert("Forum Berhasil Di Tambahkan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('forum');
	}
	function simpkomen() {
		$aut=$this->session->userdata('nama');
		$id=$this->input->post('id');
		$isi=$this->input->post('isi');
		
		$this->f->simpkomen($id,$isi,$aut);
		$pesan = '<script>alert("Komentar Berhasil Di Tambahkan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('forum');
	}
	
	function hapus(){
		$id=$this->uri->segment(3);
		$this->f->hapus($id);
		$pesan = '<script>alert("Forum Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('forum');
	}
	function hapuskom(){
		$id=$this->uri->segment(3);
		$this->f->hapuskom($id);
		$pesan = '<script>alert("Komentar Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('forum');
	}
	function update(){
		$id=$this->input->post('id');							
		$nama=$this->input->post('nama');							
		$cek=$this->f->cek($nama);
		if($cek->num_rows() > 0){
			$pesan = '<script>alert("MataPelajaran Sudah Dipakai")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('mapel');
		}else{
			$this->f->update($id,$nama);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('mapel');
			}
	}
	function komentari(){
		$id=$this->uri->segment(3);
		$x['post'] = $this->f->dataforum1($id);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('forum/komentari', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
	}
	
}