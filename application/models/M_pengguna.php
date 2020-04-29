<?php
class M_pengguna extends CI_Model{
	function get_pengguna(){
		$hsl=$this->db->query("SELECT * FROM tbl_user");
		return $hsl;
	}
	function simpan_pengguna($nama,$username,$password,$level){
		$hsl=$this->db->query("INSERT INTO tbl_user(user_nama,user_username,user_password,user_level,user_status) VALUES ('$nama','$username',md5('$password'),'$level','1')");
		return $hsl;
	}
	function update_pengguna_nopass($kode,$nama,$username,$level){
		$hsl=$this->db->query("UPDATE tbl_user SET user_nama='$nama',user_username='$username',user_level='$level' WHERE user_id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode,$nama,$username,$password,$level){
		$hsl=$this->db->query("UPDATE tbl_user SET user_nama='$nama',user_username='$username',user_password=md5('$password'),user_level='$level' WHERE user_id='$kode'");
		return $hsl;
	}
	function update_status($kode,$status){
		$hsl=$this->db->query("UPDATE tbl_user SET user_status='$status' WHERE user_id='$kode'");
		return $hsl;
	}
	function hapus($kode){
		$hsl=$this->db->query("DELETE from tbl_user WHERE user_id='$kode'");
		return $hsl;
	}
}