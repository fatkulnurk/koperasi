<?php
include "../app.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendaftaran</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <style>
        body{
            background: linear-gradient(-70deg, rgba(255, 43, 127, 0.1) 40%, rgba(51, 226, 255, 0.83) 0%), url('../asset/images/background.png') left; !important;
            background-size: cover;
            background-attachment: fixed;
            overflow-y: scroll;
        }
    </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>KOPE</b>RASI</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Pendaftaran User Baru</p>

      <?php
      if(isset($_POST['daftar'])){
          // mengambil data dari tabel user
          $result = $dataAkses->daftar($dataAkses->mysqlEscapeString($_POST["email"]),$dataAkses->mysqlEscapeString($_POST["namalengkap"]),$dataAkses->mysqlEscapeString($_POST["jeniskelamin"]),$dataAkses->mysqlEscapeString($_POST["gaji"]),$dataAkses->mysqlEscapeString($_POST["umur"]),$dataAkses->mysqlEscapeString($_POST["pekerjaan"]),md5($dataAkses->mysqlEscapeString($_POST["password"])));

          // cek apakah login berhasil
          if($result){
              echo '
              <div class="callout callout-success">
                  <h4>Pendaftaran Berhasil</h4>
                  <p>Sekarang anda bisa masuk ke akun anda.</p>
              </div>';
          }else{
              echo '
              <div class="callout callout-danger">
                  <h4>Pendaftaran Gagal</h4>
                  <p>Periksa Formulir sepertinya masih ada yang salah.</p>
              </div>';
          }
      }

      ?>

    <form method="post" action="">
      <div class="form-group has-feedback">
          <label class="text-info">Nama Lengkap</label>
        <input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <label class="text-info">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <label class="text-info">Tanggal Lahir</label>
            <input type="date" name="umur" class="form-control" required>
            <span class="glyphicon glyphicon-time form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label class="text-info">Jenis Kelamin</label>
            <select class="form-control" name="jeniskelamin" required>
                <option value="lakilaki">Laki Laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <hr>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required>
            <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="number" class="form-control" name="gaji" placeholder="Gaji" required>
            <span class="glyphicon glyphicon-usd form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="daftar">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<hr>
    <a href="login.php" class="text-center">Masuk ke Akun Anda</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
