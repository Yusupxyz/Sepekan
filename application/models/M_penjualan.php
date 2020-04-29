<?php
class M_penjualan extends CI_Model{

	function hapus_retur($kode){
		$hsl=$this->db->query("DELETE FROM tbl_retur WHERE retur_id='$kode'");
		return $hsl;
	}

	function hapus($kode){
		$hsl=$this->db->query("DELETE FROM tbl_detail_jual WHERE d_jual_nofak='$kode'");
		$hsl=$this->db->query("DELETE FROM tbl_jual WHERE jual_nofak='$kode'");
		return $hsl;
	}

	function tampil_retur(){
		$hsl=$this->db->query("SELECT faktur_pembelian, retur_barang_masuk_id, retur_id,DATE_FORMAT(retur_tanggal,'%d/%m/%Y') AS retur_tanggal,retur_jumlah,
		(tbl_barang.barang_harpok*retur_jumlah) AS retur_subtotal,retur_keterangan FROM tbl_retur LEFT JOIN tbl_barang_masuk 
		ON tbl_retur.retur_barang_masuk_id=tbl_barang_masuk.id LEFT JOIN tbl_barang ON tbl_barang.barang_id=tbl_barang_masuk.id_barang ORDER BY retur_id DESC");
		return $hsl;
	}

	function tampil_kredit(){
		$hsl=$this->db->query("SELECT * FROM tbl_jual where jual_keterangan='kredit'");
		return $hsl;
	}

	function simpan_retur($id,$jumlah,$keterangan){
		$hsl=$this->db->query("INSERT INTO tbl_retur(retur_barang_masuk_id,retur_jumlah,retur_keterangan) VALUES ('$id','$jumlah','$keterangan')");
		return $hsl;
	}

	function simpan_penjualan($nofak,$total,$jml_uang,$kembalian,$jenis){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,jual_user_id,jual_keterangan) VALUES ('$nofak','$total','$jml_uang','$kembalian','$idadmin','$jenis')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_barang_id'		=>	$item['id'],
				'd_jual_barang_nama'	=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}

	function simpan_penjualan_sales($nofak,$total,$jenis){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,jual_user_id,jual_keterangan) VALUES ('$nofak','$total','0','0','$idadmin','$jenis')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_barang_id'		=>	$item['id'],
				'd_jual_barang_nama'	=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}

	function update_penjualan($nofak,$jml_uang,$kembalian){
		$hsl=$this->db->query("UPDATE tbl_jual set jual_jml_uang='$jml_uang',jual_kembalian='$kembalian' where jual_nofak='$nofak'");
		return $hsl;
	}

	function update_penjualan_kredit($nofak,$jml_uang,$kembalian){
		$hsl=$this->db->query("UPDATE tbl_detail_kredit set jml_uang='$jml_uang',jml_kembalian='$kembalian' where nofak_jual='$nofak'");
		return $hsl;
	}

	function update_keterangan($nofak,$ket){
		$hsl=$this->db->query("UPDATE tbl_jual set jual_keterangan='$ket' where jual_nofak='$nofak'");
		return $hsl;
	}

	function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(jual_nofak,6)) AS kd_max FROM tbl_jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return date('dmy').$kd;
	}

	function cetak_faktur(){
		$nofak=$this->session->userdata('nofak');
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,jual_kembalian,jual_keterangan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
		return $hsl;
	}

	function cetak_faktur_kredit(){
		$nofak=$this->session->userdata('nofak');
		$hsl=$this->db->query("SELECT *, DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal FROM tbl_jual LEFT JOIN tbl_detail_kredit ON jual_nofak=nofak_jual LEFT JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
		return $hsl;
	}
	
}