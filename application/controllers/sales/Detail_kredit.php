<?php
class Detail_kredit extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_setting');
		$this->load->model('m_antrian');
		$this->load->model('m_detail_kredit');
		$this->load->library('barcode');
	}

	function index($nofak,$total){
	if($this->session->userdata('akses')=='5'){
		$data['nofak']=$nofak;
		$data['maks']=$this->m_setting->get_setting_kredit()->row()->setting;
		$data['total']=$total;
		$dp=$this->m_setting->get_setting_dp()->row()->setting;
		$data['dp']=$total*($dp/100);
		$data['sisa_angsuran']=$total-$total*($dp/100);
		$this->load->view('sales/v_detail_kredit',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_detail_kredit(){
		if($this->session->userdata('akses')=='5'){
			$nik=$this->input->post('nik');
			$kode_faktur=$this->input->post('kode_faktur');
			$sisa=substr_replace(str_replace(',','',$this->input->post('angsuran')),'',-3);
			$dp=str_replace(',','',$this->input->post('dp'));
			$perbulan=str_replace(',','',$this->input->post('perbulan'));
			$cek_nik=$this->m_detail_kredit->cek_nik($nik)->row()->status;
			if ($cek_nik==1 || $cek_nik==''){
				$kokre=$this->m_detail_kredit->get_kokre();
				$nama=$this->input->post('nama');
				$alamat=$this->input->post('alamat');
				$no_wa=$this->input->post('no_wa');
				$lama_angsuran=$this->input->post('lama_angsuran');
				$keterangan=$this->input->post('keterangan');
				// $jml_uang=substr_replace(str_replace(',','',$this->input->post('jml_uang')),'',-3);
				// $kembalian=substr_replace(str_replace(',','',$this->input->post('kembalian')),'',-3);
				$date = strtotime("+1 month", strtotime("now"));
				$jatuh_tempo=date("Y-m-d", $date);

				$config['upload_path']      = './assets/foto_ktp';
				$config['allowed_types']    = 'jpg|png';
				$config['file_name']       	= $nik ;
				$config['overwrite'] 		= TRUE;
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload('ktp')){
					// echo $this->upload->display_errors();
					$saved_file_name = '-';

				}else{
					// var_dump($this->upload->data());
					$saved_file_name = $this->upload->data()['file_name'];
				}


				$simpan=$this->m_detail_kredit->simpan_detail_kredit($kokre,$nama,$alamat,$saved_file_name,$nik,$no_wa,$kode_faktur,$dp,$lama_angsuran,$sisa,$keterangan,$jatuh_tempo,$perbulan);
				$this->session->set_userdata('nofak',$kode_faktur);

				if ($simpan){
					// $this->m_antrian->update_status($kode_faktur);
					$data['no_antrian']=$this->session->userdata('no_antrian');
					$data['jenis']=$this->session->userdata('jenis');
					$this->load->view('sales/alert/alert_sukses_kredit',$data);	
				}else{
					echo "<script>alert('Gagal disimpan!'); location.href='../detail_kredit/$kode_faktur/$sisa';</script>";
				}
			}else{
				$sisa=$sisa+$dp;
				echo "<script>alert('Maaf, Anda masih terdaftar sebagai kreditur yang belum lunas! Silahkan ganti dengan data lain atau klik batal.'); location.href='../detail_kredit/$kode_faktur/$sisa';</script>";
			}
			
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

}