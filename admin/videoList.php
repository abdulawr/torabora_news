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
              <div class="card-header bg-teal">
                <h3 class="card-title ">Video List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Video ID</th>
                    <th>View</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                  $em=DBHelper::get("SELECT * FROM video order by id desc");
                  if($em->num_rows > 0){
                      while($row=$em->fetch_assoc()){
                        ?>
                  <tr>
                    <td><img style="border-radius: 20px;" width="50" height="50" src="../images/video/<?php echo $row["image"];?>"></td>
                    <td class="text-right"><?php echo $row["title"];?></td>
                    <td><?php echo $row["video_id"];?></td>
                    <td><?php echo $row["view"];?></td>
                    <td><?php echo $row["date"];?></td>
                    <td>
                    <a href="EditVideo.php?id=<?php echo $row["id"];?>" class="btn-sm btn-warning">Edit</a>
                    <a href="model/deleteVideo.php?id=<?php echo $row["id"];?>" class="btn-sm btn-danger" style="margin-top: 10px;">Delete</a>
                    </td>
                  </tr>
                        <?php
                      }
                  }
                  ?>  
                                 
                  </tbody>
                </table>
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
