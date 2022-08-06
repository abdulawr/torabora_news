<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
include("../../include/HelperFunction.php");
if(isset($_GET["id"])){
if(DBHelper::set("delete from video where id={$_GET["id"]}")){
    ?>
  <script>alert("Successfully deleted!"); location.href="../videoList.php";</script>
    <?php
}
else{
    ?>
    <script>alert("Something went wrong try again"); location.href="../videoList.php";</script>
      <?php  
}
}
else{
    ?>
  <script>alert("ID is not provided"); location.href="../videoList.php";</script>
    <?php
}
?>