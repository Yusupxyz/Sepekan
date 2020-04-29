<?php
class Satuan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_satuan');
	}
	function index(){
	if($this->session->userdata('akses')=='3'){
		$data['data']=$this->m_satuan->tampil_satuan();
		$this->load->view('gudang/v_satuan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_satuan(){
	if($this->session->userdata('akses')=='3'){
		$kat=$this->input->post('satuan');
		$this->m_satuan->simpan_satuan($kat);
		redirect('gudang/satuan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_satuan(){
	if($this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$sat=$this->input->post('satuan');
		$this->m_satuan->update_satuan($kode,$sat);
		redirect('gudang/satuan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_satuan(){
	if($this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$this->m_satuan->hapus_satuan($kode);
		redirect('gudang/satuan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}