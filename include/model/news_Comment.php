<?php
include("../conn.php");
include("../DBHelper.php");
include("../HelperFunction.php");
$name=validateInput($_POST["name"]);
$email=validateInput($_POST["email"]);
$id=validateInput($_POST["id"]);
$comment=validateInput($_POST["comment"]);
if(DBHelper::set("INSERT INTO `news_comment`(`name`, `email`, `comment`, `news_id`) VALUES ('{$name}','{$email}','{$comment}',$id)")){
    ?>
    <script>
        let id="<?php echo $id;?>"
        alert('Successfully submitted!');
        location.href="../../single_news.php?id="+id;
    </script>
   <?php
}
else{
    ?>
     <script>
         let id="<?php echo $id;?>"
         alert('Something went wrong try again');
         location.href="../../single_news.php?id="+id;
     </script>
    <?php
}
?>