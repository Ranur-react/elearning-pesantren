<?php
class M_soal extends CI_Model{
    function datasoal($id) {
		$hsl=$this->db->query("SELECT * FROM soal join mapel on id_mapel=mapel_soal where guru_soal='$id' ORDER BY created_on ASC");
		return $hsl;
	}
	function datamapel($id) {
		$hsl=$this->db->query("SELECT DISTINCT id_mapel,nama_mapel FROM jadwal join kelas on id_kelas=id_kelas_jadwal join mapel on id_mapel=id_mapel_jadwal where id_guru_jadwal='$id' ORDER BY nama_mapel ASC");
		return $hsl;
	}
	function datakelas() {
		$hsl=$this->db->query("SELECT * FROM kelas ORDER BY nama_kelas ASC");
		return $hsl;
	}
	function cek($nis) {
		$hsl=$this->db->query("SELECT * FROM siswa where nis='$nis'");
		return $hsl;
	}
	function simpan($username,$mapel,$gambar,$soal,$opsia,$opsib,$opsic,$opsid,$gambar1,$gambar2,$gambar3,$gambar4,$jawaban){
			$field=array(
			'guru_soal'=>$username,
			'mapel_soal'=>$mapel,
			'file'=>$gambar,
			'soal'=>$soal,
			'opsi_a'=>$opsia,
			'opsi_b'=>$opsib,
			'opsi_c'=>$opsic,
			'opsi_d'=>$opsid,
			'file_a'=>$gambar1,
			'file_b'=>$gambar2,
			'file_c'=>$gambar3,
			'file_d'=>$gambar4,
			'jawaban'=>$jawaban
			);
		return $this->db->insert('soal',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from soal where id_soal='$id'");
		return $hsl;
	}
	function update($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$kelas,$nohp,$namaayah,$notelayah,$namaibu,$notelibu,$gambar){
		$hsl=$this->db->query("update siswa set nama_siswa='$nama',tempatlahir_siswa='$tempat',tgllahir_siswa='$tgl',jenkel_siswa='$jenkel',email_siswa='$email',alamat_siswa='$alamat',kelas_siswa='$kelas',notel_siswa='$nohp',namaayah_siswa='$namaayah',notelayah_siswa='$notelayah',namaibu_siswa='$namaibu',notelibu_siswa='$notelibu',foto_siswa='$gambar' where nis='$nis'");
		return $hsl;
	}
	function update_noimg($nis,$nama,$tempat,$tgl,$jenkel,$email,$alamat,$kelas,$nohp,$namaayah,$notelayah,$namaibu,$notelibu){
		$hsl=$this->db->query("update siswa set nama_siswa='$nama',tempatlahir_siswa='$tempat',tgllahir_siswa='$tgl',jenkel_siswa='$jenkel',email_siswa='$email',alamat_siswa='$alamat',kelas_siswa='$kelas',notel_siswa='$nohp',namaayah_siswa='$namaayah',notelayah_siswa='$notelayah',namaibu_siswa='$namaibu',notelibu_siswa='$notelibu' where nis='$nis'");
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
