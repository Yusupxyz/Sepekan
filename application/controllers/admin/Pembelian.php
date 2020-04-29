<?php
class Pembelian extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$x['sup']=$this->m_suplier->tampil_suplier();
		$this->load->view('admin/v_pembelian',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_beli',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
	if($this->session->userdata('akses')=='1'){
		$nofak=$this->input->post('nofak');
		$tgl=$this->input->post('tgl');
		$suplier=$this->input->post('suplier');
		$this->session->set_userdata('nofak',$nofak);
		$this->session->set_userdata('tglfak',$tgl);
		$this->session->set_userdata('suplier',$suplier);
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_barang->get_barang($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'price'    => $this->input->post('harpok'),
               'harga'    => $this->input->post('harjul'),
               'qty'      => $this->input->post('jumlah')
            );

		$this->cart->insert($data); 
		redirect('admin/pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_pembelian(){
	if($this->session->userdata('akses')=='1'){
		$nofak=$this->session->userdata('nofak');
		$tglfak=$this->session->userdata('tglfak');
		$suplier=$this->session->userdata('suplier');
		if(!empty($nofak) && !empty($tglfak) && !empty($suplier)){
			$beli_kode=$this->m_pembelian->get_kobel();
			$order_proses=$this->m_pembelian->simpan_pembelian($nofak,$tglfak,$suplier,$beli_kode);
			if($order_proses){
				$this->cart->destroy();
				$this->session->unset_userdata('nofak');
				$this->session->unset_userdata('tglfak');
				$this->session->unset_userdata('suplier');
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
				redirect('admin/pembelian');	
			}else{
				redirect('admin/pembelian');
			}
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Pembelian Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/pembelian');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }	
	}
}