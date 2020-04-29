<?php
class Retur extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_barang_masuk');
		$this->load->model('m_suplier');
		$this->load->model('m_penjualan');
		$this->load->model('m_retur');
	}
	function index(){
	if($this->session->userdata('akses')=='3'){
		$data['data']=$this->m_barang_masuk->tampil_barang_wretur();
		$data['retur']=$this->m_penjualan->tampil_retur();
				// echo $this->db->last_query();
		$this->load->view('gudang/v_retur',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='3'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_retur',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_retur(){
	if($this->session->userdata('akses')=='3'){
		$kobar=$this->input->post('kobar');
		$id=$this->input->post('kode');
		$jumlah=$this->input->post('jml_retur');
		$keterangan=$this->input->post('keterangan');
		$retur=$this->m_penjualan->simpan_retur($id,$jumlah,$keterangan);
		$stok=$this->m_barang->get_barang($kobar)->row()->barang_stok-$jumlah;
		if ($retur){
			$this->m_barang->update_stok($kobar,$stok);
		}
		redirect('gudang/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function edit_retur(){
		if($this->session->userdata('akses')=='3'){
			$kode=$this->input->post('kode');
			$kode_brg_msk=$this->input->post('kode_brg_msk');
			$jumlah=$this->input->post('jumlah');
			$this->m_retur->update_retur($kode,$jumlah,$kode_brg_msk);
							// echo $this->db->last_query();

			redirect('gudang/retur');
		}else{
			echo "Halaman tidak ditemukan";
		}
		}

	function batal_retur(){
	if($this->session->userdata('akses')=='3'){
		$kode=$this->input->post('kode');
		$jumlah=$this->input->post('jumlah');
		$kode_brg_msk=$this->input->post('kode_brg_msk');
		$this->m_retur->hapus_retur($kode,$jumlah,$kode_brg_msk);
		redirect('gudang/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

}