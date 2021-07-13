<?php
class M_forum extends CI_Model{
    function dataforum() {
		$hsl=$this->db->query("SELECT * FROM forum join mapel on id_mapel=pelajaran_forum order by created DESC");
		return $hsl;
	}
	function dataforum1($id) {
		$hsl=$this->db->query("SELECT * FROM forum join mapel on id_mapel=pelajaran_forum where id_forum='$id'");
		return $hsl;
	}
	function date() {
		$hsl=$this->db->query("SELECT DISTINCT DATE(created) as tgl FROM forum order by tgl DESC");
		return $hsl;
	}
	function datamapel() {
		$hsl=$this->db->query("SELECT * FROM mapel");
		return $hsl;
	}
	function komentar() {
		$hsl=$this->db->query("SELECT * FROM komentar join forum on id_forum=id_forum_komentar");
		return $hsl;
	}
	function simpan($judul,$mapel,$isi,$id){
			$field=array(
			'judul_forum'=>$judul,
			'pelajaran_forum'=>$mapel,
			'isi_forum'=>$isi,
			'author'=>$id
			);
		return $this->db->insert('forum',$field);
	}
	function simpkomen($id,$isi,$aut){
			$field=array(
			'id_forum_komentar'=>$id,
			'isi_komentar'=>$isi,
			'author_komentar'=>$aut
			);
		return $this->db->insert('komentar',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from forum where id_forum='$id'");
		return $hsl;
	}
	function hapuskom($id){
		$hsl=$this->db->query("delete from komentar where id_komentar='$id'");
		return $hsl;
	}
	function update($id,$nama){
		$hsl=$this->db->query("update mapel set nama_mapel='$nama' where id_mapel='$id'");
		return $hsl;
	}
  
}
