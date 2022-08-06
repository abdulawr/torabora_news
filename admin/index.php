<?php 
session_start();
include("../include/conn.php");
include("../include/DBHelper.php");
include("../include/Encryption.php");
include("../include/HelperFunction.php");

if(isset($_SESSION["isAdminLogin"])){
?>
<script>location.href="dashboard";</script>
<?php
}

if(isset($_GET["error"])){
  ?>
<script>alert("Direct access is not allowed")</script>
  <?php
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>توره بوړه وېبپاڼه</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <style>
   video{
    position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
   }
  </style>


</head>
<body class="hold-transition login-page">

<video autoplay muted loop id="myVideo">
  <source src="dist/back.mp4" type="video/mp4">
</video>

<div class="login-box" >
  <div class="login-logo">
    <a href="#"><b>توره بوړه وېبپاڼه</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-left: 5px solid #0069D9;">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input name="username" required type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" required type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="submit" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
  $username=$_POST["username"];
  $password=Encryption::Encrypt($_POST["password"]);
  $query=DBHelper::get("SELECT * from admin WHERE username='{$username}' and password='{$password}'");
  if($query->num_rows > 0)
  {
   $_SESSION["isAdminLogin"]=$query->fetch_assoc()["id"];
   ?>
   <script>location.href="dashboard";</script>
   <?php
  }
  else{
    ?>
    <script>alert("Invalid username or password");</script>
    <?php
  }
}
?>
