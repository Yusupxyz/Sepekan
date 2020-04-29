<?php
class M_setting extends CI_Model{
	function get_setting(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting");
		return $hsl;
	}
	function update_setting($kode,$set){
		$hsl=$this->db->query("UPDATE tbl_setting SET setting='$set' WHERE id='$kode'");
		return $hsl;
	}
	function get_setting_kredit(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting WHERE id=1");
		return $hsl;
	}

	function get_setting_dp(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting WHERE id=4");
		return $hsl;
	}
	function get_setting_api(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting WHERE id=2");
		return $hsl;
	}
	function get_setting_waktu(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting WHERE id=3");
		return $hsl;
	}
	function get_setting_stok(){
		$hsl=$this->db->query("SELECT * FROM tbl_setting WHERE id=4");
		return $hsl;
	}
}