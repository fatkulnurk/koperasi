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

            <?php
            if(isset($_POST["perbarui"])){
                $pekerjaan      = $_POST["pekerjaan"];
                $pekerjaan      = $dataAkses->mysqlEscapeString($pekerjaan);
                $jumlahuang     = $_POST["jumlahuang"];
                $jumlahuang     = $dataAkses->mysqlEscapeString($jumlahuang);

                echo '
                        <div class="callout callout-info">
                            <h4>';
                echo $dataAkses->updateProfile($dataUser->id,$pekerjaan,$jumlahuang);
                echo '</h4>
<p>Ganti Halaman lalu akses halaman ini lagi untuk melihat perubahan.</p>
                        </div>
                    ';
            }elseif (isset($_POST['ganti'])){
                $katasandi      = $_POST["katasandi"];
                $katasandi      = $dataAkses->mysqlEscapeString($katasandi);
                $sandibaru      = $_POST["sandibaru"];
                $sandibaru      = $dataAkses->mysqlEscapeString($sandibaru);
                $sandibarubaru  = $_POST["sandibarubaru"];
                $sandibarubaru  = $dataAkses->mysqlEscapeString($sandibarubaru);

                echo '
                        <div class="callout callout-info">
                            <h4>';
                    echo $dataAkses->updatePassword($dataUser->id,$sandibaru,$sandibarubaru);
                echo '</h4>
<p>Ganti Halaman lalu akses halaman ini lagi untuk melihat perubahan.</p>
                        </div>
                    ';
            }
            ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Profil Anda</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInput">ID User</label>
                                    <input type="text" class="form-control" id="exampleInput" value="<?php echo $dataUser->id;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Email</label>
                                    <input type="text" class="form-control" id="exampleInput" value="<?php echo $dataUser->email;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInpuNama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="exampleInputNama" value="<?php echo $dataUser->nama;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="exampleInput" value="<?php echo $dataUser->umur;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" id="exampleInput" value="<?php echo $dataUser->pekerjaan;?>" required>
                                </div>
                                <h4>Gaji Anda Perbulan</h4>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input class="form-control" placeholder="Mata Uang Rupiah" type="number" name="jumlahuang" value="<?php echo $dataUser->gaji;?>" required>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right" name="perbarui">Perbarui</button>
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
                                <h4>Jumlah Gaji</h4>
                                <p>Isi dengan banyak uang yang ada dapat selama satu bulan (GAJI ANDA SETIAP BULAN), mata uang adalah <span class="text-bold">Rupiah</span> dan penulisan tanpa tanda koma atau titik.</p>
                                <p>Contohnya gaji anda <span class="text-danger">Rp 1.000.000</span> maka <span class="text-bold">CUKUP TULIS 1000000</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kata Sandi</h3>
                        </div>
                        <form role="form" action="" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInpuNama">Kata Sandi Saat Ini</label>
                                    <input type="password" class="form-control" id="exampleInputNama" name="katasandi" placeholder="password anda">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="exampleInput" name="sandibaru" placeholder="password anda">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Ulangi Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="exampleInput" name="sandibarubaru" placeholder="password anda">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right" name="ganti">Ganti Kata Sandi</button>
                            </div>
                        </form>
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