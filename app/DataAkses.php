<?php
include_once "Db.php";

class DataAkses extends Db
{
    // variabel koneksi ke database
    var $conn;

    // konstraktor untuk menyimpan koneksi dar database
    public function __construct()
    {
        $dbconn = new Db();
        $this->conn = $dbconn->koneksi();
    }

    // untuk cek koneksi ke database
    public function connCheck(){
        if(!$this->conn){
            die("Koneksi ke database gagal");
        }else{
            die("Koneksi ke database berhasil");
        }
    }

    /*
    CRUD USER
     */

    // mengambil semua data di tabel user
    public function ambilUsers(){
        return $this->conn->query("select * from user");
    }


    /****
    FUNGSI PEMBANTU KONEKSI DAN PENGAMBILAN DATA (BAWAAN PHP TAPI DI RUBAH NAMING CONVENSIONNYA MENJADI CAMELCASE)
     ****/
    // untuk escape string (agar data sesuai format mysql)
    function mysqlEscapeString($result)
    {
        return mysqli_real_escape_string($this->conn,$result);
    }

    function query($result){
        return $this->conn->query($result);
    }

    // untuk menghitung jumlah baris
    function numRows($result)
    {
        return $result->num_rows;
    }

    // untuk cek jumlah baris apakah lebih dari 1
    function numRowsOverOne($result){
        return $result > 0 ? true : false;
    }

    // untuk fetch assoc
    function fetchAssoc($result){
        return mysqli_fetch_assoc($result);
    }

    // untuk fetch array
    function fetchArray($result){
        return mysqli_fetch_array($result);
    }

    // fetch object
    function fetchObject($result){
        return mysqli_fetch_object($result);
    }

    // fetch length
    function fetchLength($result){
        return mysqli_fetch_lengths($result);
    }
}