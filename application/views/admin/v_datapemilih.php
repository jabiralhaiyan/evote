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
    
    if ($tambah_data_berhasil)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$tambah_data_berhasil.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
    if ($hapus_data_berhasil)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$hapus_data_berhasil.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
    if ($reset_suara_berhasil)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$reset_suara_berhasil.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
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
        Report Data Pemilih
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-home"></i> Home</a></li>
        <li><a class="active" href="<?php echo site_url(); ?>admin/datapemilih"><i class="fa fa-file"></i> Report Data Pemilih</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pemilih yang Didaftarkan</span>
              <span class="info-box-number"><?php echo $jumlahpemilih; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-pencil"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemilih yang Sudah Voting</span>
              <span class="info-box-number"><?php echo $jumlahpemilihvoting; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-minus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemilih yang Belum Voting</span>
              <span class="info-box-number"><?php echo $jumlahpemilihbelumvoting; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Pemilih</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?php echo site_url(); ?>admin/dotambahpemilih">
              <div class="input-group">
                <input type="number" name="inputDataPemilih" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Tambah</button>
                    </span>
              </div>
              </form>
              <p>NB : Silahkan masukkan jumlah pemilih yang ingin didaftarkan <br>
              Sistem akan mengenerate ID dan Password secara otomatis</p>
            </div>
          </div>
          <!-- /.box -->
          </div>

          <div class="col-md-4">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ekspor Data Pemilih</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p>Silahkan Download data pemilih berupa id dan password ke dalam file excel apabila sudah ditambahkan jumlah pemilih.</p>
              <div>
                  <center>
                      <a href="<?php echo site_url(); ?>admin/docetakexcel" class="btn btn-info btn-lg">Download Data Pemilih</a>
                  </center>
              </div>
            </div>
          </div>
          <!-- /.box -->
          </div>

          </div>
      <!-- /.row -->
          <div class="row">
          <div class="col-md-4">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reset Suara & Hapus Data Pemilih</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                  <p>Reset suara digunakan untuk mengkosongkan seluruh suara yang telah masuk</p>
                  <!--<a href="<?php echo site_url(); ?>admin/doresetsuara" class="btn btn-danger btn-lg">Reset Suara</a>-->

                  <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#resetsuara">Reset Suara</button>

                  <br><br>
                  <p>Hapus data pemilih digunakan untuk menghapus seluruh data pemilih</p>
                  <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#hapusdatapemilih">Hapus Data Pemilih</button>
              </div>
            </div>
          </div>
          <!-- /.box -->
          </div>
          </div>
        
        <!-- /.col -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

 <!-- Modal Reset Suara -->
<div class="modal fade" id="resetsuara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Suara</h4>
      </div>
      <form role="form" method="post" action="<?php echo site_url(); ?>admin/doresetsuara">
        <div class="modal-body">
          
          <div class="box-body">
            <p>Silahkan masukkan 2nd password untuk mereset hasil suara ?</p>
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


<!-- Modal Hapus Data Pemilih -->
<div class="modal fade" id="hapusdatapemilih" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data Pemilih</h4>
      </div>
      <form role="form" method="post" action="<?php echo site_url(); ?>admin/dohapusdatapemilih">
        <div class="modal-body">
          
          <div class="box-body">
            <p>Silahkan masukkan 2nd password untuk menghapus data pemilih ?</p>
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
