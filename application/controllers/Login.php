<?php
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_login','l');
	}	
	public function index()
	{
		$this->load->view('login');
	}
	
	function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        $password=strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
		$level=strip_tags(str_replace("'", "", $this->input->post('level',TRUE)));
        $cadmin=$this->l->cekadmin($username,$password,$level);
		$cguru=$this->l->cekguru($username,$password,$level);
		$csiswa=$this->l->ceksiswa($username,$password,$level);
		if($csiswa->num_rows() > 0){
				$xcsiswa=$csiswa->row_array();
				$newdata = array(
					'username'  => $xcsiswa['username'],
					'nama'      => $xcsiswa['nama_user'],
					'level'      => $xcsiswa['level_user'],
					'foto'      => $xcsiswa['foto_user'],
					'kelas'      => $xcsiswa['kelas_siswa'],
					'loggedpesantren_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				redirect('dashboard'); 
		}
		else if($cguru->num_rows() > 0){
				$xcguru=$cguru->row_array();
				$newdata = array(
					'username'  => $xcguru['username'],
					'nama'      => $xcguru['nama_user'],
					'level'      => $xcguru['level_user'],
					'foto'      => $xcguru['foto_user'],
					'loggedpesantren_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				redirect('dashboard'); 
		}
		else if($cadmin->num_rows() > 0){
				$xcadmin=$cadmin->row_array();
				$newdata = array(
					'username'  => $xcadmin['username'],
					'nama'      => $xcadmin['nama_user'],
					'level'      => $xcadmin['level_user'],
					'foto'      => $xcadmin['foto_user'],
					'loggedpesantren_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				redirect('dashboard'); 
		}
		else{
				$this->session->set_flashdata('msg', '<script>alert("Username atau password salah")</script>');
				redirect('welcome'); 
		}
	}
	function logout(){
        $this->session->sess_destroy();
        $pesan = '<script>alert("Berhasil Logout")</script>';
		$this->session->set_flashdata('pesan', $pesan);
		redirect('welcome');
    }
}
