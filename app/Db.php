<?php
/*
 * Class Untuk Koneksi ke Database
 * */
class Db{
    // variabel koneksi ke database
    var $host       = "localhost";
    var $username   = "root";
    var $password   = "";
    var $dbname     = "koperasi";

    // hasil koneksi
    var $conn;

    // method untuk koneksi
    public function koneksi()
    {
        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
        return $conn;
    }
}