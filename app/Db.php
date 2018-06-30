<?php
class Db{
    var $host       = "localhost";
    var $username   = "root";
    var $password   = "";
    var $dbname     = "koperasi";

    var $conn;

    public function koneksi()
    {
        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
        return $conn;
    }
}