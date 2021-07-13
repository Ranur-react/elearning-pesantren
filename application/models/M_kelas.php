<?php
class M_kelas extends CI_Model{
    function datakelas() {
		$hsl=$this->db->query("SELECT * FROM kelas join guru on nip=wali_kelas");
		return $hsl;
	}
	function datakelas1() {
		$hsl=$this->db->query("SELECT * FROM temp_kelas join kelas on id_kelas=id_kelas_temp GROUP BY id_kelas");
		return $hsl;
	}
	function cek($nama) {
		$hsl=$this->db->query("SELECT * FROM kelas where nama_kelas='$nama'");
		return $hsl;
	}
	function datasiswa($id) {
		$hsl=$this->db->query("SELECT * FROM siswa left join kelas on id_kelas=kelas_siswa where kelas_siswa='$id' ORDER BY nama_siswa ASC");
		return $hsl;
	}
	function datasiswa1($id) {
		$hsl=$this->db->query("SELECT * FROM temp_kelas left join kelas on id_kelas=id_kelas_temp join siswa on nis=id_siswa_temp where id_kelas_temp='$id' ORDER BY nama_siswa ASC");
		return $hsl;
	}
	function cekkelas($id) {
		$hsl=$this->db->query("SELECT * FROM kelas join guru on nip=wali_kelas where id_kelas='$id'");
		return $hsl;
	}
	function cekkelas1($id) {
		$hsl=$this->db->query("SELECT * FROM temp_kelas left join kelas on id_kelas=id_kelas_temp join siswa on nis=id_siswa_temp where id_kelas_temp='$id' ORDER BY nama_siswa ASC");
		return $hsl;
	}
	function totsiswa($id) {
		$hsl=$this->db->query("SELECT COUNT( * ) AS total, SUM(IF(jenkel_siswa='L',1,0)) AS laki, SUM(IF(jenkel_siswa='P',1,0)) AS perempuan FROM siswa WHERE kelas_siswa='$id'");
		return $hsl;
	}
	function totsiswa1($id) {
		$hsl=$this->db->query("SELECT COUNT( * ) AS total , SUM(IF(jenkel_siswa='L',1,0)) AS laki, SUM(IF(jenkel_siswa='P',1,0)) AS perempuan FROM temp_kelas LEFT JOIN kelas ON id_kelas=id_kelas_temp JOIN siswa ON nis=id_siswa_temp WHERE id_kelas_temp='$id'");
		return $hsl;
	}
	function tdatasiswa($id) {
		$hsl=$this->db->query("SELECT * FROM siswa where kelas_siswa='$id' order by nama_siswa ASC");
		return $hsl;
	}
	function tdatasiswa1($id) {
		$hsl=$this->db->query("SELECT * FROM temp_kelas left join kelas on id_kelas=id_kelas_temp join siswa on nis=id_siswa_temp where id_kelas_temp='$id' order by nama_siswa ASC");
		return $hsl;
	}
	function guru() {
		$hsl=$this->db->query("SELECT * FROM guru");
		return $hsl;
	}
	function simpan($id,$nama,$guru){
			$field=array(
			'id_kelas'=>$id,
			'nama_kelas'=>$nama,
			'wali_kelas'=>$guru
			);
		return $this->db->insert('kelas',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from kelas where id_kelas='$id'");
		return $hsl;
	}
	function daftar($id){
		$hsl=$this->db->query("delete from jadwal where id_kelas_jadwal='$id'");
		return $hsl;
	}
	function update($id,$nama,$guru){
		$hsl=$this->db->query("update kelas set nama_kelas='$nama', wali_kelas='$guru' where id_kelas='$id'");
		return $hsl;
	}
	function upkelas($idb,$kelas){
		$hsl=$this->db->query("update siswa set kelas_siswa='$kelas' where nis='$idb'");
		return $hsl;
	}
	function upkelas1($id,$kelas){
		$hsl=$this->db->query("update siswa set kelas_siswa='$kelas' where nis='$id'");
		return $hsl;
	}
	function listsiswa() {
		$hsl=$this->db->query("SELECT * FROM siswa where kelas_siswa is NULL OR kelas_siswa=''");
		return $hsl;
	}
  
}

