<?php
class M_barang_keluar extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang_keluar where id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang_keluar SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_stok='$stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang_keluar LEFT JOIN tbl_barang ON id_barang=barang_id ");
		return $hsl;
	}

	function tampil_barang_bydate(){
		$hsl=$this->db->query("SELECT * FROM `tbl_barang_keluar` WHERE tanggal_keluar=(select max(tanggal_keluar) from tbl_barang_keluar)");
		return $hsl;
	}

	function simpan_barang($koin,$id_barang,$stok,$jumlah){
		$hsl=$this->db->query("INSERT INTO tbl_barang_keluar (id,id_barang,stok_terkini,jumlah) VALUES ('$koin','$id_barang','$stok','$jumlah')");
		return $hsl;
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang_masuk where barang_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(id,6)) AS kd_max FROM tbl_barang_keluar");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "OUT".$kd;
	}

}