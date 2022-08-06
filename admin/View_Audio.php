<?php include("include/header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <?php include("include/nav.php");
   include("include/sider.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-2">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
               <div class="row">
               <?php
               $file=DBHelper::get("select * from audio where id={$_GET["id"]}")->fetch_assoc();
               $type=explode(".",$file["audio_file"])["1"];
               ?>

               <div class="col">
               <audio preload controls style="border-radius: 20px; height:200px; background-image: url(../images/audio/5.jpg);  background-repeat: no-repeat;background-size: cover;">
                <source src="../audio/<?php echo $file['audio_file'];?>" type="audio/<?php echo $type; ?>">
                </audio> 
               </div>

               <div class="col" style="text-align: right;">
                   <p><?php echo $file["title"];?></p>
                   <p><b>View: </b><?php echo $file["view"];?></p>
                   <p><?php echo $file["date"];?></p>
                   <a download href="../audio/<?php echo $file['audio_file'];?>" class="btn btn-primary">Download</a>
                   <a href="model/deleteAudio.php?id=<?php echo $file["id"];?>" class="btn btn-danger">Delete</a>
               </div>

               </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
