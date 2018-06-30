<?php
include "header.php";
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pengajuan Pinjaman
                <small>Pengajuan Pinjaman Baru</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Pengajuan Pinjaman</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Pengajuan Pinjaman</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInpuNama">Nama Peminjam</label>
                                    <input type="text" class="form-control" id="exampleInputNama" value="NAMA KAMU" disabled>
                                </div>
                                <!-- select -->
                                <div class="form-group">
                                    <label>Jangka Waktu Pinjaman</label>
                                    <select class="form-control" required>
                                        <option value="pendek">Pendek (kurang dari 5 bulan)</option>
                                        <option value="sedang">Sedang (5 sampai 12 bulan)</option>
                                        <option value="panjang">Panjang (12 sampai 20 bulan)</option>
                                    </select>
                                </div>
                                <h4>Jumlah Uang</h4>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input class="form-control" placeholder="Mata Uang Rupiah" type="number" name="jumlahuang" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required> Centang kotak ini jika anda menerima persyaratan yang kami berikan untuk mengajukan pinjaman ini.
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Sumbit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Panduan Pengisian</h3>
                        </div>
                        <div class="box-body">
                            <div class="box-group">
                                <h4>Nama Peminjam</h4>
                                <p>Untuk nama ini disesuaikan dengan nama di akun anda.</p>
                            </div>
                            <hr>
                            <div class="box-group">
                                <h4>Jangka Waktu Pinjaman</h4>
                                <p>Ini adalah waktu lamanya yang dibutuhkan untuk melunasi hutang.<br> Pendek (kurang dari 5 bulan), Sedang (5 sampai 12 bulan), Panjang (12 sampai 20 bulan).</p>
                            </div>
                            <hr>
                            <div class="box-group">
                                <h4>Jumlah Pinjaman</h4>
                                <p>Isi dengan nominal uang yang ingin anda pinjam, mata uang adalah <span class="text-bold">Rupiah</span> dan penulisan tanpa tanda koma atau titik.</p>
                                <p>Contohnya anda pinjam <span class="text-danger">1.000.000</span> maka <span class="text-bold">CUKUP TULIS 1000000</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php
include "footer.php";
?>