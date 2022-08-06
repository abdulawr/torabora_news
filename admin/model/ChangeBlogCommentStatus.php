<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
include("../../include/HelperFunction.php");
if(isset($_GET["comment_id"])){
if(DBHelper::set("update `blog_comment` set status=1 WHERE id={$_GET["comment_id"]}")){
    ?>
  <script> var blog_id="<?php echo $_GET["blog_id"];?>"; 
  alert("Successfully deleted!"); location.href="../ViewBlog.php?id="+blog_id;</script>
    <?php
}
else{
    ?>
    <script>blog_id="<?php echo $_GET["blog_id"];?>";
     alert("Something went wrong try again"); location.href="../ViewBlog.php?id="+blog_id;</script>
      <?php  
}
}
else{
    ?>
  <script>blog_id="<?php echo $_GET["blog_id"];?>";
   alert("ID is not provided"); location.href="../ViewBlog.php?id="+blog_id;</script>
    <?php
}
?>