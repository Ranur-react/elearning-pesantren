<?php
class M_materi extends CI_Model{
    function datamateri($id) {
		$hsl=$this->db->query("SELECT * FROM materi join kelas on id_kelas=id_kelas_materi join mapel on id_mapel=id_mapel_materi where id_guru_materi='$id' ORDER BY tgl_materi DESC");
		return $hsl;
	}
	function datamateri1($id1) {
		$hsl=$this->db->query("SELECT * FROM materi join kelas on id_kelas=id_kelas_materi join mapel on id_mapel=id_mapel_materi where id_kelas_materi='$id1' ORDER BY tgl_materi DESC");
		return $hsl;
	}
	function datakelas1($id1) {
		$hsl=$this->db->query("SELECT DISTINCT nama_mapel,id_mapel_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal where id_kelas_jadwal='$id1' ORDER BY nama_mapel ASC");
		return $hsl;
	}
	function datakelas($id) {
		$hsl=$this->db->query("SELECT DISTINCT id_kelas,nama_kelas FROM jadwal JOIN kelas ON id_kelas=id_kelas_jadwal WHERE id_guru_jadwal ='$id' ORDER BY nama_kelas ASC ");
		return $hsl;
	}
	function datak() {
		$hsl=$this->db->query("SELECT id_kelas,nama_kelas FROM kelas ORDER BY nama_kelas ASC ");
		return $hsl;
	}
	function datamapel($id) {
		$hsl=$this->db->query("SELECT DISTINCT id_mapel,nama_mapel FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal WHERE id_guru_jadwal ='$id' ORDER BY nama_mapel ASC ");
		return $hsl;
	}
	function datam() {
		$hsl=$this->db->query("SELECT id_mapel,nama_mapel FROM mapel ORDER BY nama_mapel ASC ");
		return $hsl;
	}
	function cek($id) {
		$hsl=$this->db->query("SELECT * FROM materi join kelas on id_kelas=id_kelas_materi join mapel on id_mapel=id_mapel_materi where id_materi='$id'");
		return $hsl;
	}
	function simpan($mapel,$kelas,$guru,$judul,$gambar){
			$field=array(
			'id_mapel_materi'=>$mapel,
			'id_kelas_materi'=>$kelas,
			'id_guru_materi'=>$guru,
			'judul_materi'=>$judul,
			'file_materi'=>$gambar
			);
		return $this->db->insert('materi',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from materi where id_materi='$id'");
		return $hsl;
	}
	function hapususer($nis){
		$hsl=$this->db->query("delete from user where username='$nis'");
		return $hsl;
	}
	function update($id,$mapel,$kelas,$judul,$gambar){
		$hsl=$this->db->query("update materi set id_mapel_materi='$mapel',id_kelas_materi='$kelas',judul_materi='$judul',file_materi='$gambar' where id_materi='$id'");
		return $hsl;
	}
  
}
