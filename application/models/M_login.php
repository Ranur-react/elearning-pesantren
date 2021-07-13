<?php
class M_login extends CI_Model{
    function cekadmin($username,$password,$level){
        $hasil=$this->db->query("SELECT * FROM user WHERE username='$username' AND password=md5('$password') AND level_user='$level'");
        return $hasil;
    }
	function cekguru($username,$password,$level){
        $hasil=$this->db->query("SELECT * FROM user JOIN guru ON nip=username WHERE username='$username' AND password=md5('$password') AND level_user='$level'");
        return $hasil;
    }
	function ceksiswa($username,$password,$level){
        $hasil=$this->db->query("SELECT * FROM user JOIN siswa ON nis=username WHERE username='$username' AND password=md5('$password') AND level_user='$level'");
        return $hasil;
    }
  
}
