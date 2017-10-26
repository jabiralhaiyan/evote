<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Evote | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/font-awesome.min.css">
  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
-->
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/AdminLTE.min.css">

<!-- Favicon-->
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets2/img/favicon-evote.png">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?php echo base_url();?>assets2/img/evote-logo.png">
    </div>

  <?php
    if ($username_password_salah)
    {
      echo '<div class="alert alert-danger alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-ban"></i>'.$username_password_salah.'</h5>'.
      '</div>';
    }

    if ($logout_berhasil)
    {
      echo '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$logout_berhasil.'</h5>'.
      '</div>';
    }

  ?>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan masukkan username dan password !</p>

    <form action="<?php echo base_url();?>admin/login" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="inputUsername" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="inputPassword" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-3"></div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <div class="col-xs-3"></div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="container">
<center>
<footer>
    <strong>Copyright &copy; 2017 <a href="http://www.facebook.com/jabiralhayyan/" target="_blank">Jabir Al Hayyan</a>.</strong> All rights
    reserved. <br>
    <b>Email : </b> jabiralhaiyan@gmail.com | <b>WA : </b> +62896 7909 3686
  </footer>
  </center>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets2/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js"></script>

</body>
</html>
