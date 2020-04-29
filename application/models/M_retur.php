<?php
class M_retur extends CI_Model{

	function hapus_retur($kode,$jumlah,$kode_brg_msk){
		$hsl=$this->db->query("DELETE FROM tbl_retur where retur_id='$kode'");
		if ($hsl){
			$hsl=$this->db->query("UPDATE tbl_barang_masuk set jumlah=jumlah+$jumlah where id='$kode_brg_msk'");
		}
		return $hsl;
	}

	function update_retur($kode,$jumlah,$kode_brg_msk){
		$hsl=$this->db->query("UPDATE tbl_retur set retur_jumlah='$jumlah' where retur_id='$kode'");
		if ($hsl){
			$hsl=$this->db->query("UPDATE tbl_barang_masuk set jumlah=jumlah+$jumlah where id='$kode_brg_msk'");
		}
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