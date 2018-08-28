<?php
// fungsi untuk redirect
function header_location($url){
    header("location:$url");
}

function redirect_halaman($url){
    header("Location: $url"); /* Redirect browser */
}

function warning_auth(){
    die('

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Not Authorized
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">not authorized</li>
      </ol>
    </section>
    
    <section class="content container-fluid">

        <div class="callout callout-danger">
            <h4>AKSES DI LARANG</h4>

            <p>Anda dilarang mengakses halaman ini, silakan kembali ke dashboard.</p>
        </div>
        </section>
    ');

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
        return "Hapus Akun Ini";
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
