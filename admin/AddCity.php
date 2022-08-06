<?php $page="profile"; include("include/header.php"); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include("include/nav.php"); ?>
<?php include("include/sider.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title">Add New City</h3>
        </div>
        <div class="card-body">
            <!-- Main content here -->

            <div id="success" class="alert alert-success d-none" role="alert">
              A simple success alert—check it out!
            </div>
            <div id="error" class="alert alert-danger d-none" role="alert">
              A simple danger alert—check it out!
            </div>

            <form method="post">
                <div class="row">
                    <div class="col">
                    <input required name="name" type="text" class="form-control"  placeholder="Name">
                    </div>
                    
                </div>

                <button name="submit" class="mt-3 btn btn-outline-dark">Submit</button>

            </form>


        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>


<?php
if(isset($_POST["submit"])){
  $name=validateInput($_POST["name"]);
  if(DBHelper::set("INSERT INTO `city`(`name`) VALUES ('{$name}')"))
  {
    ?>
    <script>
        var success=$("#success");
        var error=$("#error");
        error.addClass("d-none")
        success.addClass("d-block")
        success.text("Successfully submitted!")
    </script>
    <?php
  }
  else{
    ?>
    <script>
        var success=$("#success");
        var error=$("#error");
        success.addClass("d-none")
        error.addClass("d-block")
        error.text("Something went wrong try again || Name already exist")
    </script>
    <?php
  }
}
?>
