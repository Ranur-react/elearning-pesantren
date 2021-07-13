<?php
class M_siswa extends CI_Model{
    function datasiswa() {
		$hsl=$this->db->query("SELECT * FROM siswa ORDER BY nama_siswa ASC");
		return $hsl;
	}
	function cek($nis) {
		$hsl=$this->db->query("SELECT * FROM siswa where nis='$nis'");
		return $hsl;
	}
	function simpan($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$nohp,$namaayah,$notelayah,$namaibu,$notelibu,$gambar){
			$field=array(
			'nis'=>$nis,
			'nama_siswa'=>$nama,
			'tempatlahir_siswa'=>$tempat,
			'tgllahir_siswa'=>$tgl,
			'jenkel_siswa'=>$jenkel,
			'email_siswa'=>$email,
			'alamat_siswa'=>$alamat,			
			'notel_siswa'=>$nohp,
			'namaayah_siswa'=>$namaayah,
			'notelayah_siswa'=>$notelayah,
			'namaibu_siswa'=>$namaibu,
			'notelibu_siswa'=>$notelibu,
			'foto_siswa'=>$gambar
			);
		return $this->db->insert('siswa',$field);
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
	function hapus($nis){
		$hsl=$this->db->query("delete from siswa where nis='$nis'");
		return $hsl;
	}
	function hapususer($nis){
		$hsl=$this->db->query("delete from user where username='$nis'");
		return $hsl;
	}
	function update($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$nohp,$namaayah,$notelayah,$namaibu,$notelibu,$gambar){
		$hsl=$this->db->query("update siswa set nama_siswa='$nama',tempatlahir_siswa='$tempat',tgllahir_siswa='$tgl',jenkel_siswa='$jenkel',email_siswa='$email',alamat_siswa='$alamat',notel_siswa='$nohp',namaayah_siswa='$namaayah',notelayah_siswa='$notelayah',namaibu_siswa='$namaibu',notelibu_siswa='$notelibu',foto_siswa='$gambar' where nis='$nis'");
		return $hsl;
	}
	function update_noimg($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$nohp,$namaayah,$notelayah,$namaibu,$notelibu){
		$hsl=$this->db->query("update siswa set nama_siswa='$nama',tempatlahir_siswa='$tempat',tgllahir_siswa='$tgl',jenkel_siswa='$jenkel',email_siswa='$email',alamat_siswa='$alamat',notel_siswa='$nohp',namaayah_siswa='$namaayah',notelayah_siswa='$notelayah',namaibu_siswa='$namaibu',notelibu_siswa='$notelibu' where nis='$nis'");
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
