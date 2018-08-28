<?php
include "header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Halaman Utama</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Halaman Utama</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="callout callout-info">
            <h4>Selamat Datang <?php echo $dataUser->namalengkap; ?></h4>

            <p>Halo, selamat datang di halaman dashboard pengguna, gunakan semua menu dengan bijak dan jika ada kesalahan
                mohon memberitahukan ke kami.</p>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "footer.php";
?>