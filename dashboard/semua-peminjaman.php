<?php
include "header.php";
?>

<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengajuan Pinjaman
            <small>Daftar Pengajuan Pinjaman</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengajuan Pinjaman</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Pengajuan Pinjaman</h3>
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
                                <th>Setujui / Tolak</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                                <td>C</td>
                                <td class="text-center"><a class="btn btn-info btn-flat">Setujui</a>&ensp;&ensp;&ensp;<a class="btn btn-danger btn-flat">Tolak</a></td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                                <td>C</td>
                                <td class="text-center"><a class="btn btn-info btn-flat">Setujui</a>&ensp;&ensp;&ensp;<a class="btn btn-danger btn-flat">Tolak</a></td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                                <td>C</td>
                                <td class="text-center"><a class="btn btn-info btn-flat">Setujui</a>&ensp;&ensp;&ensp;<a class="btn btn-danger btn-flat">Tolak</a></td>
                            </tr>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Jangka Waktu</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Menurut Sistem</th>
                                <th>Setujui / Tolak</th>
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