<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!--Font Awesome-->
  <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../ assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon-evote.png" >
  <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>
  <!--Date Picker-->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</head>

<body style="background-color:#F5F5F5">
<br><br><br><br><br><br><br>
  <div class="container">
   <div class="row">
     <div class="col-lg-2"> </div>
     <div class="col-lg-8">

<?php
    if ($id_password_salah)
    {
      echo
      '<div class="alert alert-danger">'.
        '<center>'.'<strong>'.$id_password_salah.'</strong>'.'</center>'.
      '</div>';
    }
?>

     <div class="panel panel-default">
      <div class="panel-body">
      <form class="form-horizontal" method="POST" action="<?php echo site_url(); ?>home/login">
        <fieldset>
          <center>
            <img src="<?php
                        if($logo==NULL)
                        {
                          echo base_url().'assets/img/evote-logo.png';
                        }
                        else{
                          echo base_url().'assets/img/'.$logo;
                        }
                      ?>"
            alt="...">
            <h3><?php echo ($judul ? $judul : ""); ?></h3>
          </center>
          <div class="form-group">
            <label for="inputId" class="col-lg-2 control-label">ID</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="inputIdPemilih" id="inputId">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
              <input type="password" class="form-control" name="inputPassword" id="inputPassword">
            </div>
          </div>
          <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            </div>
          </div>
        </fieldset>
      </form>
          </div>
      </div>
    </div>
    <div class="col-lg-2"> </div>
  </div>

  <footer>
    <div class="page-header">
    </div>
    <center>
    <p><a href="http://www.facebook.com/jabiralhayyan" target="_blank">Jabir Al Hayyan</a> © 2017 Copyright All Right Reserved
        <br> Email : jabiralhaiyan@gmail.com | WA : +62896 7909 3686
      </p>
    </center>
  </footer>


  <?php
      if ($voting_berhasil) echo "<script>
       window.onload = fungsi_notifikasi;
     function fungsi_notifikasi()
     {
      alert(" . '"' . $voting_berhasil . '"' . ");
    }
    </script>";
  ?>

</div>

</body>

</html>





