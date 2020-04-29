<?php

class End_point extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
		};
		$this->load->model('m_detail_kredit');
		$this->load->model('m_barang');
		$this->load->model('m_setting');
	}
	
	function index(){
		// This is your webhook. You must configure it in the number settings section.
    $data = json_decode($_POST["data"]);

    // When you receive a message an INBOX event is created
    if ($data->event=="INBOX")
    {
      // Default answer
      $my_answer = "This is an autoreply!. You (". $data->from .") wrote: ". $data->text;

      // You can evaluate the received message and prepare your new answer.
      if(!(strpos(strtoupper($data->text), "PRICING")===false)){
        $my_answer = "Sing up in our platform and you will get our pricing list!";

      }else if(!(strpos(strtoupper($data->text), "INFORMATION")===false)){
        $my_answer = "Of course! For more information you can access to our website http://www.domain.com!";

      }

      $response = new StdClass();
      $response->autoreply = $my_answer; // Attribute "autoreply" is very important!

      echo json_encode($response); // Don't forget to reply in JSON format

      /* You don't need any APIKEY to answer to your customer from a webhook */

    }elseif ($data->event=="MESSAGEPROCESSED") {

      $this->m_notif->simpan_notif('1','1');


    }elseif ($data->event=="MESSAGEFAILED") {

      /* Here, you can do whatever you want */

    }
      }
}
