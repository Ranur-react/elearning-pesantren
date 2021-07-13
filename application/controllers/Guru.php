<?php
class Guru extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $pesan = '<script>alert("Anda harus login dulu")</script>';
			$this->session->set_flashdata('msg', $pesan);
			redirect('login');
        };
		$this->load->model('M_guru','g'); 
		$this->load->library('upload');
	}
	function index(){
		$x['post'] = $this->g->dataguru();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('guru/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function add() {
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('guru/add', '', TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	
	function simpan() {
		$config['upload_path'] = './images/guru/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    $this->upload->initialize($config);
		if ($this->upload->do_upload('foto'))
	         {
	         $gbr = $this->upload->data();
	         //Compress Image
	         $config['image_library']='gd2';
	         $config['source_image']='./images/guru/'.$gbr['file_name'];
	         $config['create_thumb']= FALSE;
	         $config['maintain_ratio']= FALSE;
	         $config['quality']= '60%';
	         $config['width']= 215;
	         $config['height']= 215;
	         $config['new_image']= './images/guru/'.$gbr['file_name'];
	         $this->load->library('image_lib', $config);
	         $this->image_lib->resize();
				
				$gambar=$gbr['file_name'];
				$gambar1='images/guru/'.$gbr['file_name'];
				$nip=$this->input->post('nip');
				$pas=md5('12345');
				$level=2;
				$nama=$this->input->post('nama');		
				$alamat=$this->input->post('alamat');				
				$jenkel=$this->input->post('jenkel');
				$pendidikan=$this->input->post('pendidikan');
				$nohp=$this->input->post('nohp');
				$email=$this->input->post('email');
				$cek=$this->g->cek($nip);
				if($cek->num_rows() > 0){
					$pesan = '<script>alert("NIP Guru Sudah Ada")</script>';
					$this->session->set_flashdata('pesan', $pesan);
					redirect('guru');
				}else{
					$this->g->simpan($nip,$nama,$alamat,$jenkel,$pendidikan,$nohp,$email,$gambar);
					$this->g->simpanuser($nip,$pas,$nama,$jenkel,$email,$nohp,$alamat,$level,$gambar1);
					$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
					$this->session->set_flashdata('pesan', $pesan);
					redirect('guru');
					}
			}else{
				$pesan = '<script>alert("Data Gagal Disimpan")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('guru/add');
				}				
	}
	
	function hapus(){
		$nip=$this->input->post('nip');
		$gambar=$this->input->post('gambar');
		$path='./images/guru/'.$gambar;
		unlink($path);		
		$this->g->hapususer($nip);
		$this->g->hapus($nip);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('guru');
	}
	function edit(){
		$nip=$this->uri->segment(3);
		$x['data']=$this->g->cek($nip);
		$x['datamapel'] = $this->g->datamapel();
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('guru/edit', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function update(){
		$config['upload_path'] = './images/guru'; //path folder
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
	          $config['source_image']='./images/guru/'.$gbr['file_name'];
	          $config['create_thumb']= FALSE;
			  $config['maintain_ratio']= FALSE;
	          $config['quality']= '60%';
	          $config['width']= 215;
	          $config['height']= 215;
	          $config['new_image']= './images/guru/'.$gbr['file_name'];
	          $this->load->library('image_lib', $config);
	          $this->image_lib->resize();
						
			  $gambar=$gbr['file_name'];
				$gambar1='images/guru/'.$gbr['file_name'];
				$nip=$this->input->post('nip');
				$nama=$this->input->post('nama');		
				$alamat=$this->input->post('alamat');				
				$jenkel=$this->input->post('jenkel');
				$pendidikan=$this->input->post('pendidikan');
				$nohp=$this->input->post('nohp');
				$email=$this->input->post('email');
				$foto1=$this->input->post('foto1');
				$path='./images/guru/'.$foto1;
				unlink($path);
				$this->g->update($nip,$nama,$alamat,$jenkel,$pendidikan,$nohp,$email,$gambar);
				$this->g->updateuser($nip,$nama,$jenkel,$email,$nohp,$alamat,$gambar1);
				$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('guru');
			}else{
	             $pesan = '<script>alert("Data Gagal Diupdate")</script>';
				 $this->session->set_flashdata('pesan', $pesan);
				 redirect('guru');
	             }
		}else{

			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama');		
			$alamat=$this->input->post('alamat');				
			$jenkel=$this->input->post('jenkel');
			$pendidikan=$this->input->post('pendidikan');
			$nohp=$this->input->post('nohp');
			$email=$this->input->post('email');
			$this->g->update_noimg($nip,$nama,$alamat,$jenkel,$pendidikan,$nohp,$email);
			$this->g->updateuser_noimg($nip,$nama,$jenkel,$email,$nohp,$alamat);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('guru');
	    } 	

	}
	
	
	
}