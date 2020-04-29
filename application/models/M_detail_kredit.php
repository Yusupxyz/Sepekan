<?php
class M_detail_kredit extends CI_Model{


	function update_kredit($kode_faktur,$sisa,$jatuh_tempo,$status){
		$hsl=$this->db->query("UPDATE tbl_detail_kredit SET sisa='$sisa',jatuh_tempo='$jatuh_tempo',status='$status' WHERE nofak_jual='$kode_faktur'");
		return $hsl;
	}

	function tampil_kredit(){
		$hsl=$this->db->query("SELECT *, tbl_detail_kredit.kode_kredit as 'kk', count(tbl_angsuran.kode_angsuran) as 'count' FROM `tbl_detail_kredit`  LEFT JOIN tbl_jual ON tbl_detail_kredit.nofak_jual=tbl_jual.jual_nofak 
		LEFT JOIN tbl_angsuran ON tbl_detail_kredit.kode_kredit=tbl_angsuran.kode_kredit GROUP BY tbl_detail_kredit.kode_kredit");
		return $hsl;
	}

	function tampil_kredit_status($status){
		$hsl=$this->db->query("SELECT *, tbl_detail_kredit.kode_kredit as 'kk',  count(tbl_angsuran.kode_angsuran) as 'count' FROM `tbl_detail_kredit`  LEFT JOIN tbl_jual ON tbl_detail_kredit.nofak_jual=tbl_jual.jual_nofak 
		LEFT JOIN tbl_angsuran ON tbl_detail_kredit.kode_kredit=tbl_angsuran.kode_kredit WHERE status='$status' GROUP BY tbl_detail_kredit.kode_kredit");
		return $hsl;
	}

	function tampil_kredit_kode($kode){
		$hsl=$this->db->query("SELECT * FROM `tbl_detail_kredit`  WHERE tbl_detail_kredit.kode_kredit='$kode'");
		return $hsl;
	}

	function cek_nik($nik){
		$hsl=$this->db->query("SELECT status FROM `tbl_detail_kredit`  WHERE tbl_detail_kredit.nik='$nik'");
		return $hsl;
	}

	function simpan_detail_kredit($kokre,$nama,$alamat,$ktp,$nik,$no_wa,$kode_faktur,$dp,$lama_angsuran,$sisa,$keterangan,$jatuh_tempo,$perbulan){
		$hsl=$this->db->query("INSERT INTO tbl_detail_kredit (kode_kredit,nama_pelanggan,nik,alamat,foto_ktp,no_wa_hp,nofak_jual,uang_muka,lama_angsuran,sisa,jatuh_tempo,keterangan,perbulan)
		 VALUES ('$kokre','$nama','$nik','$alamat','$ktp','$no_wa','$kode_faktur','$dp','$lama_angsuran','$sisa','$jatuh_tempo','$keterangan','$perbulan')");
		return $hsl;
	}

	function cek_jatuh_tempo($int){
		$hsl=$this->db->query("SELECT * FROM `tbl_detail_kredit` WHERE jatuh_tempo < DATE_SUB(now(), INTERVAL $int DAY)");
		return $hsl;
	}

	function get_kokre(){
		$q = $this->db->query("SELECT MAX(RIGHT(kode_kredit,6)) AS kd_max FROM tbl_detail_kredit");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "KK".$kd;
	}

}