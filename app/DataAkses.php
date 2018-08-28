<?php
// Menjalankan Session
session_start();

/*********************************
 * INFORMASI CLASS DataAkses
 *
 * Ini adalah class yang di gunakan untuk akses, update, hapus, edit data yang ada di database.
 * Semua fungsi standart dari mysqli di rubah naming convensionnya menjadi CamelCase, agar penulisannya mudah.
 *
*********************************/

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

    /*************************************************
     *                 CRUD USER
     *************************************************/
    // mengambil semua data di tabel user
    public function ambilUsers(){
        $result = $this->conn->query("select * from user");
        return $result;
    }

    // ambil user tertentu
    public function ambilUserTertentu($id){
        $result = $this->conn->query("select * from user where user_id='$id'");
        return $result->fetch_assoc();
    }

    // Hapus user tertentu
    public function hapusUserTertentu($id){
        $result = $this->conn->query("DELETE FROM user where user_id='$id'");
        if($result){
            return "Hapus Sukses";
        }else{
            return "Hapus Gagal";
        }
    }

    // mengambil semua data di peminjaman
    public function ambilPeminjaman(){
        $result =  $this->conn->query("select * from peminjaman");
        return $result;
    }

    // mengambil semua data di peminjaman berdasarkan id tertentu
    public function ambilPeminjamanById($id){
        $result =  $this->conn->query("select * from peminjaman where peminjaman_user_id='$id'");
        return $result;
    }


    function tambahPeminjaman($id,$nama,$jangkawaktu,$nominal){
        $result = $this->conn->query("INSERT INTO peminjaman (peminjaman_user_id, peminjaman_nama_lengkap, peminjaman_nominal, peminjaman_jangka_waktu) VALUES ('$id','$nama','$nominal','$jangkawaktu');");
        if($result){
            return "Pengajuan Peminjaman Berhasil";
        }else{
            return "Pengajuan Peminjaman Gagal";
        }
    }

    // login checker
    function masuk($email,$password){
        $password = md5($password);
        $result = $this->conn->query("select * from user where user_email='$email' AND user_password='$password';");
        $data = $this->fetchAssoc($result);

        $_SESSION['id'] = $data['user_id'];

        return $this->numRows($result);
    }

    // daftar user baru
    function daftar($nip,$email,$nama,$kelamin,$gaji,$sisa_gaji,$umur,$golongan,$unitkerja,$nohp,$pekerjaan,$password,$tanggunganbri,$tanggunganbpd,$tanggunganbpr,$tanggungankpri,$tanggungansekbid,$tanggunganlainlain){
        // $result = $this->conn->query("INSERT INTO user (user_email, user_namalengkap, user_kelamin, user_gaji, user_umur, user_pekerjaan, user_password) VALUES ('$email','$nama','$kelamin','$gaji','$umur','$pekerjaan','$password');");
        $result = $this->conn->query("INSERT INTO user (user_nip, user_email, user_namalengkap, user_kelamin, user_gaji,user_sisa_gaji, user_umur, user_golongan, user_unitkerja, user_nohp, user_pekerjaan, user_password, user_tanggungan_bri, user_tanggungan_bpd, user_tanggungan_bpr, user_tanggungan_kpriedipeni,user_tanggungan_sekbid, user_tanggungan_lainlain) VALUES ('$nip','$email','$nama','$kelamin','$gaji','$sisa_gaji','$umur','$golongan','$unitkerja','$nohp','$pekerjaan','$password','$tanggunganbri','$tanggunganbpd','$tanggunganbpr','$tanggungankpri','$tanggungansekbid','$tanggunganlainlain');");
        if($result){
            return true;
        }else{
            return false;
        }
    }

    // update profile
    function updateProfile($id,$pekerjaan,$uang){
        $result = $this->conn->query("UPDATE user SET user_pekerjaan='$pekerjaan',user_gaji='$uang' WHERE user_id='$id'");
        if($result){
            return "Update Berhasil";
        }else{
            return "Update Gagal";
        }
    }

    // edit data profile
    function updateDataProfile($id,$email,$namalengkap,$tgl){
        $result = $this->conn->query("UPDATE user SET user_email='$email',user_namalengkap='$namalengkap',user_umur='$tgl' WHERE user_id='$id'");
        if($result){
            return "Update Data Berhasil";
        }else{
            return "Update Data Gagal";
        }
    }

    // update hak akses
    function updateHakAkses($id,$akses){
        $result = $this->conn->query("UPDATE user SET user_tipe_akun='$akses' WHERE user_id='$id'");
        if($result){
            return "Update Hak Akses Berhasil";
        }else{
            return "Update Hak Akses Gagal";
        }
    }

    // update tagihan yang harus dibayar bulanan
    function updateTagihanBulanan($id,$bri,$bpd,$bpr,$kpri,$sekbid,$lain){
        $result = $this->conn->query("UPDATE user SET user_tanggungan_bri='$bri', user_tanggungan_bpd='$bpd', user_tanggungan_bpr='$bpr', user_tanggungan_kpriedipeni='$kpri', user_tanggungan_sekbid='$sekbid', user_tanggungan_lainlain='$lain' WHERE user_id='$id'");
        if($result){
            return "Update Tagihan Bulanan Berhasil.";
        }else{
            return "Update Tagihan Bulanan Gagal.";
        }
    }

    // update password atau ganti password
    function updatePassword($id,$passwordbaru,$passwordbaru2){
        if($passwordbaru != $passwordbaru2){
            return "Kata Sandi Baru Yang Anda Masukan Tidak Sama.";
        }else {
            $passwordbaru = md5($passwordbaru);
            $result = $this->conn->query("UPDATE user SET user_password='$passwordbaru' WHERE user_id='$id'");
            if($result){
                return "Update Kata Sandi Berhasil";
            }else{
                return "Update Kata Sandi Gagal";
            }
        }
    }

    // Daftar Pengajuan Pinjaman (setuju / tolak)
    function DPJ($pesan,$id){
        $pesan = $this->mysqlEscapeString($pesan);
        $result = $this->conn->query("update peminjaman SET peminjaman_status='$pesan' where peminjaman_id='$id'");
        if($result){
            if($pesan == "ditolak"){
                return "Pengajuan pinjaman id ".$id." Berhasil ditolak.";
            }else{
                return "Pengajuan pinjaman id ".$id." Berhasil disetujui.";
            }
        }else{
            return "Kegagalan Sistem (cek file DataAkses fungsi DPJ";
        }

    }

    // Peminjaman berlangsung file sedang-meminjam.php
    function SM($pesan,$id){
        $result = $this->conn->query("update peminjaman SET peminjaman_lunas='$pesan' where peminjaman_id='$id'");
        if($result){
            return "Pinjaman id ".$id." Sudah Lunas.";
        }
    }

    // hapus peminjaman file semua-peminjaman.php
    function hapusPeminjaman($id){
        $result = $this->conn->query("delete from peminjaman where peminjaman_id='$id'");
        if($result){
            return "Pinjaman id ".$id." Berhasil di hapus.";
        }else{
            return "Penghapusan Gagal";
        }
    }

    /******************************************************************************
     *              FUNGSI PEMBANTU KONEKSI DAN PENGAMBILAN DATA
     *    BAWAAN PHP TAPI DI RUBAH NAMING CONVENSIONNYA MENJADI CAMELCASE)
     ******************************************************************************/
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