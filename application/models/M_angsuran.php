<?php
class M_angsuran extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_angsuran($kode,$wa){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_detail_kredit SET No_wa_hp='$wa' WHERE kode_kredit='$kode'");
		return $hsl;
	}

	function tampil_angsuran(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id LEFT JOIN tbl_suplier ON suplier_id=id_suplier");
		return $hsl;
	}

	function tampil_barang_stok(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id LEFT JOIN tbl_suplier ON suplier_id=id_suplier where barang_stok!=0");
		return $hsl;
	}

	function simpan_angsuran($kokang,$tgl,$kode_faktur,$angke,$terima2,$kembalian2){
		$hsl=$this->db->query("INSERT INTO tbl_angsuran (kode_angsuran,tanggal_angsuran,kode_kredit,angsuran_ke,terima,kembalian)
		 VALUES ('$kokang','$tgl','$kode_faktur','$angke','$terima2','$kembalian2')");
		return $hsl;
	}

	function get_angsuran_ke($kode){
		$hsl=$this->db->query("SELECT count(*) as 'count' FROM tbl_angsuran where kode_kredit='$kode'");
		return $hsl;
	}

	function cetak_faktur_angsuran($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_angsuran LEFT JOIN tbl_detail_kredit ON tbl_angsuran.kode_Kredit=tbl_detail_kredit.kode_kredit
		LEFT JOIN tbl_jual ON tbl_jual.jual_nofak=tbl_detail_kredit.nofak_jual where kode_angsuran='$kode'");
		return $hsl;
	}

	function cetak_lunas($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_detail_kredit LEFT JOIN tbl_jual ON tbl_detail_kredit.nofak_jual=tbl_jual.jual_nofak where kode_kredit='$kode'");
		return $hsl;
	}

	function get_kang(){
		$q = $this->db->query("SELECT MAX(RIGHT(kode_angsuran,6)) AS kd_max FROM tbl_angsuran");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "AG".$kd;
	}

}