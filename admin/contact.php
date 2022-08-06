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
              <div class="card-header bg-info">
                <h3 class="card-title ">Subscriber List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $email=DBHelper::get("select * from contact order by id desc");
                  if($email->num_rows > 0){
                      while($row=$email->fetch_assoc()){
                          ?>
                    <tr>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["subject"];?></td>
                    <td><a href="View_Email.php?id=<?php echo $row["id"];?>" class="btn-sm bg-info">Details</a>
                     <?php if($row["status"] == 0){?>
                     <small class="ml-2 bg-success p-1">Replayed</small>
                     <?php } ?>
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
