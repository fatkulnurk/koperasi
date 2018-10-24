<?php
include "../app.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masuk</title>
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
            overflow-y: scroll;
            background-attachment: fixed;
        }
    </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--<body class="hold-transition login-page">-->
<body>
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>LOG</b>RASI</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masukan Email dan Password Anda</p>
      <?php
      // ketika form email dan password sudah di isi
      if(isset($_POST['email']) && isset($_POST['password'])){

          // mengambil data dari tabel user
          $result = $dataAkses->masuk($dataAkses->mysqlEscapeString($_POST['email']),$dataAkses->mysqlEscapeString($_POST['password']));

          // cek apakah login berhasil
          if($result){
              $_SESSION['masuk'] = "sukses";
              if($_SESSION['masuk'] == "sukses"){
                  // kalau berhasil maka akan di redirect ke dalaman index.php
                  header_location("./index.php");
              }
          }else{
              // kalau gagal maka akan muncul pesan login gagal
              echo '
              <div class="callout callout-danger">
                  <h4>Login Gagal</h4>
                  <p>Periksa Email atau Kata Sandi anda.</p>
              </div>';
          }
      }

      ?>
    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
<hr>
    <a href="./daftar.php" class="text-center">Mendaftar menjadi member.</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
