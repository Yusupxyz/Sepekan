<?php
class M_barang extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$min,$suplier){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan_id='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_minimal='$min',id_suplier='$suplier',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function update_stok($kobar,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_stok='$stok',barang_tgl_last_update=NOW() WHERE barang_id='$kobar'");
		return $hsl;
	}

	function reverse_stok($kobar,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_stok='$stok',barang_tgl_last_update=NOW() WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id LEFT JOIN tbl_suplier ON suplier_id=id_suplier LEFT JOIN tbl_satuan ON tbl_satuan.id=barang_satuan_id");
		return $hsl;
	}

	function tampil_barang_stok(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id LEFT JOIN tbl_suplier ON suplier_id=id_suplier  LEFT JOIN tbl_satuan ON tbl_satuan.id=barang_satuan_id where barang_stok!=0");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$min,$stok,$suplier){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan_id,barang_harpok,barang_harjul,barang_minimal,barang_stok,barang_kategori_id,id_suplier,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$min','$stok','$kat','$suplier','$user_id')");
		return $hsl;
	}

	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang LEFT JOIN tbl_satuan ON tbl_satuan.id=barang_satuan_id where barang_id='$kobar'");
		return $hsl;
	}

	function cek_stok($batas,$id){
		$hsl=$this->db->query("SELECT * FROM tbl_barang LEFT JOIN tbl_satuan ON tbl_satuan.id=barang_satuan_id  where barang_stok<=$batas and barang_id='$id'");
		return $hsl;
	}

	function get_min_stok(){
		$hsl=$this->db->query("SELECT * FROM `tbl_barang` where barang_stok < barang_minimal");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

}