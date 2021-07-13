<?php
class M_guru extends CI_Model{
    function datamapel() {
		$hsl=$this->db->query("SELECT * FROM mapel ORDER BY nama_mapel ASC");
		return $hsl;
	}
	function dataguru() {
		$hsl=$this->db->query("SELECT * FROM guru ORDER BY nama_guru ASC");
		return $hsl;
	}
	function cek($nip) {
		$hsl=$this->db->query("SELECT * FROM guru where nip='$nip'");
		return $hsl;
	}
	function simpan($nip,$nama,$alamat,$jenkel,$pendidikan,$nohp,$email,$gambar){
			$field=array(
			'nip'=>$nip,
			'nama_guru'=>$nama,
			'alamat_guru'=>$alamat,
			'jenkel_guru'=>$jenkel,
			'pendidikan_guru'=>$pendidikan,
			'notel_guru'=>$nohp,
			'email_guru'=>$email,
			'foto_guru'=>$gambar
			);
		return $this->db->insert('guru',$field);
	}
	function simpanuser($nis,$pas,$nama,$jenkel,$email,$nohp,$alamat,$level,$gambar1){
			$field=array(
			'username'=>$nis,
			'password'=>$pas,
			'nama_user'=>$nama,
			'jenkel_user'=>$jenkel,
			'email_user'=>$email,
			'notel_user'=>$nohp,
			'alamat_user'=>$alamat,
			'level_user'=>$level,
			'foto_user'=>$gambar1
			);
		return $this->db->insert('user',$field);
	}
	function hapususer($nip){
		$hsl=$this->db->query("delete from user where username='$nip'");
		return $hsl;
	}
	function hapus($nip){
		$hsl=$this->db->query("delete from guru where nip='$nip'");
		return $hsl;
	}
	function update($nip,$nama,$alamat,$jenkel,$pendidikan,$nohp,$email,$gambar){
		$hsl=$this->db->query("update guru set nama_guru='$nama',alamat_guru='$alamat',jenkel_guru='$jenkel',pendidikan_guru='$pendidikan',notel_guru='$nohp',email_guru='$email',foto_guru='$gambar' where nip='$nip'");
		return $hsl;
	}
	function update_noimg($nip,$nama,$alamat,$jenkel,$pendidikan,$nohp,$email){
		$hsl=$this->db->query("update guru set nama_guru='$nama',alamat_guru='$alamat',jenkel_guru='$jenkel',pendidikan_guru='$pendidikan',notel_guru='$nohp',email_guru='$email' where nip='$nip'");
		return $hsl;
	}
	function updateuser($nis,$nama,$jenkel,$email,$nohp,$alamat,$gambar1){
		$hsl=$this->db->query("update user set nama_user='$nama',jenkel_user='$jenkel',email_user='$email',notel_user='$nohp',alamat_user='$alamat',foto_user='$gambar1' where username='$nis'");
		return $hsl;
	}
	function updateuser_noimg($nis,$nama,$jenkel,$email,$nohp,$alamat){
		$hsl=$this->db->query("update user set nama_user='$nama',jenkel_user='$jenkel',email_user='$email',notel_user='$nohp',alamat_user='$alamat' where username='$nis'");
		return $hsl;
	}
  
}
