<?php
class Penjualan_kredit extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_penjualan');
		$this->load->model('m_antrian');
		$this->load->model('m_barang_keluar');
	}
	function index(){
	if($this->session->userdata('akses')=='5'){
		$data['data']=$this->m_barang->tampil_barang_stok();
		$this->load->view('sales/v_penjualan_kredit',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='5'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('sales/v_detail_barang_jual',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function add_to_cart(){
	if($this->session->userdata('akses')=='5'){
		$kobar=$this->input->post('kode_brg');
		$no=0;
		foreach($kobar as $selected){
			$produk=$this->m_barang->get_barang($selected);
			$i=$produk->row_array();
			$data[] = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['nama'],
               'harpok'   => $i['barang_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul')[$no]),
               'disc'     => '0',
               'qty'      => $this->input->post('qty')[$no],
               'amount'	  => str_replace(",", "", $this->input->post('harjul')[$no])
			);
			$no++;
		}

	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}

		redirect('sales/penjualan_kredit');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function remove(){
	if($this->session->userdata('akses')=='5'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('sales/penjualan_kredit');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_penjualan(){
	if($this->session->userdata('akses')=='5'){
		$total=$this->input->post('total');
		$jenis='kredit';
		
			$nofak=$this->m_penjualan->get_nofak();
			$this->session->set_userdata('nofak',$nofak);
			$order_proses=$this->m_penjualan->simpan_penjualan_sales($nofak,$total,$jenis);
			foreach ($this->cart->contents() as $item) {
				$data=array(
					'd_jual_nofak' 			=>	$nofak,
					'd_jual_barang_id'		=>	$item['id'],
					'd_jual_barang_nama'	=>	$item['name'],
					'd_jual_barang_satuan'	=>	$item['satuan'],
					'd_jual_barang_harpok'	=>	$item['harpok'],
					'd_jual_barang_harjul'	=>	$item['amount'],
					'd_jual_qty'			=>	$item['qty'],
					'd_jual_diskon'			=>	$item['disc'],
					'd_jual_total'			=>	$item['subtotal']
				);
				$koin=$this->m_barang_keluar->get_kobar();
				$stok_awal=$this->m_barang->get_barang($item['id'])->result()[0]->barang_stok+$item['qty'];
				$this->m_barang_keluar->simpan_barang($koin,$item['id'],$stok_awal-$item['qty'],$item['qty']);
			}
				$no_antrian=$this->m_antrian->get_no_antrian($jenis)->row()->count+1;
				$this->m_antrian->simpan_antrian($no_antrian,$nofak);
			if($order_proses){
				$this->cart->destroy();
				$data['no_antrian']=$no_antrian;
				$data['jenis']=$jenis;

				$this->session->set_userdata('no_antrian',$no_antrian);
				$this->session->set_userdata('jenis',$jenis);
				redirect('sales/detail_kredit/'.$nofak.'/'.$total);
			}else{
				redirect('sales/penjualan_kredit');
			}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function delete($nofak){
		if($this->session->userdata('akses')=='5'){
			$this->m_penjualan->hapus($nofak);
			$barang=$this->m_barang_keluar->tampil_barang_bydate()->result();
			var_dump($barang);
			foreach ($barang as $key => $value) {
				$this->m_barang->reverse_stok($value->id_barang,$value->stok_terkini+$value->jumlah);
				$this->m_barang_keluar->hapus_barang($value->id);
			}
		}else{
			echo "Halaman tidak ditemukan";
		}
		}


}