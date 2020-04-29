<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_satuan');
		$this->load->model('m_barang_masuk');
		$this->load->model('m_suplier');
		$this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='3'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['sat']=$this->m_satuan->tampil_satuan();
		$data['sup']=$this->m_suplier->tampil_suplier();
		$this->load->view('gudang/v_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function tambah_barang(){
	if($this->session->userdata('akses')=='3'){
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$min=$this->input->post('min');
		$stok="0";
		$suplier=$this->input->post('suplier');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$min,$stok,$suplier);
		redirect('gudang/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_barang(){
	if($this->session->userdata('akses')=='3'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$min=$this->input->post('min');
		$suplier=$this->input->post('suplier');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$min,$suplier);
		redirect('gudang/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	
	function hapus_barang(){
	if($this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('gudang/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}