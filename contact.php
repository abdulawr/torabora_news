<?php 
include("include/conn.php");
include("include/DBHelper.php");
$info=DBHelper::get("SELECT * FROM company_info;")->fetch_assoc();
?>
<!DOCTYPE html >
<html lang="ur" >
    <!-- dir="rtl"    used for pashto-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>توره بوړه ويبپاڼه</title>
    
  <!--   <style>
    label{
        display: block;
        direction: rtl;
    }
    </style> -->

</head>
<body>

<div class="container shadow  rounded mt-3 mb-3">
<div style="height: 3px; width:100%" class="bg-info"></div>
<div class="row p-5">

<div class="col-md-5 col-sm-12 text-center">
  <h2><?php echo $info["name"];?></h2>
  <hr class="w-50 mx-auto">
  <h5 class="fw-bold">Address</h5>
  <p><?php echo $info["address"];?></p>
  <h5 class="fw-bold">Email</h5>
  <p><?php echo $info["email"];?></p>
  <h5 class="fw-bold">Phone</h5>
  <p><?php echo $info["mobile"];?></p>
  <a class="btn btn-info btn-lg" href="index.php">Home..</a>
 </div>

 <div class="col-md-7 col-sm-12">
   <form action="" method="post">

   <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input name="name" required type="text" class="form-control" id="exampleFormControlInput1">
    </div>

    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
    <input name="email" required type="email" class="form-control" id="exampleFormControlInput1" >
    </div>

    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Subject</label>
    <input name="subject" required type="text" class="form-control" id="exampleFormControlInput1">
    </div>

    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
    <textarea name="message" required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

     <button name="submit" type="submit" class="btn btn-outline-info float-end">Send</button>

   </form>
 </div>


</div>

</div>
    
</body>
</html>

<?php
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];
    if(DBHelper::set("INSERT INTO contact(name,email,subject,message) VALUES('{$name}','{$email}','{$subject}','{$message}');")){
        ?>
        <script>alert("Successfully submitted!")</script>
         <?php
    }
    else{
        ?>
       <script>alert("Something went wrong try again!")</script>
        <?php
    }
}
?>