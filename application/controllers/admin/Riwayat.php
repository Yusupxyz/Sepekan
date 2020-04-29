<?php
class Riwayat extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_notif');
	}
	function index(){
	if($this->session->userdata('akses')!='3'){
		$data['data']=$this->m_notif->get_all_notif();
		$this->load->view('admin/v_riwayat',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function edit_status(){
		if($this->session->userdata('akses')=='1'){
			$status=$this->input->post('status');
			$id=$this->input->post('id');
			$this->m_notif->update_status($id,$status);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Status Berhasil diupdate</label>');
			redirect('admin/riwayat');
		}else{
			echo "Halaman tidak ditemukan";
		}
		}

}