<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
  protected $title = 'Chat App';
  private function getusers() {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "https://reqres.in/api/users");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $r = curl_exec($c);
    curl_close($c);
    $result_parse = json_decode($r);
    return $result_parse->data;
  }
  private function user($id) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "https://reqres.in/api/users/".$id);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $r = curl_exec($c);
    curl_close($c);
    $result_parse = json_decode($r);
    return $result_parse->data;
  }
  public function send_message() {
    
  }
  public function index() { 
    redirect(base_url('1/chat/2'));
  }
  public function show($active = 1, $id = 7)
	{
    $users = $this->getusers();
    $user = null;
    if(ctype_digit($id)) {
      $user_active = $this->user($active);
      $user = $this->user($id);
    } else {
      $user = $this->user(7);
    }

    $messages = read('chat.json');
    $messages_array = json_decode($messages);
    
    // var_dump($messages_array[0]->sender);return;

    $messages_result = array_filter($messages_array, function($item, $index) use($id, $active){
      return ($item->receiver == $id && $item->sender == $active) || ($item->sender == $id && $item->receiver == $active);
    }, ARRAY_FILTER_USE_BOTH);
		$this->load->view('layouts/app', [
      'title' => $this->title,
      'page' => 'pages/chat_home',
      'contacts' => $users,
      'user' => $user,
      'user_active' => $user_active,
      'messages' => $messages_result
    ]);
	}
  public function chat() {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('message', 'string', 'required');
    
    if ($this->form_validation->run() == FALSE)
    {
      redirect(base_url($this->input->post('sender').'/chat/'.$this->input->post('receiver')), 'refresh');
    }
    else
    {
      $sender = $this->user($this->input->post('sender'));
      $receiver = $this->user($this->input->post('receiver'));
      $chat_history = read('chat.json');
      $chat_array = json_decode($chat_history);
      $chat_array[sizeof($chat_array)] = [
        'receiver' => $receiver->id,
        'sender' => $sender->id,
        'text' => $this->input->post('message')
      ];
      file_write('chat.json', json_encode($chat_array));

      redirect(base_url($this->input->post('sender').'/chat/'.$this->input->post('receiver')), 'refresh');
    }
  }
}
