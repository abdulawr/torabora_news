<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
include("../../include/HelperFunction.php");
if(isset($_GET["id"])){
DBHelper::set("DELETE from blog_comment WHERE blog_id={$_GET["id"]}");
if(DBHelper::set("delete from blog where id={$_GET["id"]}")){
    ?>
  <script>alert("Successfully deleted!"); location.href="../blogList.php";</script>
    <?php
}
else{
    ?>
    <script>alert("Something went wrong try again"); location.href="../blogList.php";</script>
    <?php  
}
}
else{
    ?>
  <script>alert("ID is not provided"); location.href="../blogList.php";</script>
    <?php
}
?>