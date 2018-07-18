<?php
// fungsi untuk redirect
function header_location($url){
    header("location:$url");
}

// fungsi Untuk cek Jenis akunnya (hak akses)
function infoHakAksesAkun($id){
    if($id == 1){
        return "Admin";
    }elseif ($id == 2){
        return "Pengurus";
    }elseif ($id == 3){
        return "Pengguna";
    }else{
        return "Hapus Akun";
    }
}

// fungsi cek umur
function infoUmur(){

    $bday = new DateTime('19.01.1999');
    $today = new DateTime('00:00:00'); // - use this for the current date
    //$today = new DateTime('2010-08-01 00:00:00'); // for testing purposes

    $diff = $today->diff($bday);

    printf('%d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
}