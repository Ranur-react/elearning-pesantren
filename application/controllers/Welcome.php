<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('M_welcome','w'); 
	$this->load->helper('tanggal_indonesia'); // memanggil helper text
	$this->load->library('pagination');
	$this->load->model('M_pengumuman','p'); 
	$this->load->helper('text'); // memanggil helper text
	}
	public function index()
	{
		$x['post'] = $this->p->datapengumuman();		
		$this->load->view('welcome_message',$x);
	}
	
	public function cari(){
		$tcari=$this->input->post('tombolcari',TRUE);
			if(isset($tcari)){
			$a = $this->input->post('cari',TRUE);
			$this->session->set_userdata('ccari',$a);
			redirect('welcome/cari');
			}
			else{
			$a = $this->session->userdata('ccari');
		}
		
		$jum=$this->w->get($a);
		$page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
			//Ini Konfigurasi Pagination
				$config['base_url'] = site_url('welcome/cari/');
				$config['total_rows'] = $jum->num_rows();
				$config['per_page'] = '5';
				$config['uri_segment'] = 3;
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
				$config['first_link'] = '<<';
				$config['last_link'] = '>>';
				//Custom Pagination
				$config['attributes']['rel'] = false;
				$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
				$config['full_tag_close'] = '</ul></nav>';
				$config['num_tag_open'] = '<li class="page-item">';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-item disabled"><li class="page-item active"><a class="page-link" href="#">';
				$config['cur_tag_close'] = '</a></li>';
				$config['next_tag_open'] = '<li class="page-item">';
				$config['next_tag_close'] = '</li>';
				$config['prev_tag_open'] = '<li class="page-item">';
				$config['prev_tag_close'] = '</li>';
				$config['first_tag_open'] = '<li class="page-item">';
				$config['first_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li class="page-item">';
				$config['last_tag_close'] = '</li>';
				//custom pagination
		$this->pagination->initialize($config);
		$limit = $config['per_page'];		
		$x['post']=$this->w->get_page($offset,$limit,$page,$a);
		$this->load->view('cari',$x);
	
	}
}
