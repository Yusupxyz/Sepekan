<?php
class Beranda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
		};
		$this->load->model('m_detail_kredit');
		$this->load->model('m_barang');
		$this->load->model('m_setting');
	}
	
	function index(){
		if ($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4'){
			$batas=$this->m_barang->get_min_stok()->result();
			// echo $this->db->last_query();
			foreach ($batas as $key => $value) {
				$data['stok'][]=$this->m_barang->cek_stok($value->barang_minimal,$value->barang_id)->result();
			}
			// print("<pre>".print_r($data['stok'])."</pre>");
		}
		if ($this->session->userdata('akses')!='3' || $this->session->userdata('akses')!='5'){
			$int=$this->m_setting->get_setting_waktu()->row()->setting;
			$data['jatuh_tempo']=$this->m_detail_kredit->cek_jatuh_tempo('-'.$int);
			// print("<pre>".var_dump($data['jatuh_tempo']->result())."</pre>");
		}
		$this->load->view('admin/v_index',$data);
	}
}