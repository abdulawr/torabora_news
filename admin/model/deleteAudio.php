<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
include("../../include/HelperFunction.php");
if(isset($_GET["id"])){
$file=DBHelper::get("select * from audio where id = {$_GET["id"]}")->fetch_assoc();
unlink("../../audio/".$file["audio_file"]);
if(DBHelper::set("delete from audio where id={$_GET["id"]}")){
    ?>
  <script>alert("Successfully deleted!"); location.href="../ShowAudioList.php";</script>
    <?php
}
else{
    ?>
    <script>alert("Something went wrong try again"); location.href="../ShowAudioList.php";</script>
      <?php  
}
}
else{
    ?>
  <script>alert("ID is not provided"); location.href="../ShowAudioList.php";</script>
    <?php
}
?>