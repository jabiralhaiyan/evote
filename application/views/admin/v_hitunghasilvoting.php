<?php
require_once('layout/head.php'); 
require_once('layout/navbar.php');
require_once('layout/sidebar.php'); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Perolehan Hasil Voting
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url(); ?>admin/hasilvoting"><i class="fa fa-bar-chart"></i> Hasil Voting</a></li>
      <li><a class="active" href="<?php echo site_url(); ?>admin/hitunghasilvoting"><i class="fa fa-bar-chart"></i> Hasil Voting</a></li>

    </ol>
  </section>


    <?php
    $urut=0;
    foreach($jumlahvoting->result() as $row ){ ?>
      <?php $jumlah[$urut] =  $row->jumlahvoting; ?>
    <?php $urut++;}?>


  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Perolehan Hasil Voting</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

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
            <!--Looping Calon Ketua-->
            <?php
            $i=0;
            foreach($query->result() as $row) { ?>
            <div class="col-sm-6 col-md-<?php echo $md; ?>">
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
                    <h4><strong><?php echo $row->nama; ?></strong></h4>
                  </div>
                </center>

              <form name="Form<?php echo $i; ?>">
                <center><input style="font-size: 30px;font-weight:bold;" type="text" class="btn btn-danger" name="Field<?php echo $i; ?>" value="0" readonly></center>
              </form>

              <script type="text/javascript">
                var counter<?=$i;?>=document.Form<?=$i;?>.Field<?=$i;?>.value = 0
                function PSCounter<?=$i;?>() {
                 if (counter<?=$i;?> != <?=$jumlah[$i]?> ){
                  counter<?=$i;?> += 1
                  document.Form<?=$i;?>.Field<?=$i;?>.value = counter<?=$i;?>
                }
                setTimeout("PSCounter<?=$i;?>()",700) 
              }
              PSCounter<?=$i;?>()
              </script>

              </div>

            </div>
            <?php $i++; } ?>

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

<script>

</script>

<?php
require_once('layout/footer.php');
?>
