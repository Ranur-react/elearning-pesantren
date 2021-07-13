<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['loggedpesantren_in'])){
            $pesan = '<script>alert("Anda harus login dulu")</script>';
			$this->session->set_flashdata('msg', $pesan);
			redirect('login');
        };
		$this->load->model('M_dashboard','d');
		$this->load->helper('tanggal_indonesia');
		$this->load->library('upload');
		$this->load->helper('text'); // memanggil helper text
	}
	function index(){
			//$x['visitor'] = $this->p->statistik_pengujung();
			$username=$_SESSION['username'];
			/*$x['post'] = $this->t->get_total_post($username);
			$x['post1'] = $this->t->get_total_post_up($username);
			$x['authl'] = $this->t->get_total_authl();
			$x['authp'] = $this->t->get_total_authp();*/
			$x['pelajaran'] = $this->d->totalpelajaran();
			$x['guru'] = $this->d->guru1();
			$x['tamu'] = $this->d->tamu();
			$x['siswa'] = $this->d->siswa();
			$x['post'] = $this->d->datauser($username);
			$x['pengumuman'] = $this->d->pengumuman();
			$template = array(
			
			'menu' => $this->load->view('template/menu', '', TRUE),
			'isi' => $this->load->view('home', $x, TRUE),
			);
			$this->parser->parse('template/template', $template);
			//$this->load->view('admin/v_dashboard',$x);
	
	}
	function update() {
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$jenkel=$this->input->post('jenkel');
		$email=$this->input->post('email');
		$notel=$this->input->post('notel');
		$alamat=$this->input->post('alamat');
		$this->d->update($id,$nama,$jenkel,$email,$notel,$alamat);
		$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('dashboard');
	}
	function change() {
		$username=$_SESSION['username'];
		$pwl=$this->input->post('pwl');
		$pwb=$this->input->post('pwb');
		$cek = $this->d->cekuser($username,$pwl);
		if($cek->num_rows() > 0){
		   $this->d->change($username,$pwb);
		   $pesan = '<script>alert("Password Berhasil Diganti")</script>';
		   $this->session->set_flashdata('pesan', $pesan);
		   redirect('dashboard');}
		else{
		$pesan = '<script>alert("Password lama anda tidak sesuai")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('dashboard');
		}
	}
	function updates() {
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$jenkel=$this->input->post('jenkel');
		$email=$this->input->post('email');
		$notel=$this->input->post('notel');
		$alamat=$this->input->post('alamat');
		$this->d->update($id,$nama,$jenkel,$email,$notel,$alamat);
		$this->d->updates($id,$nama,$jenkel,$email,$notel,$alamat);
		$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('dashboard');
	}
	function updateg() {
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$jenkel=$this->input->post('jenkel');
		$email=$this->input->post('email');
		$notel=$this->input->post('notel');
		$alamat=$this->input->post('alamat');
		$this->d->update($id,$nama,$jenkel,$email,$notel,$alamat);
		$this->d->updateg($id,$nama,$jenkel,$email,$notel,$alamat);
		$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('dashboard');
	}
	function upfotos() {
		$id=$this->input->post('id');
		$config['upload_path'] = './images/siswa'; //path folder
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
			$path=$this->session->userdata('foto');
			unlink($path);
			$this->d->upfoto($id,$gambar1);
			$this->d->upfotos($id,$gambar);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
			}else{
	        $pesan = '<script>alert("Data Gagal Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
	        }
	}
	function upfoto() {
		$id=$this->input->post('id');
		$config['upload_path'] = './images/admin'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);
		if ($this->upload->do_upload('foto'))
	        {
	        $gbr = $this->upload->data();
	        //Compress Image
	        $config['image_library']='gd2';
	        $config['source_image']='./images/admin/'.$gbr['file_name'];
	        $config['create_thumb']= FALSE;
	        $config['maintain_ratio']= FALSE;
	        $config['quality']= '60%';
	        $config['width']= 215;
	        $config['height']= 215;
	        $config['new_image']= './images/admin/'.$gbr['file_name'];
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();
			
			$gambar='images/admin/'.$gbr['file_name'];
			$path=$this->session->userdata('foto');
			unlink($path);
			$this->d->upfoto($id,$gambar);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
			}else{
	        $pesan = '<script>alert("Data Gagal Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
	        }
	}
	function upfotog() {
		$id=$this->input->post('id');
		$config['upload_path'] = './images/guru'; //path folder
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
	        $config['new_image']= './images/admin/'.$gbr['file_name'];
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();
			
			$gambar=$gbr['file_name'];
			$gambar1='images/guru/'.$gbr['file_name'];
			$path=$this->session->userdata('foto');
			unlink($path);
			$this->d->upfoto($id,$gambar1);
			$this->d->upfotog($id,$gambar);
			$pesan = '<script>alert("Data Berhasil Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
			}else{
	        $pesan = '<script>alert("Data Gagal Diupdate")</script>';
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dashboard');
	        }
	}
}