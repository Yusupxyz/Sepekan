<?php
class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('m_detail_kredit');
        $this->load->model('m_setting');
        $this->load->model('m_notif');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_setting->get_setting();
		$this->load->view('admin/v_setting',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}


	function edit_setting(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$set=$this->input->post('set');
		$this->m_setting->update_setting($kode,$set);
		echo $this->session->set_flashdata('msg','<label class="label label-success">Setting Berhasil diubah</label>');
		$int=$this->m_setting->get_setting_waktu()->row()->setting;
		$cek=$this->m_detail_kredit->cek_jatuh_tempo('-'.$int);
		echo $this->db->last_query();
		$api=$this->m_setting->get_setting_api()->row()->setting;
		if ($cek){
			foreach ($cek->result() as $key => $value) {
				$cek_notif=$this->m_notif->get_notif($value->kode_kredit,$value->jatuh_tempo)->row();
				if(!$cek_notif){
					$this->send_wa($api,$value->No_wa_hp,$value->jatuh_tempo,$value->sisa,$value->kode_kredit);
				}
			 }
		}
		redirect('admin/setting');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function send_wa($api,$no_wa,$jatuh_tempo,$sisa,$kode){
		// Send Message
		$my_apikey = "$api";
		$destination = "$no_wa";
		$message = "*Ini adalah pesan otomatis*. Pelanggan Yang Terhormat. Kredit barang Anda di Toko Bangunan CV. Enam Saudara, telah melewati batas jatuh tempo yaitu pada tanggal $jatuh_tempo. Dengan sisa kredit sebesar Rp ".number_format($sisa).".";
		$api_url = "http://panel.rapiwha.com/send_message.php";
		$api_url .= "?apikey=". urlencode ($my_apikey);
		$api_url .= "&number=". urlencode ($destination);
		$api_url .= "&text=". urlencode ($message);
		$my_result_object = json_decode(file_get_contents($api_url, false));
		echo "<br>Result: ". $my_result_object->success;
		echo "<br>Description: ". $my_result_object->description;
		echo "<br>Code: ". $my_result_object->result_code;
		$this->m_notif->simpan_notif($kode,$jatuh_tempo);
	}
}