<?php $page="home"; include("include/header.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include("include/nav.php");
include("include/sider.php");
$report=DBHelper::get("SELECT  (SELECT COUNT(*) FROM news) AS news,
( SELECT COUNT(*) FROM video) AS video,
( SELECT COUNT(*) FROM blog ) AS blog,
( SELECT SUM(view) FROM news) AS news_view,
( SELECT SUM(view) FROM blog) AS blog_view,
( SELECT SUM(view) FROM video) AS video_view")->fetch_assoc();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
   
    <div class="container-fluid">
        <h5 class="mb-2">Info Box</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-video"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Video</span>
                <span class="info-box-number"><?php echo $report["video"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-video"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Video Views</span>
                <span class="info-box-number"><?php echo $report["video_view"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-blog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Blogs</span>
                <span class="info-box-number"><?php echo $report["blog"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-blog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Blgo View</span>
                <span class="info-box-number"><?php echo $report["blog_view"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
    </div>


    <div class="container-fluid">
      
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-newspaper"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">News</span>
                <span class="info-box-number"><?php echo $report["news"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-newspaper"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">News View</span>
                <span class="info-box-number"><?php echo $report["news_view"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
    </div>



    </section>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
