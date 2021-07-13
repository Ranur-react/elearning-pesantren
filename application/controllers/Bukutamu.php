<?php
class Bukutamu extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_tamu','t'); 
	}
	function index(){
		$x['post'] = $this->t->datatamu();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('tamu/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function add() {
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('tamu/add', '', TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	
	function simpan() {
		$nama=$this->input->post('nama');		
		$email=$this->input->post('email');
		$saran=$this->input->post('saran');
		$this->t->simpan($nama,$email,$saran);
		if(!isset($_SESSION['loggedpesantren_in'])){
        $pesan = '<script>alert("Buku Tamu Berhasil Di Tambahkan")</script>';
		$this->session->set_flashdata('msg', $pesan);
		redirect('welcome');			
        }else{
		$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('bukutamu');			
		}
		
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$this->t->hapus($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('bukutamu');
	}
	function edit(){
		$id=$this->uri->segment(3);
		$x['data']=$this->t->cek($id);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('tamu/edit', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function update(){
		$id=$this->input->post('id');		
		$nama=$this->input->post('nama');		
		$email=$this->input->post('email');
		$saran=$this->input->post('saran');
		$this->t->update($id,$nama,$email,$saran);
		$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('bukutamu');
			

	}
	
	
	
}