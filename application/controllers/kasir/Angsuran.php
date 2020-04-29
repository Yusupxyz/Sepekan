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
	if($this->session->userdata('akses')=='2'){
		if ($this->input->get('status')=='1'){
			$status='1';
			$data['data']=$this->m_detail_kredit->tampil_kredit_status($status);
		}elseif($this->input->get('status')=='2'){
			$status='0';
			$data['data']=$this->m_detail_kredit->tampil_kredit_status($status);
		}else{
			$data['data']=$this->m_detail_kredit->tampil_kredit();
		}
		// echo $this->db->last_query() ;
		$this->load->view('kasir/v_angsuran',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function bayar_angsuran($kode){
		if($this->session->userdata('akses')=='2'){
			$data['kode']=$kode;
			$data['data']=$this->m_detail_kredit->tampil_kredit_kode($kode)->row();
			$data['angsuran']=$this->m_angsuran->get_angsuran_ke($kode)->row()->count+1;
			$this->load->view('kasir/v_bayar_angsuran',$data);
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	function simpan_angsuran(){
		if($this->session->userdata('akses')=='2'){
			$kokang=$this->m_angsuran->get_kang();
			$data['kokang']=$kokang;
			$kode_kredit=$this->input->post('kode_kredit');
			$kode_faktur=$this->input->post('kode_faktur');
			$tgl=$this->input->post('jatuh_tempo');
			$angke=$this->input->post('angke');
			$pembayaran=$this->input->post('pembayaran');
			$terima=$this->input->post('terima2');
			$kembalian=$this->input->post('kembalian2');
			$sisa=$this->input->post('sisa')-$this->input->post('pembayaran');
			if ($sisa==0){
				$status='1';
			}else{
				$status='0';
			}
			$simpan=$this->m_angsuran->simpan_angsuran($kokang,$tgl,$kode_kredit,$angke,$terima,$kembalian);
			if ($simpan){
				$date = strtotime("+1 month", strtotime($tgl));
				$jatuh_tempo=date("Y-m-d", $date);
				$this->m_detail_kredit->update_kredit($kode_faktur,$sisa,$jatuh_tempo,$status);
				$this->load->view('kasir/alert/alert_sukses_angsuran',$data);	
			}else{
				echo "<script>alert('Gagal disimpan!'); location.href='../angsuran';</script>";
			}
			
		}else{
			echo "Halaman tidak ditemukan";
		}
	}
	function edit_data(){
		if($this->session->userdata('akses')=='2'){
			$kode=$this->input->post('kode');
			$wa=$this->input->post('wa');
			$this->m_angsuran->update_angsuran($kode,$wa);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Nomor WA Berhasil diubah</label>');
			redirect('kasir/angsuran');
		}else{
			echo "Halaman tidak ditemukan";
		}
		}

	function cetak_faktur($kode){
		$x['data']=$this->m_angsuran->cetak_faktur_angsuran($kode)->row_array();
		$kk=$x['data']['kode_kredit'];
		$this->load->view('kasir/laporan/v_faktur_angsuran',$x);
		//$this->session->unset_userdata('nofak');
	}

	function cetak_lunas($kode){
		$x['data']=$this->m_angsuran->cetak_lunas($kode);
		$this->load->view('kasir/laporan/v_faktur_lunas_angsuran',$x);
		//$this->session->unset_userdata('nofak');
	}
}