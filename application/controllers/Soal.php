<?php
class Soal extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $url=base_url('login');
			$this->session->set_flashdata('msg', '<script>alert("Akses Di Tolak Silahan Login!!")</script>');
            redirect($url);
        };		
		$this->load->model('M_soal','s');
		$this->load->helper('tanggal_indonesia');		
		$this->load->library('upload');
	}
	function index(){
		$id=$this->session->userdata('username');
		$x['post'] = $this->s->datasoal($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('soal/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function add() {
		$id=$this->session->userdata('username');
		$x['datamapel'] = $this->s->datamapel($id);
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('soal/add', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	
	function simpan() {
		$config['upload_path'] = './images/soal/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$config1['upload_path'] = './images/soal/'; //path folder
		$config1['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config1['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$config2['upload_path'] = './images/soal/'; //path folder
		$config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config2['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$config3['upload_path'] = './images/soal/'; //path folder
		$config3['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config3['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$config4['upload_path'] = './images/soal/'; //path folder
		$config4['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config4['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
	    $this->upload->initialize($config,$config1,$config2,$config3,$config4);
		$username=$this->session->userdata('username');
		$mapel=$this->input->post('mapel');
		
		$soal=$this->input->post('soal');
		$opsia=$this->input->post('opsia');
		$opsib=$this->input->post('opsib');
		$opsic=$this->input->post('opsic');
		$opsid=$this->input->post('opsid');
		$jawaban=$this->input->post('jawaban');
			 if ($this->upload->do_upload('file'))
	         {
	         $gbr = $this->upload->data();			 
	         //Compress Image
	         $config['image_library']='gd2';
	         $config['source_image']='./images/soal/'.$gbr['file_name'];
	         $config['create_thumb']= FALSE;
	         $config['maintain_ratio']= FALSE;
	         $config['quality']= '60%';
	         $config['new_image']= './images/soal/'.$gbr['file_name'];
	         $this->load->library('image_lib', $config);
			 }
			if ($this->upload->do_upload('filea'))
			{
			$gbr1 = $this->upload->data();
			 //Compress Image
			$config1['image_library']='gd2';
			$config1['source_image']='./images/soal/'.$gbr1['file_name'];
			$config1['create_thumb']= FALSE;
			$config1['maintain_ratio']= FALSE;
			$config1['quality']= '60%';
			$config1['new_image']= './images/soal/'.$gbr1['file_name'];
			$this->load->library('image_lib', $config1);
			$this->image_lib->resize();
			}
			if ($this->upload->do_upload('fileb'))
			{
			$gbr2 = $this->upload->data();
			//Compress Image
			$config2['image_library']='gd2';
			$config2['source_image']='./images/soal/'.$gbr2['file_name'];
			$config2['create_thumb']= FALSE;
			$config2['maintain_ratio']= FALSE;
			$config2['quality']= '60%';
			$config2['new_image']= './images/soal/'.$gbr2['file_name'];
			$this->load->library('image_lib', $config2);
			$this->image_lib->resize();
			}
			if ($this->upload->do_upload('filec'))
			{
			$gbr3 = $this->upload->data();
			//Compress Image
			$config3['image_library']='gd2';
			$config3['source_image']='./images/soal/'.$gbr3['file_name'];
			$config3['create_thumb']= FALSE;
			$config3['maintain_ratio']= FALSE;
			$config3['quality']= '60%';
			$config3['new_image']= './images/soal/'.$gbr3['file_name'];
			$this->load->library('image_lib', $config3);
			$this->image_lib->resize();
			}
			if ($this->upload->do_upload('filed'))
			{
			$gbr4 = $this->upload->data();
			//Compress Image
			$config4['image_library']='gd2';
			$config4['source_image']='./images/soal/'.$gbr4['file_name'];
			$config4['create_thumb']= FALSE;
			$config4['maintain_ratio']= FALSE;
			$config4['quality']= '60%';
			$config4['new_image']= './images/soal/'.$gbr4['file_name'];
			$this->load->library('image_lib', $config4);
			$this->image_lib->resize();
			}
				
			$gambar=$gbr['file_name'];
			$gambar1=$gbr1['file_name']; 					
			$gambar2=$gbr2['file_name']; 
			$gambar3=$gbr3['file_name'];
			$gambar4=$gbr4['file_name'];
			$this->s->simpan($username,$mapel,$gambar,$soal,$opsia,$opsib,$opsic,$opsid,$gambar1,$gambar2,$gambar3,$gambar4,$jawaban);
			$pesan = '<script>alert("Soal Berhasil Disimpan")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('soal/add');
	}
	
	function hapus(){
		$id=$this->input->post('id');
		$gambar=$this->input->post('gambar');
		$gambar1=$this->input->post('gambar1');
		$gambar2=$this->input->post('gambar2');
		$gambar3=$this->input->post('gambar3');
		$gambar4=$this->input->post('gambar4');
		$path='./images/soal/'.$gambar;
		$path1='./images/soal/'.$gambar1;
		$path2='./images/soal/'.$gambar2;
		$path3='./images/soal/'.$gambar3;
		$path4='./images/soal/'.$gambar4;
		unlink($path);
		unlink($path1);
		unlink($path2);
		unlink($path3);
		unlink($path4);
		$this->s->hapus($id);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('soal');
	}		
}