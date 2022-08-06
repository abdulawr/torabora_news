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

            <p class="text-danger">Image should not be wihtout background I suggest image with  width= 300 and height = 300</p>
            <form method="post" enctype="multipart/form-data">
              
                <div class="row">
                    <div class="col">
                    <input required name="title" type="text" class="form-control"  placeholder="Video Title">
                    </div>
                    <div class="col">
                    <input required name="vide_id" type="text" class="form-control"  placeholder="Youtube Video ID">
                    </div>
                </div>

                <div class="form-group mt-3">
                  <label for="exampleFormControlSelect1">Select Video Category</label>
                  <select name="cat" style="direction:rtl" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                    $cat=DBHelper::get("select * from video_cat order by id asc");
                    while($row=$cat->fetch_assoc()){
                      ?>
                         <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="row mt-3">
                    <div class="col">
                    <label for="">Video Description</label>
                    <textarea required name="des" type="text" class="form-control" rows="3"  placeholder="Company Name"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
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
 $video_id=validateInput($_POST["vide_id"]);
 $des=validateInput($_POST["des"]);
$cat=$_POST["cat"];

 $file=$_FILES["file"]['tmp_name'];
 list($width,$height)=getimagesize($file);
 $nwidth=300; $nheight=300;
 $newImg=imagecreatetruecolor($nwidth,$nheight);
 $fileType = $_FILES['file']['type'];
 $imgName="";
 $check=false;

  if($fileType == "image/jpeg")
    {
    $source=imagecreatefromjpeg($file);
    $imgName="Video_".$video_id.".jpg";
    imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
    imagejpeg($newImg,'../images/video/'.$imgName);
    $check=true;
    }
    elseif($fileType == "image/png")
    {
        $source=imagecreatefrompng($file);
        $imgName="Video_".$video_id.".png";
        imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        imagepng($newImg,'../images/video/'.$imgName);
        $check=true;
    }
    else{
      $check=false;
      ?>
       <script>
        var success=$("#success");
        var error=$("#error");
        success.addClass("d-none")
        error.addClass("d-block")
        error.text("File type is not supported!")
      </script>
      <?php
    }

    if($check){
     if(DBHelper::set("INSERT INTO `video`(`title`, `des`, `video_id`,`image`,video_cat) VALUES ('{$title}','{$des}','{$video_id}','{$imgName}',$cat)")){
      ?>
      <script>
       var success=$("#success");
       var error=$("#error");
       error.addClass("d-none")
       success.addClass("d-block")
       success.text("Video upload successfully");
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
       error.text("Value is not inserted in database try again")
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
       error.text("Error occurred in image uploading try again!");
     </script>
     <?php 
    }

 }

?>
