<?php
class M_welcome extends CI_Model{
    function get($a){
		$hsl=$this->db->query("SELECT * FROM buku join kategori on id_kategori=kategori_buku where judul_buku LIKE '%$a%' OR penerbit LIKE '%$a%' OR nama_kategori LIKE '%$a%' order by judul_buku ASC");
		return $hsl;
	}
	function get_page($offset,$limit,$page,$a){
		$hsl=$this->db->query("SELECT * FROM buku join kategori on id_kategori=kategori_buku where judul_buku LIKE '%$a%' OR penerbit LIKE '%$a%' OR nama_kategori LIKE '%$a%' ORDER BY judul_buku ASC limit $offset,$limit");
		return $hsl;
	} 
  
}
