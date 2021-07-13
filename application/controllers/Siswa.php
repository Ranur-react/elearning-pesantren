<?php
class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $pesan = '<script>alert("Anda harus login dulu")</script>';
			$this->session->set_flashdata('msg', $pesan);
			redirect('login');
        };	
		$this->load->model('M_siswa','s'); 
		$this->load->library('upload');
	}
	function index(){
		$x['post'] = $this->s->datasiswa();
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('siswa/view', $x, TRUE),
		);
		$this->parser->parse('template/template', $template);
	
	}
	function add() {
		$template = array(
		'menu' => $this->load->view('template/menu', '', TRUE),
		'isi' => $this->load->view('siswa/add', '', TRUE),
		);
		$this->parser->parse('template/template', $template);
	}
	
	function simpan() {
		$config['upload_path'] = './images/siswa/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    $this->upload->initialize($config);
		if ($this->upload->do_upload('foto'))
	         {
	         $gbr = $this->upload->data();
	         //Compress Image
	         $config['image_library']='gd2';
	         $config['source_image']='./images/siswa/'.$gbr['file_name'];
	         $config['create_thumb']= FALSE;
	         $config['maintain_ratio']= FALSE;
	         $config['quality']= '60%';
	         $config['width']= 215;
	         $config['height']= 215;
	         $config['new_image']= './images/siswa/'.$gbr['file_name'];
	         $this->load->library('image_lib', $config);
	         $this->image_lib->resize();
				
				$gambar=$gbr['file_name'];
				$gambar1='images/siswa/'.$gbr['file_name'];
				$nis=$this->input->post('nis');
				$pas=md5('1234');
				$level=3;
				$nama=$this->input->post('nama');		
				$tempat=$this->input->post('tempat');
				$tgl=$this->input->post('tgl');
				$jenkel=$this->input->post('jenkel');
				$email=$this->input->post('email');
				$nohp=$this->input->post('nohp');
				$alamat=$this->input->post('alamat');
				$namaayah=$this->input->post('namaayah');
				$notelayah=$this->input->post('notelayah');
				$namaibu=$this->input->post('namaibu');
				$notelibu=$this->input->post('notelibu');
				$cek=$this->s->cek($nis);
				if($cek->num_rows() > 0){
					$pesan = '<script>alert("NIS Siswa Sudah Ada")</script>';
					$this->session->set_flashdata('pesan', $pesan);
					redirect('siswa/add');
				}else{
					$this->s->simpan($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$nohp,$namaayah,$notelayah,$namaibu,$notelibu,$gambar);
					$this->s->simpanuser($nis,$pas,$nama,$jenkel,$email,$nohp,$alamat,$level,$gambar1);
					$pesan = '<script>alert("Data Berhasil Disimpan")</script>';
					$this->session->set_flashdata('pesan', $pesan);
					redirect('siswa');
					}
			}else{
				$pesan = '<script>alert("Data Gagal Disimpan")</script>';
				$this->session->set_flashdata('pesan', $pesan);
				redirect('siswa/add');
				}		
	}
	
	function hapus(){
		$nis=$this->input->post('nis');
		$gambar=$this->input->post('gambar');
		$path='./images/siswa/'.$gambar;
		unlink($path);
		$this->s->hapus($nis);
		$this->s->hapususer($nis);
		$pesan = '<script>alert("Data Berhasil Dihapus")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('siswa');
	}
	function edit(){
		$nisn=$this->uri->segment(3);
		$x['data']=$this->s->cek($nisn);
		$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('siswa/edit', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
		
	}
	function update(){
	            $config['upload_path'] = './images/siswa'; //path folder
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
	                        $config['source_image']='./images/siswa/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 215;
	                        $config['height']= 215;
	                        $config['new_image']= './images/siswa/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
							
							$gambar=$gbr['file_name'];
							$gambar1='images/siswa/'.$gbr['file_name'];
							$nis=$this->input->post('nis');
							$nama=$this->input->post('nama');
							$tempat=$this->input->post('tempat');
							$tgl=$this->input->post('tgl');
							$jenkel=$this->input->post('jenkel');
							$email=$this->input->post('email');
							$nohp=$this->input->post('nohp');
							$alamat=$this->input->post('alamat');
							$namaayah=$this->input->post('namaayah');
							$notelayah=$this->input->post('notelayah');
							$namaibu=$this->input->post('namaibu');
							$notelibu=$this->input->post('notelibu');
							$foto1=$this->input->post('foto1');
							$path='./images/siswa/'.$foto1;
							unlink($path);
							$this->s->update($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$nohp,$namaayah,$notelayah,$namaibu,$notelibu,$gambar);
							$this->s->updateuser($nis,$nama,$jenkel,$email,$nohp,$alamat,$gambar1);
							$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
							$this->session->set_flashdata('pesan', $pesan);
							redirect('siswa');
	                    
	                }else{
	                    $pesan = '<script>alert("Data Gagal Diupdate")</script>';
							$this->session->set_flashdata('pesan', $pesan);
							redirect('siswa');
	                }
	                
	            }else{
							$nis=$this->input->post('nis');
							$nama=$this->input->post('nama');		
							$tempat=$this->input->post('tempat');
							$tgl=$this->input->post('tgl');
							$jenkel=$this->input->post('jenkel');
							$email=$this->input->post('email');
							$nohp=$this->input->post('nohp');
							$alamat=$this->input->post('alamat');
							$namaayah=$this->input->post('namaayah');
							$notelayah=$this->input->post('notelayah');
							$namaibu=$this->input->post('namaibu');
							$notelibu=$this->input->post('notelibu');
							$this->s->update_noimg($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$nohp,$namaayah,$notelayah,$namaibu,$notelibu);
							$this->s->updateuser_noimg($nis,$nama,$jenkel,$email,$nohp,$alamat);
							$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
							$this->session->set_flashdata('pesan', $pesan);
							redirect('siswa');
	            } 

	}
	
	
	
	
}