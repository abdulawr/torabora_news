<?php
include("../../include/conn.php");
include("../../include/DBHelper.php");
include("../../include/Encryption.php");
include("../../include/HelperFunction.php");
if(isset($_POST["submit"])){

$id=$_POST["id"];
$name=$_POST["name"];
$emailTo=$_POST["email"];
$subject=$_POST["subject"];
$msg=$_POST["message"];

$to = $emailTo;
$subject = $subject;
$from = 'info@torabora.net';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = "Hello, ".$name.", \n".$msg;
 
// Sending email
$check=mail($to, $subject, $message, $headers);
if($check){
    DBHelper::set("UPDATE contact SET status=0 WHERE id=$id");
    ?>
   <script>id="<?php echo $id;?>";
     alert("Successfully sended!"); location.href="../View_Email.php?id="+id;</script>
  <?php
} else{
  ?>
   <script>id="<?php echo $id;?>";
     alert("Something went wrong try again / check email address may be wrong!"); location.href="../View_Email.php?id="+id;</script>
  <?php
}

}
?>