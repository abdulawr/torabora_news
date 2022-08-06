<?php
include("../include/conn.php");
include("../include/DBHelper.php");
$cat_name="";
if(isset($_GET["category"])){
$cat_name=DBHelper::get("SELECT * FROM news_cat where id={$_GET["category"]}")->fetch_assoc()["name"];
}
else{
$cat_name="لټون";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
توره بوړه ويبپاڼه
</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="../images/favicon.ico" type="image/gif" sizes="16x16"> 
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .testss:hover{
         text-decoration: none;
        }
        .widhtClass{
            width: 24%;
            border-radius: 10px;
        }
        .imageSize{
            height: 180px;
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 100px;
        }
        
        @media screen and (max-width: 480px) {
        .widhtClass{
            width: 100%;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
        }
        }
        @font-face {
        font-family: pashto;
        src: url(../fonts/pashto.ttf);
        }
        *{
            font-family: pashto;
        }
    </style>
</head>

<body>

   <div class="container-fluid">
       <div class="row bg-white p-3 shadow-sm" style="border-bottom:2px solid #09c;;border-bottom-right-radius: 50px; border-bottom-left-radius: 50px;">
        <h2 class="col-3 pl-md-5"><?php echo $cat_name;?></h2>
        <div class="col-6">
        <form method="POST" action="news.php">
        <div class="row">
            <div class="col-3">
            <button name="submit" type="submit" class="btn btn-dark rounded pl-5 pr-5">لټون</button>
            </div>
            <div class="col-9">
            <input name="query" style="direction: rtl;" type="text" class="form-control rounded" placeholder="دلته لټون وکړئ">
            </div>
        </div>
        </form>
        </div>
        <a class="col-3 text-right pr-md-5 testss"  href="../index.php"> <h1><b style="color:#09c">توره </b>بوړه ويبپاڼه</h1></a>
       </div>
   </div>

    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">

            <?php
            $top=DBHelper::get("SELECT id,title,image from news order by id desc limit 10");
            if($top->num_rows > 0){
               
                while($row=$top->fetch_assoc()){
                   
                    ?>
                    <div class="d-flex" style="direction: rtl;">
                    <img  src="../images/news/<?php echo $row["image"];?>" style="width: 80px; height: 80px; object-fit: cover; border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a style="text-align:right" class="text-secondary font-weight-semi-bold" href="../single_news.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
                    </div>
                   </div>
                    <?php
                }
            }
            ?>
               
            </div>
        </div>
    </div>
    <!-- Top News Slider End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">

                    <?php
                $headline=DBHelper::get("SELECT * from news WHERE news_type=1 ORDER by id desc limit 10;");
                if($headline->num_rows > 0){
                   
                    while($row=$headline->fetch_assoc()){
                     ?>
                      <div class="position-relative overflow-hidden" style="height: 435px; border-radius:10px;">
                            <img class="img-fluid h-100" src="../images/news/<?php echo $row["image"];?>" style="object-fit: cover; border-radius:10px;">
                            <div class="overlay">
                                <div class="mb-1">
                                    <span class="px-2 text-white"></span>
                                    <a class="text-white" href="../single_news.php?id=<?php echo $row["id"];?>"><?php echo $row["date"];?></a>
                                </div>
                                <a style="text-align: right;" class="h2 m-0 text-white font-weight-bold" href="../single_news.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
                            </div>
                        </div>

                     <?php
                    }}
                    ?>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="news.php">View All</a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px; border-radius:10px;">
                        <img class="img-fluid w-100 h-100" src="../images/cat_background.jpg" style="object-fit: cover; border-radius:10px;">
                        <a href="news.php?category=7" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        نړۍ
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px; border-radius:10px;">
                        <img class="img-fluid w-100 h-100" src="../images/cat_background.jpg" style="object-fit: cover; border-radius:10px;">
                        <a href="news.php?category=4" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        افغانستان
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px; border-radius:10px;">
                        <img class="img-fluid w-100 h-100" src="../images/cat_background.jpg" style="object-fit: cover; border-radius:10px;">
                        <a href="news.php?category=5" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        دکابل حالات
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 80px; border-radius:10px;">
                        <img class="img-fluid w-100 h-100" src="../images/cat_background.jpg" style="object-fit: cover; border-radius:10px;">
                        <a href="news.php?category=6" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        توره بوړه خبرونه ارشیف
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Main News Start -->
     <div class="mt-3 mb-3 container">

     <div class="row d-flex flex-row justify-content-around justify-content-start">

        <?php
     
        if(isset($_GET["category"])){
            $news=DBHelper::get("SELECT * from news WHERE news_cat={$_GET["category"]} and news_type=0  ORDER by id desc limit 8;");
        }
        elseif(isset($_POST["query"]) && isset($_POST["submit"])){
            $news=DBHelper::get("select * from news where title like '%".$_POST["query"]."%' order by id desc limit 8");  
        }
        else{
            $news=DBHelper::get("select * from news where news_type=0 order by id desc limit 8");
        }
        if($news != "null"){
        if($news->num_rows > 0){
            while($row=$news->fetch_assoc()){
             ?>
        <div class="card mt-3 widhtClass">
        <img class="card-img-top imageSize" src="../images/news/<?php echo $row["image"];?>" alt="Card image cap">
        <div class="card-body">
            
            <p style="text-align:right" class="card-text text-bold"><?php echo $row['title'];?></p>
            <a href="../single_news.php?id=<?php echo $row["id"];?>" class="btn btn-info">View</a>
        </div>
        </div>
             <?php
            }
        }
       }
        ?>

     </div>

     </div>
    <!-- Main News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3 mb-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Popular</h3>
                
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">

            <?php
            $popular=DBHelper::get("SELECT id,title,date,image,view from news WHERE view > 10 order by view desc limit 10");
            if($popular->num_rows > 0){
                while($row=$popular->fetch_assoc()){
                    ?>
                <div class="position-relative overflow-hidden" style="height: 300px; border-radius:10px">
                    <img class="img-fluid w-100 h-100" style="border-radius:10px; " src="../images/news/<?php echo $row["image"];?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">View: <?php echo $row["view"]; ?></a>
                        </div>
                        <a style="text-align: right; font-size:17px; background-color: rgba(0, 0, 0, 0.5);" class="h4 m-0 text-white" href="../single_news.php?id=<?php echo $row["id"];?>"><?php echo $row["title"]; ?></a>
                    </div>
                </div>
                    <?php
                }
            }
            ?>
             
            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->


    </div>
    <!-- News With Sidebar End -->


   


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>