<?php
class Administrator extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
        $this->load->model('m_detail_kredit');
        $this->load->model('m_setting');
        $this->load->model('m_notif');
    }
    function index(){
        $x['judul']="Silahkan Masuk..!";
        $this->load->view('admin/v_login',$x);
    }
    function cekuser(){
        $username=strip_tags(stripslashes($this->input->post('username',TRUE)));
        $password=strip_tags(stripslashes($this->input->post('password',TRUE)));
        $u=$username;
        $p=$password;
        $cadmin=$this->mlogin->cekadmin($u,$p);
        if($cadmin->num_rows > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['user_level']=='1')
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['user_id'];
            $user_nama=$xcadmin['user_nama'];
            $user_name="Admin";
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            $this->session->set_userdata('username',$user_name);
         if($xcadmin['user_level']=='2'){
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['user_id'];
             $user_nama=$xcadmin['user_nama'];
             $user_name="Kasir";
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
             $this->session->set_userdata('username',$user_name);
             $int=$this->m_setting->get_setting_waktu()->row()->setting;
             $cek=$this->m_detail_kredit->cek_jatuh_tempo('-'.$int);
            //  echo $this->db->last_query();

            //  var_dump($cek->result);
             $api=$this->m_setting->get_setting_api()->row()->setting;
             if ($cek){
                 foreach ($cek->result() as $key => $value) {
                    $cek_notif=$this->m_notif->get_notif($value->kode_kredit,$value->jatuh_tempo)->row();
                    if(!$cek_notif){
                        $this->send_wa($api,$value->No_wa_hp,$value->jatuh_tempo,$value->sisa,$value->kode_kredit);
                    }
                 }
             }
         } 
         if($xcadmin['user_level']=='3'){
            $this->session->set_userdata('akses','3');
            $idadmin=$xcadmin['user_id'];
            $user_nama=$xcadmin['user_nama'];
            $user_name="Karyawan Gudang";
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            $this->session->set_userdata('username',$user_name);
        }
        if($xcadmin['user_level']=='4'){
            $this->session->set_userdata('akses','4');
            $idadmin=$xcadmin['user_id'];
            $user_nama=$xcadmin['user_nama'];
            $user_name="Pemilik";
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            $this->session->set_userdata('username',$user_name);
        }
        if($xcadmin['user_level']=='5'){
            $this->session->set_userdata('akses','5');
            $idadmin=$xcadmin['user_id'];
            $user_nama=$xcadmin['user_nama'];
            $user_name="Sales";
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            $this->session->set_userdata('username',$user_name);
        }//Front Office
           
         
         
        }
        
        if($this->session->userdata('masuk')==true){
            redirect('administrator/berhasillogin');
        }else{
            redirect('administrator/gagallogin');
        }
    }
        function berhasillogin(){
            redirect('beranda');
        }
        function gagallogin(){
            $url=base_url('administrator');
            echo $this->session->set_flashdata('msg','<b>Username Atau Password Salah</b>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('administrator');
            redirect($url);
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