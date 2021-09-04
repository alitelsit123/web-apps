<?php

function HttpRequest($option) {
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, $option['url']);
  if($option == 'post') {
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$option['params']);
  } else {
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  }
  $r = curl_exec($c);
  curl_close($c);
  $result_parse = json_decode($r);
  if($result_parse) {
    return $result_parse->data;
  } else {
    return [];
  }
}