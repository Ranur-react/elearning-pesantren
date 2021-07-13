<?php
class M_tamu extends CI_Model{
    function datatamu() {
		$hsl=$this->db->query("SELECT * FROM btamu ORDER BY nama_tamu ASC");
		return $hsl;
	}
	function cek($id) {
		$hsl=$this->db->query("SELECT * FROM btamu where id_tamu='$id'");
		return $hsl;
	}
	function simpan($nama,$email,$saran){
			$field=array(
			'nama_tamu'=>$nama,
			'email_tamu'=>$email,
			'saran_tamu'=>$saran
			);
		return $this->db->insert('btamu',$field);
	}
	function hapus($id){
		$hsl=$this->db->query("delete from btamu where id_tamu='$id'");
		return $hsl;
	}
	function update($id,$nama,$email,$saran){
		$hsl=$this->db->query("update btamu set nama_tamu='$nama',email_tamu='$email',saran_tamu='$saran' where id_tamu='$id'");
		return $hsl;
	}
  
}
