<?php
session_start();
require_once "app/app.php";

$dataAkses = new DataAkses();
//$result = $dataAkses->ambilUsers();

//$result = $dataAkses->query("SELECT * FROM USER");
//
////print_r($dataAkses->fetchArray($result));
//
//foreach ($result as $data){
//    echo $data["user_email"];
//}