<?php
class M_mapel extends CI_Model{
    function datamapel() {
		$hsl=$this->db->query("SELECT * FROM mapel");
		return $hsl;
	}
	function cek($nama) {
		$hsl=$this->db->query("SELECT * FROM mapel where nama_mapel='$nama'");
		return $hsl;
	}
	function simpan($id,$nama){
			$field=array(
			'id_mapel'=>$id,
			'nama_mapel'=>$nama
			);
		return $this->db->insert('mapel',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from mapel where id_mapel='$id'");
		return $hsl;
	}
	function update($id,$nama){
		$hsl=$this->db->query("update mapel set nama_mapel='$nama' where id_mapel='$id'");
		return $hsl;
	}
  
}
