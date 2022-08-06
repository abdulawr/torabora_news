<?php $page="profile"; include("include/header.php"); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include("include/nav.php"); ?>
<?php include("include/sider.php"); 
$cat=DBHelper::get("select * from blog_cat order by id asc");
$blog=DBHelper::get("select * from blog where id={$_GET["id"]}")->fetch_assoc();
$body=$blog["body"];
$body=str_replace("||","",$body);
$body=str_replace("/p&gt;","///",$body);
$body=str_replace("/h4&gt;","#///",$body);
$body=str_replace("p","",$body);
$body=str_replace("h4","",$body);
$body=str_replace("&lt;","",$body);
$body=str_replace("&gt;","",$body);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-warning">
          <h3 class="card-title">Edit Blog</h3>
        </div>
        <div class="card-body">
            <!-- Main content here -->

            <div id="success" class="alert alert-success d-none" role="alert">
              A simple success alert—check it out!
            </div>
            <div id="error" class="alert alert-danger d-none" role="alert">
              A simple danger alert—check it out!
            </div>
           
            <form method="post" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col">
                    <label for="">Title</label>
                    <input style="direction: rtl; text-align:right"  required name="title" type="text" class="form-control" value="<?php echo $blog["title"];?>"  placeholder="Title">
                    </div>

                    <div class="col">
                    <label for="">Select Category</label>
                    <select id="optionsss" name="cat_id" required class="form-control" id="exampleFormControlSelect1">
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
                       
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description (/// for paragraph and ///# for heading) eg. ///دا ناسته د ادارې لخوا د نړۍ</label>
                        <textarea style="direction: rtl; text-align:right" name="des" required class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $body;?></textarea>
                    </div>
                       
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

<script>
var cat_id="<?php echo $blog["cat_id"]; ?>";
$("#optionsss").val(cat_id);
</script>

</body>
</html>


<?php
if(isset($_POST["title"]) && isset($_POST["cat_id"]) && isset($_POST["des"])){

    $title=$_POST["title"];
    $cat_id=$_POST["cat_id"];

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
        $des_json=$con->real_escape_string($des_json);

        if(DBHelper::set("UPDATE `blog` SET title='{$title}', cat_id=$cat_id, body='{$des_json}' WHERE id={$_GET["id"]}")){
            ?>
            <script>
             var success=$("#success");
             var error=$("#error");
             error.addClass("d-none")
             success.addClass("d-block")
             success.text("Successfully updated!");
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
