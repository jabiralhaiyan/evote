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

    if ($tambah_calonketua_berhasil)
    {
      echo
      '<div class="row">'.
      '<div class="col-md-3">'.'</div>'.  
      '<div class="col-md-6">'.
      '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$tambah_calonketua_berhasil.'</h5>'.
      '</div>'.
      '</div>'.
      '</div>';
    }
    if ($hapus_berhasil)
    {
      echo
      '<div class="row">'.
      '<div class="col-md-3">'.'</div>'.  
      '<div class="col-md-6">'.
      '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$hapus_berhasil.'</h5>'.
      '</div>'.
      '</div>'.
      '</div>';
    }
    if ($update_berhasil)
    {
      echo
      '<div class="row">'.
      '<div class="col-md-3">'.'</div>'.  
      '<div class="col-md-6">'.
      '<div class="alert alert-success alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-check"></i>'.$update_berhasil.'</h5>'.
      '</div>'.
      '</div>'.
      '</div>';
    }
    if ($nourut_sudah_dipakai)
    {
      echo
      '<div class="row">'.
      '<div class="col-md-3">'.'</div>'.  
      '<div class="col-md-6">'.
      '<div class="alert alert-warning alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-warning"></i>'.$nourut_sudah_dipakai.'</h5>'.
      '</div>'.
      '</div>'.
      '</div>';
    }
    if ($upload_foto_gagal)
    {
      echo
      '<div class="row">'.
      '<div class="col-md-3">'.'</div>'.  
      '<div class="col-md-6">'.
      '<div class="alert alert-danger alert-dismissible">'.
      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">'.'&times;'.'</button>'.
      '<h5>'.'<i class="icon fa fa-ban"></i>'.$upload_foto_gagal.'</h5>'.
      '</div>'.
      '</div>'.
      '</div>';
    }
    ?>
    <h1>
      Calon Ketua
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-home"></i> Home</a></li>
      <li><a class="active" href="<?php echo site_url(); ?>admin/calonketua"><i class="fa fa-user"></i> Calon Ketua</a></li>
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
            <h3 class="box-title">Tambah Calon Ketua</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#tambahcalonketua"><i class="fa fa-plus"></i> Tambah Calon Ketua</button>

            <table class="table table-bordered">
              <tr>
                <th >Nomor Urut</th>
                <th >Nama</th>
                <th >Foto</th>
                <th >Action</th>
              </tr>
              <?php
              foreach($query->result() as $row) { ?>
              <tr>
                <td><?php echo $row->nourut ;?></td>
                <td><?php echo $row->nama ;?></td>
                <td>
                  <img src="<?php
                  if($row->foto==NULL)
                  {
                    echo base_url().'assets2/img/default-foto.png';
                  }
                  else{
                    echo base_url().'assets/profpic/'.$row->foto;
                  }
                  ?>"
                  alt="..." width="150px" height="144px"">
                </td>
                <td>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editcalonketua<?php echo $row->idcalonketua; ?>"><i class="fa fa-pencil"></i> Edit</button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapuscalonketua<?php echo $row->idcalonketua; ?>"><i class="fa fa-danger"></i> Hapus</button>


                  <!-- Modal Edit Calon Ketua-->
                  <div class="modal fade" id="editcalonketua<?php echo $row->idcalonketua; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit Calon Ketua</h4>
                        </div>
                        <form role="form" method="post" action="<?php echo site_url().'admin/doeditcalonketua/'.$row->idcalonketua; ?>" enctype="multipart/form-data">
                          <div class="modal-body">

                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputNoUrut">Nomor Urut <span style="color:red;">*</span></label>
                                <input type="number" class="form-control" name="inputNoUrut" value="<?php echo $row->nourut ;?>" id="inputNoUrut" placeholder="" required readonly>
                              </div>
                              <div class="form-group">
                                <label for="inputNama">Nama Lengkap <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="inputNama" value="<?php echo $row->nama ;?>" id="inputNama" placeholder="" required>
                              </div>
                              <label>Foto <span style="color:red;">*</span></label>
                              <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php
                                    if($row->foto==NULL)
                                    {
                                      echo base_url().'assets2/img/default-foto.png';
                                    }
                                    else{
                                      echo base_url().'assets/profpic/'.$row->foto;
                                    }
                                    ?>"
                                    alt="..." width="150px" height="144px"">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                    <input type="file" name="fileFoto" id="fileFoto"></span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>

                                  <ul>
                                    <li>Foto close up berwarna dengan wajah terlihat jelas dan pakaian rapi</li>
                                    <li>Foto diunggah dalam format jpg|jpeg|png</li>
                                    <li>Foto memiliki rasio 4x6 dengan ukuran 400 (lebar) x 600 (tinggi) pixel</li>
                                    <li>Ukuran file maksimum 1 MB</li>
                                  </ul>

                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Simpan</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Hapus Calon Ketua-->
                    <div class="modal fade" id="hapuscalonketua<?php echo $row->idcalonketua; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Hapus Calon Ketua</h4>
                          </div>
                          <div class="modal-body">
                            <div class="box-body">
                              <p>Apakah anda yakin ingin menghapus Calon Ketua dengan nama <b><?php echo $row->nama ;?></b></p>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="<?php echo site_url().'admin/dohapuscalonketua/'.$row->idcalonketua; ?>" class="btn btn-danger">Ya</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                </tr>
                <?php } ?>


              </table>
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

  <!-- Modal Tambah Calon Ketua-->
  <div class="modal fade" id="tambahcalonketua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Calon Ketua</h4>
        </div>
        <form role="form" method="post" action="<?php echo base_url() ?>admin/dotambahcalonketua" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="box-body">
              <div class="form-group">
                <label for="inputNoUrut">Nomor Urut <span style="color:red;">*</span></label>
                <input type="number" class="form-control" name="inputNoUrut" id="inputNoUrut" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="inputNama">Nama Lengkap <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="inputNama" id="inputNama" placeholder="" required>
              </div>
              <label>Foto <span style="color:red;">*</span></label>
              <div class="form-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                    <input type="file" name="fileFoto" id="fileFoto"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>

                  <ul>
                    <li>Foto close up berwarna dengan wajah terlihat jelas dan pakaian rapi</li>
                    <li>Foto diunggah dalam format jpg|jpeg|png</li>
                    <li>Foto memiliki rasio 4x6 dengan ukuran 400 (lebar) x 600 (tinggi) pixel</li>
                    <li>Ukuran file maksimum 1 MB</li>
                  </ul>

                </div>
              </div>
            </div>
            <!-- /.box-body -->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary">Simpan</a>
            </div>
          </form>

        </div>
      </div>
    </div>


    <?php
    require_once('layout/footer.php'); 
    ?>
