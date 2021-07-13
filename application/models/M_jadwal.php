<?php
class M_jadwal extends CI_Model{
    function mapel() {
		$hsl=$this->db->query("SELECT * FROM mapel order by nama_mapel ASC");
		return $hsl;
	}
	function datakelas() {
		$hsl=$this->db->query("SELECT * FROM kelas join guru on nip=wali_kelas ORDER BY id_kelas ASC");
		return $hsl;
	}
	function guru() {
		$hsl=$this->db->query("SELECT * FROM guru order by nama_guru ASC");
		return $hsl;
	}
	function senin($id) {
		$hsl=$this->db->query("SELECT id_jadwal,nama_mapel,nama_guru,jam_msk_jadwal,jam_keluar_jadwal,id_kelas_jadwal,hari_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas_jadwal='$id' && hari_jadwal='1' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function seninm($id) {
		$hsl=$this->db->query("SELECT nama_kelas,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_guru_jadwal='$id' && hari_jadwal='1' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function seninp($id) {
		$hsl=$this->db->query("SELECT id_kelas,nama_guru,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas='$id' && hari_jadwal='1' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function selasa($id) {
		$hsl=$this->db->query("SELECT id_jadwal,nama_mapel,nama_guru,jam_msk_jadwal,jam_keluar_jadwal,id_kelas_jadwal,hari_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas_jadwal='$id' && hari_jadwal='2' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function selasam($id) {
		$hsl=$this->db->query("SELECT nama_kelas,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_guru_jadwal='$id' && hari_jadwal='2' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function selasap($id) {
		$hsl=$this->db->query("SELECT id_kelas,nama_guru,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas='$id' && hari_jadwal='2' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function rabu($id) {
		$hsl=$this->db->query("SELECT id_jadwal,nama_mapel,nama_guru,jam_msk_jadwal,jam_keluar_jadwal,id_kelas_jadwal,hari_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas_jadwal='$id' && hari_jadwal='3' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function rabum($id) {
		$hsl=$this->db->query("SELECT nama_kelas,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_guru_jadwal='$id' && hari_jadwal='3' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function rabup($id) {
		$hsl=$this->db->query("SELECT id_kelas,nama_guru,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas='$id' && hari_jadwal='3' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function kamis($id) {
		$hsl=$this->db->query("SELECT id_jadwal,nama_mapel,nama_guru,jam_msk_jadwal,jam_keluar_jadwal,id_kelas_jadwal,hari_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas_jadwal='$id' && hari_jadwal='4' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function kamism($id) {
		$hsl=$this->db->query("SELECT nama_kelas,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_guru_jadwal='$id' && hari_jadwal='4' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function kamisp($id) {
		$hsl=$this->db->query("SELECT id_kelas,nama_guru,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas='$id' && hari_jadwal='4' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function jumat($id) {
		$hsl=$this->db->query("SELECT id_jadwal,nama_mapel,nama_guru,jam_msk_jadwal,jam_keluar_jadwal,id_kelas_jadwal,hari_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas_jadwal='$id' && hari_jadwal='5' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function jumatm($id) {
		$hsl=$this->db->query("SELECT nama_kelas,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_guru_jadwal='$id' && hari_jadwal='5' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function jumatp($id) {
		$hsl=$this->db->query("SELECT id_kelas,nama_guru,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas='$id' && hari_jadwal='5' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function sabtu($id) {
		$hsl=$this->db->query("SELECT id_jadwal,nama_mapel,nama_guru,jam_msk_jadwal,jam_keluar_jadwal,id_kelas_jadwal,hari_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas_jadwal='$id' && hari_jadwal='6' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function sabtum($id) {
		$hsl=$this->db->query("SELECT nama_kelas,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_guru_jadwal='$id' && hari_jadwal='6' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function sabtup($id) {
		$hsl=$this->db->query("SELECT id_kelas,nama_guru,nama_mapel,jam_msk_jadwal,jam_keluar_jadwal FROM jadwal JOIN mapel ON id_mapel=id_mapel_jadwal JOIN kelas on id_kelas=id_kelas_jadwal JOIN guru ON nip=id_guru_jadwal where id_kelas='$id' && hari_jadwal='6' order by jam_msk_jadwal ASC");
		return $hsl;
	}
	function cek($id) {
		$hsl=$this->db->query("SELECT * FROM kelas join guru on nip=wali_kelas where id_kelas='$id'");
		return $hsl;
	}
	function cekjadwal($mapel,$guru,$hari,$msk,$keluar) {
		$hsl=$this->db->query("SELECT * FROM jadwal where id_guru_jadwal='$guru' && hari_jadwal='$hari' && jam_msk_jadwal='$msk' && jam_keluar_jadwal='$keluar'");
		return $hsl;
	}
	function simpan($id,$hari,$mapel,$msk,$keluar,$guru){
			$field=array(
			'id_kelas_jadwal'=>$id,
			'hari_jadwal'=>$hari,
			'id_mapel_jadwal'=>$mapel,
			'jam_msk_jadwal'=>$msk,
			'jam_keluar_jadwal'=>$keluar,
			'id_guru_jadwal'=>$guru
			);
		return $this->db->insert('jadwal',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from jadwal where id_jadwal='$id'");
		return $hsl;
	}
	function update($id,$nama,$ket){
		$hsl=$this->db->query("update kelas set nama_kelas='$nama', ket_kelas='$ket' where id_kelas='$id'");
		return $hsl;
	}
  
}
