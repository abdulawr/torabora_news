<?php $page="info"; include("include/header.php"); ?>
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
        <div class="card-header bg-warning">
          <h3 class="card-title">Upload New Audio</h3>
        </div>
        <div class="card-body">
            <!-- Main content here -->

            <div id="success" class="alert alert-success d-none" role="alert">
              A simple success alert—check it out!
            </div>
            <div id="error" class="alert alert-danger d-none" role="alert">
              A simple danger alert—check it out!
            </div>

            <p class="text-danger">Audio file must be MP3 format</p>
            <form method="post" enctype="multipart/form-data">
              
                <div class="row">
                    <div class="col">
                    <input style="direction: rtl;" required name="title" type="text" class="form-control"  placeholder="Audio Title">
                    </div>
                </div>

                <div class="form-check mt-3">
                <input name="fav" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Make it favourite (To be show on main page in playing mode)
                </label>
              </div>                

                <div class="row mt-3">
                    <div class="col">
                    <label for="">Select Audio File</label>
                    <input required name="file" type="file" class="form-control-file" placeholder="Company Name">
                    </div>
                </div>

                <button name="submit" class="mt-3 btn btn-outline-info">Upload</button>

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
 $file=$_FILES["file"];
 $fav=0;
 if(isset($_POST["fav"])){
  $fav=$_POST["fav"];
 }
 $valid_formats1 = array("mp3", "ogg", "flac","mpeg");
 $type=explode("/",$file["type"])[1];
 if(in_array($type,$valid_formats1)){
   $audio_Name="Audio_".generateRandomString()."__".".".$type;
   if(move_uploaded_file($file["tmp_name"],"../audio/".$audio_Name)){
    if(DBHelper::set("INSERT INTO `audio`(`title`,`audio_file`,fav) VALUES ('{$title}','{$audio_Name}',$fav)")){
        echo $con->error;
        ?>
        <script>
         var success=$("#success");
         var error=$("#error");
         error.addClass("d-none")
         success.addClass("d-block")
         success.text("Audio upload successfully");
       </script>
       <?php
    }
    else{
        unlink("../audio/".$audio_Name);
        ?>
        <script>
         var success=$("#success");
         var error=$("#error");
         success.addClass("d-none")
         error.addClass("d-block")
         error.text("Something went wrong try again!")
       </script>
       <?php    
    }
   }
   else{
    ?>
    <script>
     var success=$("#success");
     var error=$("#error");
     success.addClass("d-none")
     error.addClass("d-block")
     error.text("File can`t be upload try again!")
   </script>
   <?php  
   }
 }
 else{
    ?>
    <script>
     var success=$("#success");
     var error=$("#error");
     success.addClass("d-none")
     error.addClass("d-block")
     error.text("Invalid file format")
   </script>
   <?php
 }
}

function generateRandomString($length = 40) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString."_".time();
}
?>
