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
		$this->load->model('m_antrian');
		$this->load->model('m_penjualan');
		$this->load->model('m_barang_keluar');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		if ($this->input->post("antrian")){
			$data['data']=$this->m_antrian->tampil_antrian($this->input->post("antrian"),'kredit')->result();
			if (count($data['data'])!=null){
				$data['uang_muka']=$this->m_antrian->tampil_antrian($this->input->post("antrian"),'kredit')->row()->uang_muka;
				$data['nofak']=$this->m_antrian->tampil_antrian($this->input->post("antrian"),'kredit')->row()->jual_nofak;
			}else{
				$data['uang_muka']='0';
				$data['nofak']='';
				$data['antrian']='0';
			}
			
			// var_dump($data['data']->result());
		}else{
			$data['data']=$this->m_antrian->tampil_antrian($this->input->post("antrian"),'kredit')->result();
			$data['uang_muka']='0';
			$data['nofak']='';
		}
				// echo $this->db->last_query();
		$this->load->view('kasir/v_penjualan_kredit',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('kasir/v_detail_barang_jual',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function add_to_cart(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
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

		redirect('kasir/penjualan_kredit');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function remove(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('kasir/penjualan_kredit');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_penjualan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$uang_muka=$this->input->post('uang_muka');
		$nofak=$this->input->post('nofak');
		// $jml_uang=0;
		// $kembalian=0;
		// $jenis='kredit';
		// if(!empty($total)){
		// 		$this->cart->destroy();
		// 		$this->session->unset_userdata('tglfak');
		// 		$this->session->unset_userdata('suplier');
		// 		$this->load->view('kasir/alert/alert_sukses_kredit');	
		// 		// redirect('kasir/detail_kredit/'.$nofak.'/'.$total);
		// }else{
		// 	echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
		// 	redirect('kasir/penjualan_kredit');
		// }
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$uang_muka;
		$jenis='kredit';
		if(!empty($uang_muka) && !empty($jml_uang)){
			if($jml_uang < $uang_muka){
				// echo "yyy";
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('kasir/penjualan_kredit');
			}else{
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualan->update_penjualan_kredit($nofak,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();
					$this->m_antrian->update_status($nofak);
					$this->load->view('kasir/alert/alert_sukses_kredit');	
				}else{
					// echo "xx";
					redirect('kasir/penjualan_kredit');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			// redirect('kasir/penjualan');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur_kredit();
		// echo $this->db->last_query();
		$this->load->view('kasir/laporan/v_faktur_kredit',$x);
		//$this->session->unset_userdata('nofak');
	}


}