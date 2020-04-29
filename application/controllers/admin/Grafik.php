<?php
class Grafik extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
		$this->load->model('m_grafik');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='4'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$this->load->view('admin/v_grafik',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function graf_stok_barang(){
		$x['report']=$this->m_grafik->statistik_stok();
		$this->load->view('admin/grafik/v_graf_stok_barang',$x);
	}
	
	
	function graf_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['report']=$this->m_grafik->graf_penjualan_perbulan($bulan);
		$x['bln']=$bulan;
		$this->load->view('admin/grafik/v_graf_penjualan_perbulan',$x);
	}
	function graf_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['report']=$this->m_grafik->graf_penjualan_pertahun($tahun);
		$x['thn']=$tahun;
		$this->load->view('admin/grafik/v_graf_penjualan_pertahun',$x);
	}
	
}