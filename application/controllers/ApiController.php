<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;


class ApiController extends RestController{
	public function __construct() {
    parent::__construct();
  }
  public function getAllRecentMessages_get(){
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "https://reqres.in/api/unknown");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $r = curl_exec($c);
    curl_close($c);
    $result_parse = json_decode($r);
		return $this->response(['msg_contact' => $result_parse], 200);
	}

}
