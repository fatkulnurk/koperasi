<?php
include "header.php";

// cek rolenya, kalau dia bukan pengurus atau admin maka akan muncul pesan denied
if(($dataUser->isPengurus() != true)){
    warning_auth();
}
?>

<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Peminjaman Yang Sedang Aktif
            <small>Daftar Peminjaman Berlangsung</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengajuan Pinjaman</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php

        // mengupdate data, sudah lunas atau belum
        if(isset($_GET["status"]) && isset($_GET['id'])){
            $status = $_GET['status'];
            $id     = $_GET['id'];

            echo '<div class="callout callout-info"><h4>';

            // menampilkan return hasil mengupdate data, entah itu return atau false
            echo $dataAkses->SM($status,$id);
            echo '</h4></div>';
        }
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Peminjaman Berlangsung</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Jangka Waktu</th>
                                <th>Tanggal</th>
                                <th>Info Pembayaran</th>
                                <th>Lunas / Belum</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // ambil semua data di tabel user dan meyimpannya pada variabel data
                            //                                $data = $dataAkses->ambilPeminjaman();
                            $data = $dataAkses->query("select * from peminjaman where peminjaman_status='disetujui' and peminjaman_lunas='belum'");
                            while($a = $dataAkses->fetchAssoc($data)){
                                echo '
                                <tr>
                                <td>'.$a["peminjaman_nama_lengkap"].'</td>
                                <td>'.$a["peminjaman_nominal"].'</td>
                                <td>'.$a["peminjaman_jangka_waktu"].'</td>
                                <td>'.$a["peminjaman_timestap"].'</td>
                                <td>'.$a["peminjaman_lunas"].' Lunas</td>      
                                <td class="text-center"><a class="btn btn-primary btn-flat" href="?status=sudah&id='.$a["peminjaman_id"].'">Sudah Lunas</a></td>
                                </tr>
                                ';
                            }
                            ?>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Jangka Waktu</th>
                                <th>Tanggal</th>
                                <th>Info Pembayaran</th>
                                <th>Lunas / Belum</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>