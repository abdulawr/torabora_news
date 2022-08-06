<?php $page="info"; include("include/header.php"); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include("include/nav.php"); ?>
<?php include("include/sider.php"); 
$video=DBHelper::get("select * from video where id={$_GET["id"]}")->fetch_assoc();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-success">
          <h3 class="card-title">Upload New Video</h3>
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
                    <input style="direction:rtl" value="<?php echo $video["title"];?>" required name="title" type="text" class="form-control"  placeholder="Video Title">
                    </div>
                    <div class="col">
                    <input value="<?php echo $video["video_id"];?>" required name="vide_id" type="text" class="form-control"  placeholder="Youtube Video ID">
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col">
                    <label for="">Video Description</label>
                    <textarea style="direction:rtl" required name="des" type="text" class="form-control" rows="3"  placeholder="Company Name">
                    <?php echo $video["des"];?>
                    </textarea>
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

 $title=$_POST["title"];
 $video_id=validateInput($_POST["vide_id"]);
 $des=validateInput($_POST["des"]);

 if(DBHelper::set("UPDATE video set title='{$title}', des='{$des}', video_id='{$video_id}' WHERE id ={$_GET["id"]}"))
 {
    ?>
  <script>
   alert('Successfully updated!');
   location.href="videoList.php"
 </script>
 <?php
 }
 else{
  ?>
  <script>
   alert('Something went wrong try again');
 </script>
 <?php
 }
}

?>
