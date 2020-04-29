<?php
class M_barang_masuk extends CI_Model{


	function update_faktur($kobar,$faktur){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang_masuk SET faktur_pembelian='$faktur' WHERE id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang_masuk LEFT JOIN tbl_barang ON id_barang=barang_id LEFT JOIN tbl_user ON tbl_barang_masuk.user_id=tbl_user.user_id");
		return $hsl;
	}

	function tampil_barang_wretur(){
		$hsl=$this->db->query("SELECT *, sum(retur_jumlah) as 'retur' FROM `tbl_barang_masuk` LEFT JOIN tbl_retur ON tbl_barang_masuk.id=tbl_retur.retur_barang_masuk_id LEFT JOIN tbl_barang ON id_barang=barang_id LEFT JOIN tbl_user ON tbl_barang_masuk.user_id=tbl_user.user_id GROUP BY tbl_barang_masuk.id
		");
		return $hsl;
	}


	function simpan_barang($koin,$kobar,$jumlah,$stok,$faktur){
		$user_id=$this->session->userdata('idadmin');
		// echo "INSERT INTO tbl_barang_masuk (id,stok_terkini,jumlah,id_barang,faktur_pembelian,user_id) VALUES ('$koin','$stok','$jumlah','$kobar','$faktur','$user_id')";
		$hsl=$this->db->query("INSERT INTO tbl_barang_masuk (id,stok_terkini,jumlah,id_barang,faktur_pembelian,user_id) VALUES ('$koin','$stok','$jumlah','$kobar','$faktur','$user_id')");
		return $hsl;
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang_masuk where barang_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(id,6)) AS kd_max FROM tbl_barang_masuk");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "IN".$kd;
	}

}