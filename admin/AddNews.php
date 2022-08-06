<?php $page="profile"; include("include/header.php"); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include("include/nav.php"); ?>
<?php include("include/sider.php"); 
$cat=DBHelper::get("select * from news_cat order by id asc");
$city=DBHelper::get("select * from city order by id asc");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">Write News</h3>
        </div>
        <div class="card-body">
            <!-- Main content here -->

            <div id="success" class="alert alert-success d-none" role="alert">
              A simple success alert—check it out!
            </div>
            <div id="error" class="alert alert-danger d-none" role="alert">
              A simple danger alert—check it out!
            </div>
            <p class="text-danger">I suggest an image with background and image width = 668px and height = 328px</p>
            <form method="post" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col">
                    <label for="">Title</label>
                    <input maxlength="255" style="direction: rtl; text-align:right"  required name="title" type="text" class="form-control"  placeholder="Title">
                    </div>

                    <div class="col">
                    <label for="">Select Category</label>
                    <select name="cat_id" required class="form-control" id="exampleFormControlSelect1">
                    <?php 
                    while($row=$cat->fetch_assoc()){
                     ?>
                       <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                     <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col">
                    <label for="">Select Type</label>
                    <select name="new_type" required class="form-control" id="exampleFormControlSelect1">
                    <option value="0">News</option>
                    <option value="1">Headline</option>
                    </select>
                    </div>

                    <div class="col">
                    <label for="">Select Location</label>
                    <select name="location" required class="form-control" id="exampleFormControlSelect1">
                    <?php 
                    while($row=$city->fetch_assoc()){
                     ?>
                       <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                     <?php
                    }
                    ?>
                    </select>
                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col">
                       
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description (/// for paragraph and ///# for heading) eg. ///دا ناسته د ادارې لخوا د نړۍ</label>
                        <textarea style="direction: rtl; text-align:right" name="des" required class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                       
                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col">
                    <input required name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
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
<script src="plugins/summernote/summernote-bs4.min.js"></script>

</body>
</html>


<?php
if(isset($_POST["submit"])){
 
 $file=$_FILES["file"]['tmp_name'];
 list($width,$height)=getimagesize($file);
 $nwidth=668; $nheight=328;
 $newImg=imagecreatetruecolor($nwidth,$nheight);
 $fileType = $_FILES['file']['type'];
 $imgName="";
 $check=false;
 $title=validateInput($_POST["title"]);
 $cat_id=$_POST["cat_id"];
 $new_type=$_POST["new_type"];
 $location=$_POST["location"];

    if($fileType == "image/jpeg")
    {
    $source=imagecreatefromjpeg($file);
    $imgName="News_".$cat_id."_".generateRandomString()."__".generateRandomString().".jpg";
    imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
    imagejpeg($newImg,'../images/news/'.$imgName);
    $check=true;
    }
    elseif($fileType == "image/png")
    {
        $source=imagecreatefrompng($file);
        $imgName="News_".$cat_id."_".generateRandomString()."__".generateRandomString().".png";
        imagecopyresized($newImg,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        imagepng($newImg,'../images/news/'.$imgName);
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

        $des=explode("///",$_POST["des"]);
        $des_json="";
        $i=0;
        foreach($des as $val){
            if(strpos($val,"#") !== false){
                if($val != ""){
                    $val=str_replace("#","",$val);
                    $newstr="<h4>".$val."</h4>";
                    $des_json.=htmlentities($newstr) ."||";
                  
                } 
            }
            else{
                if($val != ""){
                    $newstr="<p>".$val."</p>";
                    $des_json.=htmlentities($newstr) ."||";
                 
                }
            }
            $i++;
        }
       // $des_json = json_encode($array);
        $des_json=$con->real_escape_string($des_json);
       if(DBHelper::set("INSERT INTO `news`(`title`, `news_cat`, `news_type`, `location_id`, `des`, `image`) VALUES ('{$title}',$cat_id,$new_type,$location,'{$des_json}','{$imgName}')")){
        ?>
        <script>
         var success=$("#success");
         var error=$("#error");
         error.addClass("d-none")
         success.addClass("d-block")
         success.text("Successfully submitted!");
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


function generateRandomString($length = 60) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString."_".time();
}

?>
