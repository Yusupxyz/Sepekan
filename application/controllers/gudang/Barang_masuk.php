<?php
class Barang_masuk extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_barang_masuk');
		$this->load->library('barcode');
	}

	function index(){
	if($this->session->userdata('akses')=='3'){
		$data['data']=$this->m_barang_masuk->tampil_barang();
		$data['bar']=$this->m_barang->tampil_barang();
		$this->load->view('gudang/v_barang_masuk',$data);
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
		$faktur=$this->input->post('faktur');
		$this->m_barang_masuk->simpan_barang($koin,$kobar,$jumlah,$stok+$jumlah,$faktur);
		$this->m_barang->update_stok($kobar,$jumlah+$stok);
		redirect('gudang/barang_masuk');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function ubah_faktur(){
	if($this->session->userdata('akses')=='3'){
		$kobar=$this->input->post('kobar');
		$faktur=$this->input->post('faktur');
		$this->m_barang_masuk->update_faktur($kobar,$faktur);
		echo $this->session->set_flashdata('msg','<label class="label label-success">No. Faktur berhasil diubah.</label>');
		redirect('gudang/barang_masuk');
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