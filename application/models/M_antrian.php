<?php
class M_antrian extends CI_Model{

	function tampil_antrian($no_antrian,$jenis){
		// echo "SELECT * from tbl_antrian LEFT JOIN tbl_jual ON tbl_jual.jual_nofak=tbl_antrian.no_faktur RIGHT JOIN tbl_detail_jual ON tbl_jual.jual_nofak=tbl_detail_jual.d_jual_nofak WHERE tanggal=CURDATE() AND no_antrian='$no_antrian' AND status='0'";
		$hsl=$this->db->query("SELECT * from tbl_antrian LEFT JOIN tbl_jual ON tbl_jual.jual_nofak=tbl_antrian.no_faktur RIGHT JOIN 
		tbl_detail_jual ON tbl_jual.jual_nofak=tbl_detail_jual.d_jual_nofak LEFT JOIN tbl_detail_kredit ON tbl_jual.jual_nofak=tbl_detail_kredit.nofak_jual
		 WHERE tanggal=CURDATE() AND no_antrian='$no_antrian'  AND tbl_jual.jual_keterangan='$jenis'");
		return $hsl;
	}

	function tampil_antrian_sales($jenis){
		// echo "SELECT * from tbl_antrian LEFT JOIN tbl_jual ON tbl_jual.jual_nofak=tbl_antrian.no_faktur RIGHT JOIN tbl_detail_jual ON tbl_jual.jual_nofak=tbl_detail_jual.d_jual_nofak WHERE tanggal=CURDATE() AND no_antrian='$no_antrian' AND status='0'";
		$hsl=$this->db->query("SELECT * from tbl_antrian LEFT JOIN tbl_jual ON tbl_jual.jual_nofak=tbl_antrian.no_faktur 
		 WHERE tanggal=CURDATE() AND tbl_jual.jual_keterangan='$jenis' ORDER BY no_antrian DESC");
		return $hsl;
	}

	function get_no_antrian($jenis){
		$hsl=$this->db->query("SELECT max(no_antrian) as 'count' FROM `tbl_antrian` LEFT JOIN tbl_jual ON tbl_jual.jual_nofak=tbl_antrian.no_faktur WHERE tanggal=CURDATE() AND tbl_jual.jual_keterangan='$jenis'");
		return $hsl;
	}

	function simpan_antrian($no_antrian,$nofak){
		$hsl=$this->db->query("INSERT INTO tbl_antrian(no_antrian,no_faktur,tanggal) VALUES ('$no_antrian','$nofak',now())");
		return $hsl;
	}

	function update_status($nofak){
		$hsl=$this->db->query("UPDATE tbl_antrian set status='1' where no_faktur='$nofak'");
		return $hsl;
	}

	function update_antrian($nofak,$no_antrian){
		$hsl=$this->db->query("UPDATE tbl_antrian set no_antrian='$no_antrian' where no_faktur='$nofak'");
		return $hsl;
	}

	function batal($kode){
		$hsl=$this->db->query("DELETE FROM tbl_antrian where id='$kode'");
		return $hsl;
	}

}