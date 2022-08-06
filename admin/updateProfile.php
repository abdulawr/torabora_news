<?php $page="profile"; include("include/header.php"); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include("include/nav.php"); ?>
<?php include("include/sider.php"); 
$admin=DBHelper::get("SELECT * from admin;")->fetch_assoc();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">Update Profile Data</h3>
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
                    <input name="name" type="text" class="form-control" value="<?php echo $admin["name"];?>" placeholder="Name">
                    </div>
                    <div class="col">
                    <input name="email" type="email" class="form-control" value="<?php echo $admin["email"];?>" placeholder="E-mail">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                    <input name="username" type="text" class="form-control" value="<?php echo $admin["username"];?>" placeholder="Username">
                    </div>
                    <div class="col">
                    <input name="password" type="password" class="form-control" value="<?php echo Encryption::Decrypt($admin["password"]);?>" placeholder="Mobile">
                    </div>
                </div>

                <button name="submit" class="mt-3 btn btn-outline-dark">Update</button>

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
  $username=$_POST["username"];
  $password=Encryption::Encrypt($_POST["password"]);
  if(DBHelper::set("UPDATE `admin` SET `name`='{$name}',`email`='{$email}',`username`='{$username}',`password`='{$password}'"))
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
