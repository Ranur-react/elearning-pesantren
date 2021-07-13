<?php
class Jadwal extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $url=base_url('login');
			$this->session->set_flashdata('msg', '<script>alert("Akses Di Tolak Silahan Login !!")</script>');
            redirect($url);
        };
		$this->load->model('M_jadwal','j'); 
	}
	function index(){
		$x['post'] = $this->j->datakelas();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('Jadwal/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function add(){
		$id=$this->uri->segment(3);
		$x['data']=$this->j->cek($id);
		$x['mapel']=$this->j->mapel();
		$x['guru']=$this->j->guru();
		$x['senin']=$this->j->senin($id);
		$x['selasa']=$this->j->selasa($id);
		$x['rabu']=$this->j->rabu($id);
		$x['kamis']=$this->j->kamis($id);
		$x['jumat']=$this->j->jumat($id);
		$x['sabtu']=$this->j->sabtu($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('Jadwal/add', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function lihatjadwal(){
		$id=$this->uri->segment(3);
		$x['senin']=$this->j->senin($id);
		$x['selasa']=$this->j->selasa($id);
		$x['rabu']=$this->j->rabu($id);
		$x['kamis']=$this->j->kamis($id);
		$x['jumat']=$this->j->jumat($id);
		$x['sabtu']=$this->j->sabtu($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('Jadwal/viewjadwal', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function mengajar(){
		$id=$this->session->userdata('username');
		$x['senin']=$this->j->seninm($id);
		$x['selasa']=$this->j->selasam($id);
		$x['rabu']=$this->j->rabum($id);
		$x['kamis']=$this->j->kamism($id);
		$x['jumat']=$this->j->jumatm($id);
		$x['sabtu']=$this->j->sabtum($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('Jadwal/viewjadwal', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function pelajaran(){
		$id=$this->session->userdata('kelas');
		$x['senin']=$this->j->seninp($id);
		$x['selasa']=$this->j->selasap($id);
		$x['rabu']=$this->j->rabup($id);
		$x['kamis']=$this->j->kamisp($id);
		$x['jumat']=$this->j->jumatp($id);
		$x['sabtu']=$this->j->sabtup($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('Jadwal/viewjadwal', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function cetakjadwal(){
		$id=$this->uri->segment(3);
		$x['senin']=$this->j->senin($id);
		$x['selasa']=$this->j->selasa($id);
		$x['rabu']=$this->j->rabu($id);
		$x['kamis']=$this->j->kamis($id);
		$x['jumat']=$this->j->jumat($id);
		$x['sabtu']=$this->j->sabtu($id);
		
		$this->load->view('Jadwal/cetak', $x);
	
	}
	function cetakjadwalmengajar(){
		$id=$this->uri->segment(3);
		$x['senin']=$this->j->seninm($id);
		$x['selasa']=$this->j->selasam($id);
		$x['rabu']=$this->j->rabum($id);
		$x['kamis']=$this->j->kamism($id);
		$x['jumat']=$this->j->jumatm($id);
		$x['sabtu']=$this->j->sabtum($id);
		
		$this->load->view('Jadwal/cetak', $x);
	
	}
	function cetakjadwalpelajaran(){
		$id=$this->uri->segment(3);
		$x['senin']=$this->j->seninp($id);
		$x['selasa']=$this->j->selasap($id);
		$x['rabu']=$this->j->rabup($id);
		$x['kamis']=$this->j->kamisp($id);
		$x['jumat']=$this->j->jumatp($id);
		$x['sabtu']=$this->j->sabtup($id);
		
		$this->load->view('Jadwal/cetak', $x);
	
	}
	function list() {
		$id = $this->input->post('id', TRUE);
		$query = $this->j->cek($id);
		$query1 = $this->j->mapel();
		$query2 = $this->j->guru();
		$senin = $this->j->senin($id);
		$selasa = $this->j->selasa($id);
		$rabu = $this->j->rabu($id);
		$kamis = $this->j->kamis($id);
		$jumat = $this->j->jumat($id);
		$sabtu = $this->j->sabtu($id);
		$data = array(
		'tampil' => $query,
		'mapel' => $query1,
		'guru' => $query2,
		'senin' => $senin,
		'selasa' => $selasa,
		'rabu' => $rabu,
		'kamis' => $kamis,
		'jumat' => $jumat,
		'sabtu' => $sabtu
		);
		$this->load->view('jadwal/list', $data);
	}
	public function simpan(){
        $id=$this->input->post('id');
		$hari=$this->input->post('hari');
		$mapel=$this->input->post('mapel');
		$msk=$this->input->post('msk');
		$keluar=$this->input->post('keluar');
		$guru=$this->input->post('guru');
        $cek=$this->j->cekjadwal($mapel,$guru,$hari,$msk,$keluar);
			if($cek->num_rows() > 0){
			$msg = array('sukses' => 'Jadwal Sudah Ada');
			echo json_encode($msg);
			}else{
			$this->j->simpan($id,$hari,$mapel,$msk,$keluar,$guru);
			$msg = array('sukses' => 'Jadwal Berhasil Di Tambahkan');
			echo json_encode($msg);
        }
    }
	
	function hapus(){
		$id = $this->input->post('id', true);
		$query = $this->j->hapus($id);
		if ($query) {
			$msg = array('sukses' => 'Berhasil di hapus');	
			echo json_encode($msg);
		}
	}
	function update(){
		$id=$this->input->post('id');							
		$nama=$this->input->post('nama');
		$ket=$this->input->post('ket');							
		$cek=$this->j->cek($nama);
		$this->j->update($id,$nama,$ket);
		$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('Jadwal');
		
	}	
	
}