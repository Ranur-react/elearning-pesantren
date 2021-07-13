<?php
class M_latihan extends CI_Model{
    function datalatihan($user) {
		$hsl=$this->db->query("SELECT * FROM ujian join guru on nip=guru_ujian join mapel on id_mapel=mapel_ujian join kelas on id_kelas=kelas_ujian where nip='$user' ORDER BY tgl_mulai DESC");
		return $hsl;
	}
	function dataujian($user) {
		$hsl=$this->db->query("SELECT * FROM ujian join guru on nip=guru_ujian join mapel on id_mapel=mapel_ujian join kelas on id_kelas=kelas_ujian where id_ujian='$user' ORDER BY tgl_mulai DESC");
		return $hsl;
	}
	function soalujian($user) {
		$hsl=$this->db->query("SELECT * FROM tmp_soal join soal on id_soal=id_soal_temp where id_ujian_temp='$user' ORDER BY id_soal_temp DESC");
		return $hsl;
	}
	function datahasillatihan($user) {
		$hsl=$this->db->query("SELECT * FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil where guru_hasil='$user' ORDER BY nama_kelas ASC");
		return $hsl;
	}
	function cetak($id) {
		$hsl=$this->db->query("SELECT * FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil where id_hasil='$id'");
		return $hsl;
	}
	function cetakguru($kelas,$user,$lat) {
		$hsl=$this->db->query("SELECT * FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil join mapel on id_mapel=mapel_ujian where kelas_hasil='$kelas' AND guru_hasil='$user' AND id_ujian_hasil='$lat'");
		return $hsl;
	}
	function cetakhasil($kelas,$user,$mata) {
		// $hsl=$this->db->query("SELECT * ,SUM(benar) as totalbenar,SUM(kosong) as totalkosong,SUM(salah) as totalsalah,sum(score)/count(score) as totalscore FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil join mapel on id_mapel=mapel_ujian join soal on mapel_soal=id_mapel where kelas_hasil='$kelas' AND guru_hasil='$user' AND mapel_ujian='$mata' group by `id_soal`");
		$hsl=$this->db->query("SELECT * ,benar as totalbenar,kosong as totalkosong,salah as totalsalah,sum(score)/count(score) as totalscore FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil join mapel on id_mapel=mapel_ujian join soal on mapel_soal=id_mapel where kelas_hasil='$kelas' AND guru_hasil='$user' AND mapel_ujian='$mata' group by `id_soal`");
		return $hsl;
	}
	function cetakhasiljmlhsiswa($kelas,$user,$mata) {
		// $hsl=$this->db->query("SELECT * ,SUM(benar) as totalbenar,SUM(kosong) as totalkosong,SUM(salah) as totalsalah,sum(score)/count(score) as totalscore FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil join mapel on id_mapel=mapel_ujian join soal on mapel_soal=id_mapel where kelas_hasil='$kelas' AND guru_hasil='$user' AND mapel_ujian='$mata' group by `siswa_hasil`;");
		$hsl=$this->db->query("SELECT * ,benar as totalbenar,kosong as totalkosong,salah as totalsalah,sum(score)/count(score) as totalscore FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil join mapel on id_mapel=mapel_ujian join soal on mapel_soal=id_mapel where kelas_hasil='$kelas' AND guru_hasil='$user' AND mapel_ujian='$mata' group by `siswa_hasil`;");
		return $hsl;
	}
	function datahasillatihan1($user) {
		$hsl=$this->db->query("SELECT * FROM hasil_ujian join ujian on id_ujian=id_ujian_hasil join kelas on id_kelas=kelas_hasil join siswa on nis=siswa_hasil where siswa_hasil='$user' ORDER BY nama_kelas ASC");
		return $hsl;
	}
	function hasilujian($id,$kelas,$guru,$user,$benar,$salah,$kosong,$jumlah,$score) {
		$field=array(
			'id_ujian_hasil'=>$id,
			'kelas_hasil'=>$kelas,
			'guru_hasil'=>$guru,
			'siswa_hasil'=>$user,
			'benar'=>$benar,
			'salah'=>$salah,
			'kosong'=>$kosong,
			'jumlah'=>$jumlah,
			'score'=>$score
			);
		return $this->db->insert('hasil_ujian',$field);
	}
	function soalujian_perpage($offset,$limit,$page,$user){
		$hsl=$this->db->query("SELECT * FROM tmp_soal join soal on id_soal=id_soal_temp where id_ujian_temp='$user' ORDER BY id_soal_temp DESC limit $offset,$limit");
		return $hsl;
	} 	
	function soal($kls) {
		$hsl=$this->db->query("SELECT * FROM ujian join guru on nip=guru_ujian join mapel on id_mapel=mapel_ujian join kelas on id_kelas=kelas_ujian where kelas_ujian='$kls' ORDER BY tgl_mulai DESC");
		return $hsl;
	}	
	function datasoal($user) {
		$hsl=$this->db->query("SELECT * FROM soal join mapel on id_mapel=mapel_soal where guru_soal='$user' ORDER BY created_on DESC");
		return $hsl;
	}
	function detailsoal($id) {
		$hsl=$this->db->query("SELECT * FROM tmp_soal join soal on id_soal=id_soal_temp where id_ujian_temp='$id' ORDER BY id ASC");
		return $hsl;
	}
	function jmlh($id) {
		$hsl=$this->db->query("SELECT * FROM tmp_soal where id_ujian_temp='$id'");
		return $hsl->num_rows();
	}
	function hasil($nomor,$jawaban) {
		$hsl=$this->db->query("select * from soal where id_soal='$nomor' and jawaban='$jawaban'");
		return $hsl->num_rows();
	}
	function tambahscore($nomor,$jawaban) {
		$hsl=$this->db->query("select bobot from soal where id_soal='$nomor' and jawaban='$jawaban'");
		return $hsl->row_array();
	}
	
	function datakelas($user) {
		$hsl=$this->db->query("SELECT DISTINCT id_kelas,nama_kelas FROM jadwal join kelas on id_kelas=id_kelas_jadwal where id_guru_jadwal='$user' ORDER BY nama_kelas ASC");
		return $hsl;
	}
	function datamapel($user) {
		$hsl=$this->db->query("SELECT DISTINCT id_mapel,nama_mapel FROM jadwal join kelas on id_kelas=id_kelas_jadwal join mapel on id_mapel=id_mapel_jadwal where id_guru_jadwal='$user' ORDER BY nama_mapel ASC");
		return $hsl;
	}	
	function hapusitem($id,$idb) {
		return $this->db->delete('tmp_soal', array('id_ujian_temp' => $id,'id_soal_temp'=>$idb));
	}
	function cek($id,$idb) {
		$hsl=$this->db->query("SELECT * FROM tmp_soal where id_ujian_temp='$id' AND id_soal_temp='$idb'");
		return $hsl;
	}
	function cekpinjam($id) {
		$hsl=$this->db->query("SELECT * FROM peminjaman join siswa on NISN=NISN_peminjaman where id_peminjaman='$id'");
		return $hsl;
	}
	function simpantemp($id,$idb){
			$field=array(
			'id_ujian_temp'=>$id,
			'id_soal_temp'=>$idb
			);
		return $this->db->insert('tmp_soal',$field);
	}
	function simpan($id,$user,$mapel,$kelas,$judul,$jmlh,$waktu,$tglmulai,$tglselesai){
			$field=array(
			'id_ujian'=>$id,
			'guru_ujian'=>$user,
			'mapel_ujian'=>$mapel,
			'kelas_ujian'=>$kelas,
			'nama_ujian'=>$judul,
			'jumlah_soal'=>$jmlh,
			'waktu'=>$waktu,
			'tgl_mulai'=>$tglmulai,
			'tgl_selesai'=>$tglselesai
			);
		return $this->db->insert('ujian',$field);
	}
	function update($id,$user,$mapel,$kelas,$judul,$jmlh,$waktu,$tglmulai,$tglselesai){
		$hsl=$this->db->query("update ujian set mapel_ujian='$mapel',kelas_ujian='$kelas',nama_ujian='$judul',jumlah_soal='$jmlh',waktu='$waktu',tgl_mulai='$tglmulai',tgl_selesai='$tglselesai' where id_ujian='$id'");
		return $hsl;
	}
	function hapus($id){
		$hsl=$this->db->query("delete from ujian where id_ujian='$id'");
		return $hsl;
	}
	function hapusdetail($id){
		$hsl=$this->db->query("delete from tmp_soal where id_ujian_temp='$id'");
		return $hsl;
	}
	function namaujian($user) {
		$hsl=$this->db->query("SELECT DISTINCT id_ujian,nama_ujian FROM ujian where guru_ujian='$user' ORDER BY nama_ujian ASC");
		return $hsl;
	}	
  
}
