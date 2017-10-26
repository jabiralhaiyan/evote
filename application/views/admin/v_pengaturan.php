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
  if ($update_admin_berhasil)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$update_admin_berhasil.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
    if ($update_editor_berhasil)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$update_editor_berhasil.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
    if ($password_konfirmasi_beda)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-danger alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-ban"></i>'.$password_konfirmasi_beda.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
    if ($password2nd_lama_salah)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-danger alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-ban"></i>'.$password2nd_lama_salah.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
    if ($upload_logo_gagal)
    {
      echo
      '<div class="row">'.
        '<div class="col-md-3">'.'</div>'.  
        '<div class="col-md-6">'.
       '<div class="alert alert-danger alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-ban"></i>'.$upload_logo_gagal.'</h5>'.
      '</div>'.
        '</div>'.
      '</div>';
    }
   ?>

    <h1>
      Pengaturan
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-home"></i> Home</a></li>
      <li><a class="active" href="<?php echo site_url(); ?>admin/pengaturan"><i class="fa fa-gear"></i> Pengaturan</a></li>
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
            <h3 class="box-title">Data Admin</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-4">
              <h4>Silahkan Mengganti Password</h4>
              <form action="<?php echo site_url(); ?>admin/doupdateadmin" method="post">
              <div class="form-group">
                    <label for="inputUsername">Username <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="inputUsername" value="<?php echo $username; ?>" id="inputUsername" readonly>
              </div>
               <div class="form-group">
                    <label for="inputPassword">Password<span style="color:red;">*</span></label>
                    <input type="password" class="form-control"; name="inputPassword" value="" id="inputPassword" required>
              </div>
               <div class="form-group">
                    <label for="inputKonfirmasiPassword">Konfirmasi Password<span style="color:red;">*</span></label>
                    <input type="password" class="form-control"; name="inputKonfirmasiPassword" value="" id="inputKonfirmasiPassword" required>
              </div>
              <div class="form-group">
                    <center><button type="submit" class="btn btn-primary btn-lg" >Update</button></center>
              </div>
              </form>
              </div>
              <div class="col-md-4">
              <h4>Silahkan Mengganti 2nd Password</h4>
              <form action="<?php echo site_url(); ?>admin/doupdate2ndpassword" method="post">
              <p>2nd password : digunakan untuk membuka bilik suara (hasil voting)</p>
              <div class="form-group">
                    <label for="inputPassword2nd">2nd Password Lama<span style="color:red;">*</span></label>
                    <input type="password" class="form-control"; name="inputPassword2nd" value="" id="inputPassword2nd" >
              </div>
               <div class="form-group">
                    <label for="inputPassword2ndBaru">2nd Password Baru<span style="color:red;">*</span></label>
                    <input type="password" class="form-control"; name="inputPassword2ndBaru" value="" id="inputPassword2ndBaru">
              </div>
              <div class="form-group">
                    <center><button type="submit" class="btn btn-primary btn-lg" >Update</button></center>
              </div>
              </form>
              </div>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>

        <!--Editor-->
        <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Tampilan Voting</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
              <form action="<?php echo site_url(); ?>admin/doupdateeditor" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <p><b>Logo Tampilan Evote</b></p>
                                  <div class="fileinput-new thumbnail" style="width: 350px; height: 163px;">
                                    <img src="<?php
                                    if($logo==NULL)
                                    {
                                      echo base_url().'assets/img/evote-logo.png';
                                    }
                                    else{
                                      echo base_url().'assets/img/'.$logo;
                                    }
                                    ?>"
                                    alt="..." width="350px" height="163px"">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                    <input type="file" name="fileFoto" id="fileFoto"></span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

                                  <ul>
                                    <li>Logo diunggah dalam format jpg | jpeg | png</li>
                                    <li>Ukuran file maksimum 512 Kb</li>
                                  </ul>

                                  </div>
                                </div>
                              </div>

              <div class="form-group">
                    <label for="inputJudul">Judul</label>
                    <input type="text" class="form-control"; name="inputJudul" value="<?php echo ($judul ? $judul : ""); ?>" id="inputJudul">
              </div>
               
              <div class="form-group">
                    <center><button type="submit" class="btn btn-primary btn-lg" >Update</button></center>
              </div>
              </form>
              </div>
              </div>
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




    <?php
    require_once('layout/footer.php');
    ?>
