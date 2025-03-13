<?php
define('DATA_FILE', '../data/data.json');
require_once "../modals/client.model.php";

function jsonToArray1(string $key=null){
    $json = file_get_contents('../data/data.json');
    $tab = json_decode($json, true)?? [];
    if($key!=null){
        return $tab[$key];
        }
    return $tab;
}