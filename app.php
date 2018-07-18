<?php
require_once "app/DataAkses.php";
require_once "app/functions.php";
require_once "app/User.php";

// object Akses data
$dataAkses = new DataAkses();

// object data user
$dataUser = new User();


//
//$conn = mysqli_connect("localhost","root","","koperasi");
//$result = mysqli_query($conn,"select * from user");
//
//while($row = $result->fetch_assoc()) {
//    echo $row["user_namalengkap"]. "<br>";
//}