<?php
class M_satuan extends CI_Model{

	function hapus_satuan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_satuan where id='$kode'");
		return $hsl;
	}

	function update_satuan($kode,$sat){
		$hsl=$this->db->query("UPDATE tbl_satuan set nama='$sat' where id='$kode'");
		return $hsl;
	}

	function tampil_satuan(){
		$hsl=$this->db->query("SELECT * from tbl_satuan order by nama asc");
		return $hsl;
	}

	function simpan_satuan($sat){
		$hsl=$this->db->query("INSERT INTO tbl_satuan(nama) VALUES ('$sat')");
		return $hsl;
	}

}