<?php
require_once "../app.php";

// di cek apakah user sudah masuk (ketika sudah masuk session masuk seharusnya berisi data sukses, dan jika dia tidak masuk maka akan di redirect ke halaman logout
if ($_SESSION['masuk'] != "sukses"){
    header_location("./keluar.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <!--
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
          -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="?" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>K</b>PR</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>KOPE</b>RASI</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo $dataUser->nama;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>
                                    <?php
                                    // menampilkan nama dan pekerjaan user
                                    echo $dataUser->nama;?> - <?php echo $dataUser->pekerjaan;
                                    ?>
                                    <small>
                                        Member since
                                        <?php
                                        // menampilkan waktu dia mendaftar
                                        echo $dataUser->timestamp;
                                        ?>
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="profil.php" class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="keluar.php" class="btn btn-default btn-flat">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php
                        // menampilkan nama usernya
                        echo $dataUser->nama;
                        ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU NAVIGASI</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="./index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="./pengajuan-pinjaman.php"><i class="fa fa-money"></i> <span>Pengajuan Pinjaman</span></a></li>
                <li><a href="./status-pinjaman.php"><i class="fa fa-eye"></i> <span>Status Pinjaman</span></a></li>
                <?php
                /*
                 * maksudnya ini untuk cek apakah dia sebagai admin atau pengurus
                 * jika tipe akun 3 berarti user biasa (anggota)
                 * jika tipe akun bernilai 2 berarti pengurus
                 * jika tipe akun bernilai 1 maka dia admin
                 */

                // apakah dia admin atau pengurus, jika iya maka tampilkan block menu pengurus
                if(($dataUser->isPengurus() == true) || ($dataUser->isAdmin() == true)){
                    ?>

                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i> <span>Pengurus</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./daftar-pengajuan.php"><i class="fa fa-money"></i> Pengajuan Pinjaman Terbaru</a></li>
                            <li><a href="./sedang-meminjam.php"><i class="fa fa-grav"></i> Sedang Meminjam</a></li>
                            <li><a href="./pinjaman-sudah-lunas.php"><i class="fa fa-grav"></i> Pinjaman Sudah Lunas</a></li>
                            <li><a href="./semua-peminjaman.php"><i class="fa fa-address-book"></i> Semua Peminjaman</a></li>
                        </ul>
                    </li>
                <?php
                }

                // apakah dia admin, jika ia admin maka tampilkan block menu admin
//                if($dataUser->getTipeAkun() < 2){
                if($dataUser->isAdmin() == true){
                ?>
                <li class="treeview">
                    <a href="#"><i class="fa fa-user-secret"></i> <span>Admin</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./list-user.php"><i class="fa fa-user"></i> List User</a></li>
                        <li><a href="./edit-user.php"><i class="fa fa-pencil"></i> Rubah Data User</a></li>
                    </ul>
                </li>
                <?php
                }
                ?>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

