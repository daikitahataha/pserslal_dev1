<?php

function d($param){
  print '<pre>';
  var_dump($param);
}

function dd($param){
  print '<pre>';
  var_dump($param);
  exit;
}

function is_json($string) {
    return ((is_string($string) &&
            (is_object(json_decode($string)) ||
            is_array(json_decode($string))))) ? true : false;
    exit;
}

?>
