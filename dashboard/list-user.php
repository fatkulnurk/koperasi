<?php
include "header.php";
?>

<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Semua User
            <small>List User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Semua User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php
        // rubah hak akses
        if(isset($_GET["akses"]) && isset($_GET['id'])){
            $akses  = $_GET['akses'];
            $akses  = $dataAkses->mysqlEscapeString($akses);
            $id     = $_GET['id'];
            $id     = $dataAkses->mysqlEscapeString($id);

            echo '<div class="callout callout-info"><h4>';
            echo $dataAkses->updateHakAkses($id,$akses);
            echo '</h4></div>';
        }elseif (isset($_GET['hapus'])){
            $id     = $_GET['hapus'];
            $id     = $dataAkses->mysqlEscapeString($id);

            echo '<div class="callout callout-info"><h4>';
            echo $dataAkses->hapusUserTertentu($id);
            echo '</h4></div>';
        }
        ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Semua User, Pegawai dan Admin</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelahiran</th>
                                <th>Hak Akses</th>
                                <th>Kelola Hak Akses</th>
                                <th>Hapus Akun</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // ambil semua data di tabel user dan meyimpannya pada variabel data
                            $data = $dataAkses->ambilUsers();
                            while($a = $dataAkses->fetchAssoc($data)){
                                echo '
                                <tr>
                                <td>'.$a["user_id"].'</td>
                                <td>'.$a["user_namalengkap"].'</td>
                                <td>'.$a["user_email"].'</td>
                                <td>'.$a["user_kelamin"].'</td>
                                <td>'.$a["user_umur"].'</td>
                                <td>';
                                echo infoHakAksesAkun($a["user_tipe_akun"]).'</td>
                                <td class="text-center"><a class="btn btn-warning btn-flat" href="?akses=3&id='.$a["user_id"].'">User</a> <a class="btn btn-info btn-flat" href="?akses=2&id='.$a["user_id"].'">Pengurus</a> <a class="btn btn-success btn-flat" href="?akses=1&id='.$a["user_id"].'">Admin</a></td>
                                <td class="text-center"><a class="btn btn-danger btn-flat" href="?hapus='.$a["user_id"].'">Hapus</a></td>
                                </tr>                                
                                ';
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelahiran</th>
                                <th>Hak Akses</th>
                                <th>Kelola Hak Akses</th>
                                <th>Hapus Akun</th>
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