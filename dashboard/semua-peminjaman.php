<?php
include "header.php";
include "../app/FuzzyTsukamoto.php";

// menampilkan hasil dari role, kalau dia bukan pengurus atau admin makan akan muncul pesan akses dilarang
if($dataUser->isPengurus() != true){
    warning_auth();
}
?>

<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Semua Pinjaman
            <small>Peminjaman di tolak, disetujui, dan berlangsung</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengajuan Pinjaman</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php

        // menghapus peminjaman berdasarkan id
        if(isset($_GET['id'])){
            // mendapatkan id
            $id = $dataAkses->mysqlEscapeString($_GET['id']);

            echo '<div class="callout callout-info"><h4>';

            // return atau pesan saat menghapus
            echo $dataAkses->hapusPeminjaman($id);
            echo '</h4></div>';
        }
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Semua pengajuan Pinjaman</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Jangka Waktu</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Menurut Sistem</th>
                                <th>Hapus Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // ambil semua data di tabel user dan meyimpannya pada variabel data
                            //                                $data = $dataAkses->ambilPeminjaman();
                            $data = $dataAkses->ambilPeminjaman();

                            // menampilkan data
                            while($a = $dataAkses->fetchAssoc($data)){
                                echo '
                                <tr>
                                <td>'.$a["peminjaman_nama_lengkap"].'</td>
                                <td>'.$a["peminjaman_nominal"].'</td>
                                <td>'.$a["peminjaman_jangka_waktu"].'</td>
                                <td>'.$a["peminjaman_timestap"].'</td>
                                <td>'.$a["peminjaman_status"].'</td>  ';
                                $fuzzy = new FuzzyTsukamoto($a["peminjaman_user_id"],$a["peminjaman_nominal"],$a["peminjaman_jangka_waktu"]);

                                echo '
                                <td class="text-success text-bold">'.$fuzzy->hasilPeminjam().'</td>
                                <td class="text-center"><a class="btn btn-danger btn-flat" href="?id='.$a["peminjaman_id"].'">Hapus</a></td>
                                </tr>
                                ';
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Jangka Waktu</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Menurut Sistem</th>
                                <th>Hapus Data</th>
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