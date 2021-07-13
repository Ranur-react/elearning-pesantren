<?php
class M_pengumuman extends CI_Model{
    function datapengumuman() {
		$hsl=$this->db->query("SELECT * FROM pengumuman ORDER BY tgl_pengumuman DESC");
		return $hsl;
	}
	function cek($id) {
		$hsl=$this->db->query("SELECT * FROM pengumuman where id_pengumuman='$id'");
		return $hsl;
	}
	function simpan($judul,$ket,$gambar){
			$field=array(
			'judul_pengumuman'=>$judul,
			'ket_pengumuman'=>$ket,
			'foto_pengumuman'=>$gambar
			);
		return $this->db->insert('pengumuman',$field);
	}
	function simpan_noimg($judul,$ket){
			$field=array(
			'judul_pengumuman'=>$judul,
			'ket_pengumuman'=>$ket
			);
		return $this->db->insert('pengumuman',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from pengumuman where id_pengumuman='$id'");
		return $hsl;
	}
	function update($id,$judul,$ket,$gambar){
		$hsl=$this->db->query("update pengumuman set judul_pengumuman='$judul',ket_pengumuman='$ket',foto_pengumuman='$gambar' where id_pengumuman='$id'");
		return $hsl;
	}
	function update_noimg($id,$judul,$ket){
		$hsl=$this->db->query("update pengumuman set judul_pengumuman='$judul',ket_pengumuman='$ket' where id_pengumuman='$id'");
		return $hsl;
	}
  
}

