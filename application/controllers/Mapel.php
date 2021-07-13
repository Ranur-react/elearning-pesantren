<?php
class Mapel extends CI_Controller{
	function __construct(){
		parent::__construct();
		/*if(!isset($_SESSION['loggedperpusdig_in'])){
            $url=base_url('login');
            redirect($url);
        };		*/
		$this->load->model('M_mapel','m'); 
	}
	function index(){
		$x['post'] = $this->m->datamapel();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('mapel/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function buatnomor()
    {
        $this->db->select('RIGHT(id_mapel,4) as id_mapel', FALSE); 
		$this->db->order_by('id_mapel','DESC'); 
		$this->db->limit(1); 
		$query = $this->db->get('mapel');  
		if($query->num_rows() <> 0){ 
			$dt = $query->row(); 
			$id_mapel= intval($dt->id_mapel) + 1; 
		}else{ 
			$id_mapel = 1; 
		} 
		$kodemax  = str_pad($id_mapel, 4, "0", STR_PAD_LEFT); 
		$kodejadi = "MP-".$kodemax;  
		return $kodejadi;
		
    }
	function simpan() {
		$id=$this->buatnomor();
		$nama=$this->input->post('nama');							
		$cek=$this->m->cek($nama);
		if($cek->num_rows() > 0){
			$pesan = '<script>alert("Nama Pelajaran Sudah Ada")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('mapel');
		}else{
			$this->m->simpan($id,$nama);
			$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('mapel');
			}
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$this->m->hapus($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('mapel');
	}
	function update(){
		$id=$this->input->post('id');							
		$nama=$this->input->post('nama');							
		$cek=$this->m->cek($nama);
		if($cek->num_rows() > 0){
			$pesan = '<script>alert("MataPelajaran Sudah Dipakai")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('mapel');
		}else{
			$this->m->update($id,$nama);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('mapel');
			}
	}	
	
}