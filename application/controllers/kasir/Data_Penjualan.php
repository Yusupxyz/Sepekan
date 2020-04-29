<?php
class Data_penjualan extends CI_Controller{
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
	if($this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$this->load->view('kasir/v_laporan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	// function lap_data_penjualan(){
	// 	$x['data']=$this->m_laporan->get_data_penjualan();
	// 	$x['jml']=$this->m_laporan->get_total_penjualan();
	// 	$this->load->view('admin/laporan/v_lap_penjualan',$x);
	// }
	function lap_penjualan_pertanggal(){
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$x['tgl']=$tanggal;
		$this->load->view('kasir/laporan/v_pertanggal',$x);
	}
	function lap_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$x['bln']=$bulan;
		$this->load->view('kasir/laporan/v_perbulan',$x);
	}
	function lap_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$x['thn']=$tahun;
		$this->load->view('kasir/laporan/v_pertahun',$x);
	}

}