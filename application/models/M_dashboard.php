<?php
class M_dashboard extends CI_Model{
    function datauser($username) {
		$hsl=$this->db->query("SELECT * FROM user where username='$username'");
		return $hsl;
	}
	function pengumuman() {
		$hsl=$this->db->query("SELECT * FROM pengumuman ORDER BY tgl_pengumuman DESC");
		return $hsl;
	}
	function update($id,$nama,$jenkel,$email,$notel,$alamat){
		$hsl=$this->db->query("update user set nama_user='$nama', jenkel_user='$jenkel', email_user='$email', notel_user='$notel', alamat_user='$alamat' where username='$id'");
		return $hsl;
	}
	function updates($id,$nama,$jenkel,$email,$notel,$alamat){
		$hsl=$this->db->query("update siswa set nama_siswa='$nama', jenkel_siswa='$jenkel', email_siswa='$email', notel_siswa='$notel', alamat_siswa='$alamat' where nis='$id'");
		return $hsl;
	}
	function updateg($id,$nama,$jenkel,$email,$notel,$alamat){
		$hsl=$this->db->query("update guru set nama_guru='$nama', jenkel_guru='$jenkel', email_guru='$email', notel_guru='$notel', alamat_guru='$alamat' where nip='$id'");
		return $hsl;
	}
	function cek($nis) {
		$hsl=$this->db->query("SELECT * FROM siswa where nis='$nis'");
		return $hsl;
	}
	function upfoto($id,$gambar1){
		$hsl=$this->db->query("update user set foto_user='$gambar1' where username='$id'");
		return $hsl;
	}
	function upfotos($id,$gambar){
		$hsl=$this->db->query("update siswa set foto_siswa='$gambar' where nis='$id'");
		return $hsl;
	}
	function upfotog($id,$gambar){
		$hsl=$this->db->query("update guru set foto_guru='$gambar' where nip='$id'");
		return $hsl;
	}
	function cekuser($username,$pwl) {
		$hsl=$this->db->query("SELECT * FROM user where username='$username' AND password=md5('$pwl')");
		return $hsl;
	}
	function change($username,$pwb){
		$hsl=$this->db->query("update user set password=md5('$pwb') where username='$username'");
		return $hsl;
	}
	function guru() {
		$hsl=$this->db->query("SELECT * FROM guru");
		return $hsl;
	}
	function simpan($id,$nama,$ket,$guru){
			$field=array(
			'id_kelas'=>$id,
			'nama_kelas'=>$nama,
			'ket_kelas'=>$ket,
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
	function totalpelajaran()
	{
		return $this->db->query("SELECT COUNT( * ) AS total FROM mapel");
	}
	function guru1()
	{
		return $this->db->query("SELECT COUNT( * ) AS total FROM guru");
	}
	function siswa()
	{
		return $this->db->query("SELECT COUNT( * ) AS total FROM siswa");
	}
	function tamu()
	{
		return $this->db->query("SELECT COUNT( * ) AS total FROM btamu");
	}
  
}
