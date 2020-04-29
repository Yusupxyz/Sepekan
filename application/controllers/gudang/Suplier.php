<?php
class Suplier extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_suplier');
	}
	function index(){
	if($this->session->userdata('akses')=='3'){
		$data['data']=$this->m_suplier->tampil_suplier();
		$this->load->view('gudang/v_suplier',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_suplier(){
	if($this->session->userdata('akses')=='3'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->simpan_suplier($nama,$alamat,$notelp);
		redirect('gudang/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_suplier(){
	if($this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->update_suplier($kode,$nama,$alamat,$notelp);
		redirect('gudang/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_suplier(){
	if($this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$this->m_suplier->hapus_suplier($kode);
		redirect('gudang/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}