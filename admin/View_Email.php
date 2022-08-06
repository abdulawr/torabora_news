<?php include("include/header.php");
?>
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
      <?php
              $email=DBHelper::get("select * from contact where id={$_GET["id"]}")->fetch_assoc();
             
        ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title "><?php echo $email["name"];?></h3>
              </div>
             
              <!-- /.card-header -->
              <div class="card-body">
              <h3 class="text-center">User Query</h3>
              <hr>
              <p><b>Email: </b> <?php echo $email["email"];?></p>
              <p><b>Subject: </b> <?php echo $email["subject"];?></p>
              <p><b>Message: </b> <?php echo $email["message"];?></p>

               <br>
              <hr>
              <h3 class="text-center">Replay</h3>
              <hr>

              <form class="pl-lg-5 pr-lg-5 pl-md-5 pr-md-5" method="post" action="email/sendMail.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Subject</label>
                <input name="subject" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Suject">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea name="message" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

              <input name="id" type="hidden" value="<?php echo $_GET["id"];?>">
              <input name="name" type="hidden" value="<?php echo $email["name"];?>">
              <input name="email" type="hidden" value="<?php echo $email["email"];?>">
              
              <button name="submit" type="submit" class="btn btn-success">Send</button>
            </form>
          
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
