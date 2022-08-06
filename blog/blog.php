<?php
include("../include/conn.php");
include("../include/DBHelper.php");

$blog="null";
$cat_name;
if(isset($_GET["cat_search"])){
 $blog=DBHelper::get("SELECT * from blog WHERE cat_id={$_GET["cat_search"]} limit 20");
 $cat_name=DBHelper::get("select * from blog_cat where id={$_GET["cat_search"]}")->fetch_assoc()["name"];
}
elseif(isset($_POST["query"]) && isset($_POST["submit"])){
  $blog=DBHelper::get("SELECT * from blog WHERE title LIKE '%".$_POST["query"]."%' limit 20"); 
  $cat_name="لیکنې";
}
else{
  $blog=DBHelper::get("SELECT * from blog WHERE view >= 50 ORDER BY view desc LIMIT 20;");
  $cat_name="لیکنې";
}

if(isset($_GET["cat_search"])){
  if($_GET["cat_search"] == "1"){
    $cat_name="لیکنې";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="../images/favicon.ico" type="image/gif" sizes="16x16"> 
  <title>
توره بوړه ويبپاڼه
</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
        .testss:hover{
         text-decoration: none;
        }
        @font-face {
        font-family: pashto;
        src: url(../fonts/pashto.ttf);
        }
        *{
            font-family: pashto;
        }
  </style>
  <!-- =======================================================
  * Template Name: Presento - v3.1.0
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs mt-0">
      <div class="container">
        <div class="row">
        <h1 class="col-6"><?php echo $cat_name;?></h1>
        <a class="col-6 float-end text-white pr-md-5 testss"  href="../index.php"> <h1 style="text-align:right"><b style="color:#09c">توره </b>بوړه ويبپاڼه</h1></a>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          <?php 
          if($blog != "null"){
          if($blog->num_rows > 0){
            while($row=$blog->fetch_assoc()){
              ?>
                  <article class="entry">

                  <div class="entry-img" style="text-align: center;">
                    <img style="border-radius: 10px; margin-top:20px" src="../images/blog/<?php echo $row["image"];?>" alt="" class="img-fluid">
                  </div>

                  <h2 class="entry-title" style="direction: rtl; text-align:justify">
                    <a  href="blog-single.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
                  </h2>

                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.php"><?php if($row["view"] >= 1000){ echo ($row["view"]/1000),"K";}else{echo $row["view"];}?>  Views</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.php"><time datetime="2020-01-01"><?php echo $row["date"];?></time></a></li>
                     
                    </ul>
                  </div>

                  <div id="mainDev" class="entry-content">
                   
                    <div class="read-more">
                      <a href="blog-single.php?id=<?php echo $row["id"];?>">Read More</a>
                    </div>
                  </div>

                  </article><!-- End blog entry -->
              <?php
            }
          }
        }
          ?>

    </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="blog.php" method="post">
                  <input required name="query" style="direction: rtl;" type="text" placeholder="لټون">
                  <button  name="submit" type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->


              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php
                  $blog_cat=DBHelper::get("select * from blog_cat");
                  if($blog_cat->num_rows > 0){
                    while($row=$blog_cat->fetch_assoc())
                    {
                      ?>
                      <li><a style="text-align:right; font-size:18px; display:block" href="blog.php?cat_search=<?php echo $row["id"];?>"><span> << </span> <?php echo $row["name"];?></a></li>
                      <?php
                    }
                  }
                  ?>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php
                $recent=DBHelper::get("SELECT * from blog WHERE view < 50 ORDER BY view asc LIMIT 10;");
                if($recent->num_rows > 0){
                  while($row=$recent->fetch_assoc()){
                    ?>
                     <div class="post-item clearfix">
                      <img style="border-radius: 10px;" src="../images//blog/<?php echo $row["image"];?>" alt="">
                      <h4 style="text-align:justify; direction:rtl; font-size:14px; font-weight:normal;"><a href="blog-single.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a></h4>
                      <time datetime="2020-01-01"><?php echo $row["date"];?></time>
                    </div>
                    <?php
                  }
                }
                ?>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>