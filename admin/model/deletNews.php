<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
include("../../include/HelperFunction.php");
if(isset($_GET["id"])){
DBHelper::set("DELETE from blog_comment WHERE news_id={$_GET["id"]}");
if(DBHelper::set("delete from news where id={$_GET["id"]}")){
    ?>
  <script>alert("Successfully deleted!"); location.href="../NewsList.php";</script>
    <?php
}
else{
    ?>
    <script>alert("Something went wrong try again"); location.href="../NewsList.php";</script>
    <?php  
}
}
else{
    ?>
  <script>alert("ID is not provided"); location.href="../NewsList.php";</script>
    <?php
}
?>