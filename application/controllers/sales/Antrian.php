<?php
class Antrian extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_antrian');
		$this->load->model('m_barang_keluar');
		$this->load->model('m_barang');
		$this->load->model('m_penjualan');
	}
	function index($param=null){
	if($this->session->userdata('akses')=='5'){
		$data['data']=$this->m_antrian->tampil_antrian_sales('cash');
		foreach ($data['data']->result_array() as $a) {
			$data['detail_barang'][]=$this->m_antrian->tampil_antrian($a['no_antrian'],'cash')->result_array();
		}
		// var_dump($data['detail_barang']);
		$this->load->view('sales/v_antrian',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function kredit($param=null){
		if($this->session->userdata('akses')=='5'){
			$data['data']=$this->m_antrian->tampil_antrian_sales('kredit');
			foreach ($data['data']->result_array() as $a) {
				$data['detail_barang'][]=$this->m_antrian->tampil_antrian($a['no_antrian'],'kredit')->result_array();
			}
			// var_dump($data['detail_barang']);
			$this->load->view('sales/v_antrian_kredit',$data);
		}else{
			echo "Halaman tidak ditemukan";
		}
		}
	function tambah_satuan(){
	if($this->session->userdata('akses')=='5'){
		$kat=$this->input->post('satuan');
		$this->m_satuan->simpan_satuan($kat);
		redirect('gudang/satuan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_satuan(){
	if($this->session->userdata('akses')=='5'){
		$kode=$this->input->post('kode');
		$sat=$this->input->post('satuan');
		$this->m_satuan->update_satuan($kode,$sat);
		redirect('gudang/satuan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function batal(){
	if($this->session->userdata('akses')=='5'){
		$kode=$this->input->post('kode');
		$nofak=$this->input->post('nofak');
		$batal=$this->m_antrian->batal($kode);
		if ($batal){
			$this->m_penjualan->hapus($nofak);
			$barang=$this->m_barang_keluar->tampil_barang_bydate()->result();
			foreach ($barang as $key => $value) {
				$this->m_barang->reverse_stok($value->id_barang,$value->stok_terkini+$value->jumlah);
				$this->m_barang_keluar->hapus_barang($value->id);
			}
		}
		echo $this->session->set_flashdata('msg','<label class="label label-info">Transaksi berhasil dibatalkan.</label>');
		if ($this->input->post('jenis')=='cash'){
			redirect('sales/antrian');
		}else{
			redirect('sales/antrian/kredit');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}