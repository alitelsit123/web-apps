<?php 
function view(String $name = '', $data = [], $default = true) {
  $instance = &get_instance();
  if($default) {
    $data['page'] = $name;
    $instance->load->view('layouts/app', $data);
  }
}