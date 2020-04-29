<?php
class Barang_keluar extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_barang_masuk');
		$this->load->model('m_barang_keluar');
		$this->load->library('barcode');
	}

	function index(){
	if($this->session->userdata('akses')=='3'){
		$data['data']=$this->m_barang_keluar->tampil_barang();
		$data['bar']=$this->m_barang->tampil_barang();
		$this->load->view('gudang/v_barang_keluar',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function tambah_barang(){
	if($this->session->userdata('akses')=='3'){
		$koin=$this->m_barang_masuk->get_kobar();
		$kobar=$this->input->post('id_barang');
		$stok=$this->m_barang->get_barang($kobar)->result_array()[0]['barang_stok'];
		$jumlah=$this->input->post('jumlah');
		$this->m_barang_masuk->simpan_barang($koin,$kobar,$jumlah,$stok);
		$this->m_barang->update_stok($kobar,$jumlah+$stok);
		redirect('gudang/barang_masuk');
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
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul);
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