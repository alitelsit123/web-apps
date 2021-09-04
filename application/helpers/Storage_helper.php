<?php


function read($filename) {
  $path = APPPATH . 'storage';
  if (file_exists($path.'/'.$filename)) {
    return file_get_contents($path.'/'.$filename);
  } else {
    mkdir($path, 0777, true);
    $myfile = fopen($path.'/'.$filename, "w") or die("Unable to open file!");
    $txt = '[]';
    fwrite($myfile, $txt);
    fclose($myfile);
    return null;
  }
}
function file_write($filename, $contents) {
  $path = APPPATH . 'storage';
  $myfile = fopen($path.'/'.$filename, "w") or die("Unable to open file!");
  $txt = $contents;
  fwrite($myfile, $txt);
  fclose($myfile);
  return true;
}