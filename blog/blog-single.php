<?php
include("../include/conn.php");
include("../include/DBHelper.php");
include("../include/HelperFunction.php");
$blog=DBHelper::get("select * from blog where id={$_GET["id"]}")->fetch_assoc();
$poper=DBHelper::get("SELECT * from blog WHERE view >= 50 ORDER BY view desc LIMIT 20;");
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
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
  .contentssdfdf{
    direction: rtl;
    text-align: justify;
  }
      @font-face {
        font-family: pashto;
        src: url(../fonts/pashto.ttf);
        }
        *{
            font-family: pashto;
        }
        h4{
          font-weight: bold;
        }

        .contentssdfdf h4{
          font-weight: bold;
        }
        .contentssdfdf p{
          font-size: 17px;
          font-weight: normal;
        }
  </style>

</head>

<body>

 

  <main id="main">

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img" style="text-align: center;">
                <img style="border-radius: 10px; margin-top:20px" src="../images/blog/<?php echo $blog["image"];?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title contentssdfdf">
                <a href="#" href="blog-single.html"><?php echo $blog["title"];?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content contentssdfdf">
              <?php
                     $json=$blog["body"];
                     $json=str_replace("&lt;","<",$json);
                     $json=str_replace("&gt;",">",$json);
                     $array=explode("||",$json);
                     foreach($array as $value){
                       echo $value;
                     }
              ?>

              </div>

            </article><!-- End blog entry -->

            <div class="blog-comments">
             <?php 
             $total_comment=DBHelper::get("SELECT count(id) as 'count' from blog_comment WHERE blog_id={$_GET["id"]} and status=1")->fetch_assoc()["count"];
             $comment=DBHelper::get("SELECT * from blog_comment WHERE blog_id={$_GET["id"]} and status=1");
            ?>
              <h4 class="comments-count"><?php echo $total_comment;?>  Comments</h4>
              <?php
              if($comment->num_rows > 0){
                while($row=$comment->fetch_assoc()){
                  ?>
              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="../images/comment_icon.png" alt=""></div>
                  <div>
                    <h5><a href="#"> <?php echo $row["name"];?></a></h5>
                    <time datetime="2020-01-01"> <?php echo $row["date"];?></time>
                    <p style="<?php if(is_english($row["comment"])){echo "text-align:left;";}else{echo "text-align:right;";}?>">
                     <?php echo $row["comment"];?>
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->
                  <?php
                }
              }
              ?>

              <div class="reply-form">
                <h4>Leave a Comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                 <input name="id" type="hidden" value="<?php echo $_GET["id"];?>">
                  <div class="row">
                    <div class="col form-group">
                      <textarea style="direction: rtl;" maxlength="255" name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="blog.php" method="post">
                  <input style="direction:rtl" name="query" type="text"  placeholder="لټون">
                  <button name="submit" type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

             

              <h3 class="sidebar-title">Popular Posts</h3>
              <div class="sidebar-item recent-posts">

              <?php
                if($poper->num_rows > 0){
                  while($row=$poper->fetch_assoc()){
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
    </section><!-- End Blog Single Section -->

    

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

<?php
if(isset($_POST["submit"]) && isset($_POST["comment"])){
  $name=validateInput($_POST["name"]);
  $email=validateInput($_POST["email"]);
  $comment=validateInput($_POST["comment"]);
  if(DBHelper::set("INSERT INTO `blog_comment`(`name`, `email`, `comment`, `blog_id`) VALUES ('{$name}','{$email}','{$comment}',{$_POST["id"]})")){
    ?>
    <script>alert("Successfully submitted!")</script>
    <?php
  }
  else{
    ?>
    <script>alert("Something went wrong try again")</script>
    <?php
  }
}
?>