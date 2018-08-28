<?php
include "header.php";
if(($dataUser->isAdmin() != true)){
    warning_auth();
}
?>

<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Semua User
            <small>Cari User lalu edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Semua User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php
        // Form Edit data
        if(isset($_GET['id'])){
            $id     = $_GET['id'];
            $id     = $dataAkses->mysqlEscapeString($id);

            $dataUser->setId($id);
            /*echo '<div class="callout callout-info"><h4>';
            echo $dataAkses->updateHakAkses($id,$akses);
            echo '</h4></div>';*/

            echo ' 
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Profil Anda</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="?id='.$id.'" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInput">Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInput" value="'.$dataUser->email.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInpuNama">Nama Lengkap</label>
                                    <input name="namalengkap" type="text" class="form-control" id="exampleInputNama" value="'.$dataUser->nama.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Tanggal Lahir</label>
                                    <input name="tgl" type="date" class="form-control" id="exampleInput" value="'.$dataUser->umur.'" required>
                                </div> 
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right" name="perbarui">Perbarui</button>
                            </div>
                        </form>
                    </div>
            ';
        }

        if(isset($_POST['perbarui'])){
            $id    = $_GET['id'];
            $email = $_POST['email'];
            $nama  = $_POST['namalengkap'];
            $tgl   = $_POST['tgl'];

            echo '<div class="callout callout-info"><h4>';
            echo $dataAkses->updateDataProfile($id,$email,$nama,$tgl);
            echo '</h4>
<p>Update data kelihatan jika anda mereload halaman ini.</p>
</div>';
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
                                <th>Rubah Data</th>
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
                                <td class="text-center"><a class="btn btn-primary btn-flat" href="?id='.$a["user_id"].'">Edit Data</a></td>
                                </tr>                                
                                ';
                            }
                            ?>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelahiran</th>
                                <th>Rubah Data</th>
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