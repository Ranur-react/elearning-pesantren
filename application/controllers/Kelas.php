<?php
class Kelas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $pesan = '<script>alert("Anda harus login dulu")</script>';
			$this->session->set_flashdata('msg', $pesan);
			redirect('login');
        };
		$this->load->model('M_kelas','k'); 
	}
	function index(){
		$x['post'] = $this->k->datakelas();
		$x['post1'] = $this->k->datakelas1();
		$x['guru']=$this->k->guru();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('kelas/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function upkelas(){
        $kelas = $this->input->post('id', TRUE);
        $idb = $this->input->post('idb', true);
		$this->k->upkelas($idb,$kelas);								
		$msg = array('sukses' => '1 Siswa Berhasil Ditambahkan');
		echo json_encode($msg);
    }
	function hapussiswa(){
        $id = $this->input->post('id', TRUE);
        $kelas = (NULL);
		$this->k->upkelas1($id,$kelas);								
		$msg = array('sukses' => '1 Siswa Berhasil Dihapus Dari Kelas');
		echo json_encode($msg);
    }
	function hapusitem() {
		$id = $this->input->post('id', true);
		$idb = $this->input->post('idb', true);
		$query = $this->k->hapusitem($id,$idb);
		if ($query) {
			$this->k->tambuku($idb);
			$msg = array('sukses' => 'Berhasil di hapus');	
			echo json_encode($msg);
		}
	}
	function tampilsiswa() {
		$id = $this->input->post('id', TRUE);
		$query = $this->k->tdatasiswa($id);
		$query1 = $this->k->listsiswa();
		$query3 = $this->k->totsiswa($id);
		$data = array('tampil' => $query,'data1' => $query1,'totsiswa' => $query3);
		$this->load->view('kelas/datasiswa', $data);
	}
	function tampilsiswa1() {
		$id = $this->input->post('id', TRUE);
		$query = $this->k->tdatasiswa1($id);
		$query1 = $this->k->listsiswa();
		$query3 = $this->k->totsiswa1($id);
		$data = array('tampil' => $query,'data1' => $query1,'totsiswa' => $query3);
		$this->load->view('kelas/datasiswa1', $data);
	}
	function lihat(){
		$id=$this->uri->segment(3);
		$x['data'] = $this->k->datasiswa($id);
		$x['data1'] = $this->k->listsiswa();
		$x['datakelas'] = $this->k->cekkelas($id);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('kelas/lihat', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function lihat1(){
		$id=$this->uri->segment(3);
		$x['data'] = $this->k->datasiswa1($id);
		$x['data1'] = $this->k->listsiswa();
		$x['datakelas'] = $this->k->cekkelas1($id);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('kelas/lihat1', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function cetak(){
		$id=$this->uri->segment(3);
		$x['totsiswa']=$this->k->totsiswa($id);
		$x['datasiswa']=$this->k->datasiswa($id);
		$x['datakelas'] = $this->k->cekkelas($id);
		$this->load->view('kelas/cetak', $x);
		
	}
	function cetak1(){
		$id=$this->uri->segment(3);
		$x['totsiswa']=$this->k->totsiswa1($id);
		$x['datasiswa']=$this->k->datasiswa1($id);
		$x['datakelas'] = $this->k->cekkelas1($id);
		$this->load->view('kelas/cetak1', $x);
		
	}
	function buatnomor()
    {
        $this->db->select('RIGHT(id_kelas,5) as id_kelas', FALSE); 
		$this->db->order_by('id_kelas','DESC'); 
		$this->db->limit(1); 
		$query = $this->db->get('kelas');  
		if($query->num_rows() <> 0){ 
			$dt = $query->row(); 
			$id_kelas= intval($dt->id_kelas) + 1; 
		}else{ 
			$id_kelas = 1; 
		} 
		$kodemax  = str_pad($id_kelas, 5, "0", STR_PAD_LEFT); 
		$kodejadi = "K-".$kodemax;  
		return $kodejadi;
		
    }
	function simpan() {
		$id=$this->buatnomor();
		$nama=$this->input->post('nama');
		$guru=$this->input->post('guru');
		$cek=$this->k->cek($nama);
		if($cek->num_rows() > 0){
			$pesan = '<script>alert("Nama Kelas Sudah Ada")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('kelas');
		}else{
			$this->k->simpan($id,$nama,$guru);
			$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('kelas');
			}
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$this->k->hapus($id);
		$this->k->daftar($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('kelas');
	}
	function update(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$guru=$this->input->post('guru');
		$cek=$this->k->cek($nama);
		$this->k->update($id,$nama,$guru);
		$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('kelas');
		
	}	
	
}