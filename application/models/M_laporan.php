<?php
class M_laporan extends CI_Model{
	function get_stok_barang(){
		$hsl=$this->db->query("SELECT kategori_id,kategori_nama,barang_nama,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	function get_data_barang(){
		$hsl=$this->db->query("SELECT *, kategori_id,barang_id,kategori_nama,barang_nama,barang_satuan_id,barang_harjul,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id LEFT JOIN tbl_satuan ON barang_satuan_id=id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	function get_data_barang_masuk($bulan){
		$hsl=$this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_masuk ON barang_id=id_barang WHERE DATE_FORMAT(tanggal_input,'%M %Y')='$bulan' ");
		return $hsl;
	}

	function get_data_barang_keluar($bulan){
		$hsl=$this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_keluar ON barang_id=id_barang WHERE DATE_FORMAT(tanggal_keluar,'%M %Y')='$bulan' ");
		return $hsl;
	}
	function get_data_penjualan($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_data_penjualan_kredit($bulan){
		$hsl=$this->db->query("SELECT *,jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal FROM tbl_jual JOIN tbl_detail_kredit ON jual_nofak=nofak_jual where jual_keterangan='kredit' AND DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'  ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_data_angsuran($bulan){
		$hsl=$this->db->query("SELECT * FROM tbl_detail_kredit JOIN tbl_angsuran ON tbl_detail_kredit.kode_kredit=tbl_angsuran.kode_kredit LEFT JOIN tbl_jual ON jual_nofak=nofak_jual WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY tbl_detail_kredit.kode_kredit DESC");
		return $hsl;
	}
	function get_total_penjualan($ket,$bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,sum(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak where YEAR(jual_tanggal)='$tahun' AND jual_keterangan='$ket' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_data_jual_pertanggal($tanggal){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE(jual_tanggal)='$tanggal' AND jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_data__total_jual_pertanggal($tanggal){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE(jual_tanggal)='$tanggal' AND jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_bulan_jual($ket){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual WHERE jual_keterangan='$ket'");
		return $hsl;
	}
	function get_bulan_bm(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal_input,'%M %Y') AS bulan FROM tbl_barang_masuk");
		return $hsl;
	}
	function get_bulan_bk(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal_keluar,'%M %Y') AS bulan FROM tbl_barang_keluar");
		return $hsl;
	}
	function get_tahun_jual(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(jual_tanggal) AS tahun FROM tbl_jual");
		return $hsl;
	}
	function get_jual_perbulan($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' AND jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_total_jual_perbulan($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' AND jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_jual_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE YEAR(jual_tanggal)='$tahun' AND jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_total_jual_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE YEAR(jual_tanggal)='$tahun' AND jual_keterangan='cash' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	
}