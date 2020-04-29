<?php
class Angsuran extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_detail_kredit');
		$this->load->model('m_angsuran');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_detail_kredit->tampil_kredit();
		$this->load->view('admin/v_angsuran',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

}