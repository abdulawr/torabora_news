<?php $page="info"; include("include/header.php"); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include("include/nav.php"); ?>
<?php include("include/sider.php"); 
$company=DBHelper::get("SELECT * from company_info;")->fetch_assoc();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title">Update Company Infromation</h3>
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
                    <input name="name" type="text" class="form-control" value="<?php echo $company["name"];?>" placeholder="Company Name">
                    </div>
                    <div class="col">
                    <input name="email" type="email" class="form-control" value="<?php echo $company["email"];?>" placeholder="E-mail">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                    <input name="address" type="text" class="form-control" value="<?php echo $company["address"];?>" placeholder="Full Address">
                    </div>
                    <div class="col">
                    <input name="mobile" type="number" class="form-control" value="<?php echo $company["mobile"];?>" placeholder="Contact Number">
                    </div>
                </div>

                <button name="submit" class="mt-3 btn btn-outline-info">Update</button>

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
  $name=$_POST["name"];
  $email=$_POST["email"];
  $address=$_POST["address"];
  $mobile=$_POST["mobile"];
  if(DBHelper::set("UPDATE `company_info` SET `name`='{$name}',`email`='{$email}',`address`='{$address}',`mobile`='{$mobile}'"))
  {
    ?>
    <script>
        var success=$("#success");
        var error=$("#error");
        error.addClass("d-none")
        success.addClass("d-block")
        success.text("Successfully Update!")
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
        error.text("Something went wrong try again")
    </script>
    <?php
  }
}
?>
