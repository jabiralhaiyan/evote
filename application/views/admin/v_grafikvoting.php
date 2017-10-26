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
      Grafik Perolehan Hasil Voting
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url(); ?>admin/hasilvoting"><i class="fa fa-bar-chart"></i> Hasil Voting</a></li>
      <li><a class="active" href="<?php echo site_url(); ?>admin/grafikvoting"><i class="fa fa-pie-chart"></i> Grafik Perolehan Suara</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Pemilih</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <center>
                <p>Jumlah pemilih yang didaftarkan : <b><?php echo $jumlahpemilih; ?></b></p>
                <div class="chart" id="datapemilih"></div>
              </center>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>

      <div class="row">
      <!-- Left col -->
      <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Perolehan Hasil Voting</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="chart" id="perolehansuara"></div>
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


<!--Data Pemilih-->
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawPie);

function drawPie() {  
  // Data
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Jumlah Data Pemilih'],
        ['Pemilih Yang Sudah Voting', <?php echo $jumlahpemilihvoting; ?>],
        ['Pemilih Yang Belum Voting', <?php echo $jumlahpemilihbelumvoting; ?>]
    ]);
    // Options
    var options_pie = {
        fontName: 'Roboto',
        height: 300,
        width: 500,
        chartArea: {
            left: 50,
            width: '90%',
            height: '90%'
        }
    };
    // Instantiate and draw our chart, passing in some options.
    var pie = new google.visualization.PieChart($('#datapemilih')[0]);
    pie.draw(data, options_pie);
}
</script>


<!--Grafik perolehan suara-->
<script type="text/javascript">
// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawColumn);

// Chart settings
function drawColumn() {
    // Data
    var data = google.visualization.arrayToDataTable([
        ['Nomor Urut', 'Hasil Perolehan Suara'],
        <?php
        foreach($jumlahvoting->result() as $row ){
        $no_urut = $row->nourut;
        $nama = $row->nama;

        $jumlah = $row->jumlahvoting;
        $calonketua = $no_urut.'. '.$nama.' | Hasil Suara = '.$jumlah;   
        
        ?>
       ['<?php echo $calonketua; ?>',
        <?php echo $jumlah; ?>],
        <?php } ?>
    ]);

    // Options
    var options_column = {
        fontName: 'Roboto',
        height: 500,
        fontSize: 16,
        chartArea: {
            left: '5%',
            width: '90%',
            height: 250
        },
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 16
            }
        },
        vAxis: {
            title: 'Hasil Perolehan Suara',
            titleTextStyle: {
                fontSize: 16,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: <?php echo $jumlahpemilihvoting; ?>
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 16
            }
        }
    };

    // Draw chart
    var column = new google.visualization.ColumnChart($('#perolehansuara')[0]);
    column.draw(data, options_column);
}

// Resize chart
// ------------------------------

$(function () {

    // Resize chart on sidebar width change and window resize
    $(window).on('resize', resize);
    $(".sidebar-control").on('click', resize);

    // Resize function
    function resize() {
        drawColumn();
    }
});
</script>

    <?php
    require_once('layout/footer.php');
    ?>

