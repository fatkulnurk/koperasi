<?php
/*
 *  File ini digunakan untuk import pengaturan serta class yang di include di semua halaman
 */

// untuk crud data ke database
require_once "app/DataAkses.php";

// class informasi user sekarang
require_once "app/User.php";

// object Akses data
$dataAkses = new DataAkses();

/*
 * Object Data User
 * digunakan untuk mendapatkan informasi dari user tertentu
 */
$dataUser = new User();

// include fungsi tambahan
require_once "app/functions.php";

