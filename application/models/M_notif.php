<?php
class M_notif extends CI_Model{
	function get_notif($kode,$jatuh_tempo){
		$hsl=$this->db->query("SELECT * FROM tbl_notif_jatuh_tempo where kode_kredit='$kode' AND jatuh_tempo='$jatuh_tempo'");
		return $hsl;
	}
	function simpan_notif($kode,$jatuh_tempo){
		$hsl=$this->db->query("INSERT INTO tbl_notif_jatuh_tempo(kode_kredit,jatuh_tempo) VALUES ('$kode','$jatuh_tempo')");
		return $hsl;
	}
	function get_all_notif(){
		$hsl=$this->db->query("SELECT * FROM tbl_notif_jatuh_tempo LEFT JOIN tbl_detail_kredit ON tbl_notif_jatuh_tempo.kode_kredit=tbl_detail_kredit.kode_kredit");
		return $hsl;
	}
	function update_status($id,$status){
		$hsl=$this->db->query("UPDATE tbl_notif_jatuh_tempo SET status_pesan='$status' WHERE id='$id'");
		return $hsl;
	}
}