<?php
require_once('layout/head.php'); 
require_once('layout/navbar.php');
require_once('layout/sidebar.php'); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

  <?php
  if ($password2nd_salah)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-danger alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-ban"></i>'.$password2nd_salah.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
   ?>

    <h1>
      Hasil Voting
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-home"></i> Home</a></li>
      <li><a class="active" href="<?php echo site_url(); ?>admin/hasilvoting"><i class="fa fa-bar-chart"></i> Hasil Voting</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Hasil Voting</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p>Untuk melihat perhitungan hasil voting silahkan klik tombol dibawah ini</p>
            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#lihathasilvoting"><i class="fa fa-search"></i> Lihat Perhitungan Hasil Voting</button>
            <br><br><br>

            <p>Untuk melihat grafik hasil voting silahkan klik tombol dibawah ini</p>
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#grafikhasilvoting"><i class="fa fa-bar-chart"></i> Grafik Hasil Voting</button>

            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>

      <!-- /.col -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal perhitungan hasil voting -->
<div class="modal fade" id="lihathasilvoting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Perhitungan Hasil Voting</h4>
      </div>
        <form role="form" method="post" action="<?php echo site_url(); ?>admin/dohasilvoting" target="_blank">
        <div class="modal-body">       
          <div class="box-body">
            <p>Silahkan masukkan 2nd password untuk melihat hasil suara</p>
            <div class="form-group">
              <label for="inputPassword2nd">2nd Password</label>
              <input type="password" class="form-control" name="inputPassword2nd" id="inputPassword2nd" placeholder="">
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger" >Ya</button>
          </div>
          </form>
      </div>
    </div>
  </div>


   <!-- Modal  -->
<div class="modal fade" id="grafikhasilvoting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Grafik Hasil Voting</h4>
      </div>
      <form role="form" method="post" action="<?php echo site_url(); ?>admin/dografikvoting">
        <div class="modal-body">       
          <div class="box-body">
            <p>Silahkan masukkan 2nd password untuk melihat grafik hasil voting</p>
            <div class="form-group">
              <label for="inputPassword2nd">2nd Password</label>
              <input type="password" class="form-control" name="inputPassword2nd" id="inputPassword2nd" placeholder="">
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger" >Ya</button>
          </div>
          </form>
      </div>
    </div>
  </div>


    <?php
    require_once('layout/footer.php');
    ?>
