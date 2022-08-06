<?php include("include/header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <?php include("include/nav.php");
   include("include/sider.php");
   $blog=DBHelper::get("SELECT * from blog where id={$_GET["id"]};")->fetch_assoc();
   $comment=DBHelper::get("SELECT * from blog_comment where blog_id={$_GET["id"]}")
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

              <h2>Blog</h2>
              
              <div class="row">
                  <div class="col-6 p-4" style="height:auto; border-right:2px dotted #09c;">
                  <img class="img-fluid" src="../images/blog/<?php echo $blog["image"];?>" alt="">
                  <div class="shadow mt-4 mb-2 p-3">
                  <h4 class="text-bold text-right"><?php echo $blog["title"];?></h4>
                  <p><b>Date: </b><?php echo $blog["date"];?></p>
                  <p><b>View: </b><?php echo $blog["view"];?></p>
                  <a href="model/deletBlog.php?id=<?php echo $blog["id"];?>" class="btn btn-outline-danger">Delete</a>
                  </div>
                  </div>


                  <div class="col-6 p-3 containersdf">
                     
                      <?php
                     $json=$blog["body"];
                     $json=str_replace("&lt;","<",$json);
                     $json=str_replace("&gt;",">",$json);
                     $array=explode("||",$json);
                     foreach($array as $value){
                       echo $value;
                     }
              ?>
                  </div>
                  
              </div>
             


            <div class="row">

            <h2>User Comment</h2>
            <div class="col-12">
            <table  id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Comment</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php 
              
                if($comment->num_rows > 0){
                    while($row=$comment->fetch_assoc()){
                      ?>
                <tr>
                  <td><?php echo $row["name"];?></td>
                  <td><?php echo $row["email"];?></td>
                  <td><?php echo $row["comment"];?></td>
                  <td><?php echo $row["date"];?></td>
                  <td>
                  <a href="model/deleteComment.php?comment_id=<?php echo $row["id"]."&blog_id=".$blog["id"];?>" class="btn-sm btn-danger">Delete</a>
                  <?php
                  if($row["status"] == 0){
                    ?>
                   <a href="model/ChangeBlogCommentStatus.php?comment_id=<?php echo $row["id"]."&blog_id=".$blog["id"];?>" class="btn-sm btn-success">Approve</a>
                    <?php
                  }
                  ?>
                  </td>
                </tr>
                      <?php
                    }
                }
                ?>  
                              
                </tbody>
              </table>
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
