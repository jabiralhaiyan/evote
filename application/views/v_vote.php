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
  <br><br><br>
  <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <div class="panel panel-default">
        <div class="panel-body">
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
              <h3>Pilih Calon Ketua </h3>
            </center>

            <!--Looping Calon Ketua-->
            <?php
              foreach($query->result() as $row) { ?>
              <div class="col-sm-6 col-md-<?php echo $md; ?>">
                <a href="#" data-toggle="modal" data-target="#calonketua<?php echo $row->idcalonketua; ?>">
                
                <div class="thumbnail">
                <center><span class="badge" style="font-size: 28px; background-color:#004855"><?php echo $row->nourut; ?></span></center>
                  <center>
                    <img src="<?php
                      if($row->foto==NULL || $row->foto=='')
                      {
                        echo base_url().'assets/img/default-foto.png';
                      }
                      else{
                        echo base_url().'assets/profpic/'.$row->foto;
                      }
                      ?>"
                      alt="..." width="250px" height="330px"">
                    <div class="caption">
                      <h6><strong><?php echo $row->nama; ?></strong></h6>
                    </div>
                  </center>
                </div>
                </a>
                <!-- Modal -->
              <div class="modal fade" id="calonketua<?php echo $row->idcalonketua; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><b>Konfirmasi</b></h4>
                    </div>
                    <div class="modal-body">
                      <h5><b>Apakah Anda yakin dengan pilihan anda ?</b></h5>
                      <p style="font-size:18px">Anda memilih <b><?php echo $row->nama; ?></b> Nomor Urut <b><?php echo $row->nourut; ?><b></p>
                    </div>
                    <div class="modal-footer">
                      <a href="<?php echo site_url().'vote/dovote/'.$row->nourut ;?>" class="btn btn-primary">YAKIN</a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            <?php } ?>
             

            <center>
              <p><strong>Cara Memilih : Klik Foto Calon Ketua</strong></p>
            </center>   
          </fieldset>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <center>
      <p><a href="http://www.facebook.com/jabiralhayyan" target="_blank">Jabir Al Hayyan</a> © 2017 Copyright All Right Reserved
        <br> Email : jabiralhaiyan@gmail.com | WA : +62896 7909 3686
      </p>
    </center>
  </footer>

</div>

</body>

</html>





