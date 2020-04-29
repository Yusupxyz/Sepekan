<?php
class M_grafik extends CI_Model{
	function statistik_stok(){
        $query = $this->db->query("SELECT kategori_nama,SUM(barang_stok) AS tot_stok FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id GROUP BY kategori_nama");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function graf_penjualan_perbulan($bulan){
        $query = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%d') AS tanggal,SUM(jual_total) total FROM tbl_jual WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' GROUP BY DAY(jual_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function graf_penjualan_pertahun($tahun){
        $query = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M') AS bulan,SUM(jual_total) total FROM tbl_jual WHERE YEAR(jual_tanggal)='$tahun' GROUP BY MONTH(jual_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}