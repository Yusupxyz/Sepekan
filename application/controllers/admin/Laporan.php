<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual('cash');
		$data['jual_kredit_bln']=$this->m_laporan->get_bulan_jual('kredit');
		$data['bm_bln']=$this->m_laporan->get_bulan_bm();
		$data['bk_bln']=$this->m_laporan->get_bulan_bk();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$this->load->view('admin/v_laporan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function lap_stok_barang(){
		$x['data']=$this->m_laporan->get_stok_barang();
		$this->load->view('admin/laporan/v_lap_stok_barang',$x);
	}
	function lap_data_barang(){
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_lap_barang',$x);
	}
	function lap_data_barang_masuk($bulan){
		$bulan=str_replace('%20',' ',$bulan);
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_barang_masuk($bulan);
		$this->load->view('admin/laporan/v_lap_barang_masuk',$x);
	}
	function lap_data_barang_keluar($bulan){
		$bulan=str_replace('%20',' ',$bulan);
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_barang_keluar($bulan);
		$this->load->view('admin/laporan/v_lap_barang_keluar',$x);
	}
	function lap_data_penjualan($bulan){
		$bulan=str_replace('%20',' ',$bulan);
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_penjualan',$x);
	}
	function lap_data_penjualan_kredit($bulan){
		$bulan=str_replace('%20',' ',$bulan);
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_penjualan_kredit($bulan);
		$this->load->view('admin/laporan/v_lap_penjualan_kredit',$x);
	}
	function lap_angsuran($bulan){
		$bulan=str_replace('%20',' ',$bulan);
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_angsuran($bulan);
		// echo $this->db->last_query();
		$this->load->view('admin/laporan/v_lap_angsuran',$x);
	}
	function lap_penjualan_pertanggal(){
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}
	function lap_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan',$x);
	}
	function lap_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$this->load->view('admin/laporan/v_lap_jual_pertahun',$x);
	}
	function lap_laba_rugi(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan);
		$this->load->view('admin/laporan/v_lap_laba_rugi',$x);
	}

	function data_barang(){
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_tabel_barang',$x);
	}

	function data_barang_masuk(){
		$tahun=$this->input->post('bln');
		$x['bulan']=$tahun;
		$x['data']=$this->m_laporan->get_data_barang_masuk($tahun);
		$this->load->view('admin/laporan/v_tabel_barang_masuk',$x);
	}

	function data_barang_keluar(){
		$bulan=$this->input->post('bln');
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_barang_keluar($bulan);
		$this->load->view('admin/laporan/v_tabel_barang_keluar',$x);
	}

	function data_penjualan(){
		$bulan=$this->input->post('bln');
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_tabel_penjualan',$x);
	}
	function data_penjualan_kredit(){
		$bulan=$this->input->post('bln');
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_penjualan_kredit($bulan);
				// echo $this->db->last_query();
		$this->load->view('admin/laporan/v_tabel_penjualan_kredit',$x);
	}
	function data_angsuran(){
		$bulan=$this->input->post('bln');
		$x['bulan']=$bulan;
		$x['data']=$this->m_laporan->get_data_angsuran($bulan);
		$this->load->view('admin/laporan/v_tabel_angsuran',$x);
	}
}