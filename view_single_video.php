<?php include("include/header.php");
$pageName="video";
?>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">

  <?php include("include/top.php");
  $video=DBHelper::get("select * from video where id={$_GET["id"]}")->fetch_assoc();
  DBHelper::set("UPDATE video set view=view+1 WHERE id={$_GET["id"]}");
  ?>


    <section id="errorpage_body" class="container" style="margin-top:30px; margin-bottom:60px;">
      <div class="row" style="border-left:3px solid #09c; border-radius:10px;;padding:30px 0px; margin:10px 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

      <div class="col-md-8 col-lg-8 col-sm-12" style="height:auto; padding:8px;">
      <div class="containerss">
       <iframe src="https://www.youtube.com/embed/<?php echo $video["video_id"];?>"  allowfullscreen="allowfullscreen"
        mozallowfullscreen="mozallowfullscreen" 
        msallowfullscreen="msallowfullscreen" 
        oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen" class="responsive-iframe"></iframe>
      </div> 

      <div style="padding:30px 20px; direction:rtl">
      <h3 style="font-size:4vw;">د ویډیو توضیحات</h3>
      <hr>
      <p style="font-size:1.5vw;"><b>سرلیک: </b> <?php echo $video["title"];?></p>
      <p style="font-size:1.5vw;"><b>نیټه: </b> <?php echo $video["date"];?></p>
      <p style="font-weight: bold; font-size:1.5vw;">توضيح</p>
      <p style="font-size:1.5vw;"> <?php echo $video["des"];?> </p>
      <hr>
      </div>
     
      </div>

      <div class="col-md-4 col-lg-4 col-sm-12" style="height:auto; background:white;">
      <?php
       $popular=DBHelper::get("SELECT * from video where view >= 20 order by view desc LIMIT 10");
      ?>
      <h3><span>Popular Video</span></h3>
      <div class="singleleft_inner">
        <ul class="catg3_snav ppost_nav wow fadeInDown">
        <?php
        if($popular != "null"){
        if($popular->num_rows > 0){
          while($row=$popular->fetch_assoc()){
            ?>
            <li>
            <div class="media" style="direction: rtl;">
            <a href="view_single_video.php?id=<?php echo $row["id"];?>" class="media-left">
            <img alt="" src="images/video/<?php echo $row["image"];?>" style="border-radius: 8px;">
            </a>
            <div class="media-body">
            <a href="view_single_video.php?id=<?php echo $row["id"];?>" class="catg_title" style="text-align:right; padding-right:7px; font-size:16px;  -webkit-line-clamp: 2;">
            <?php echo $row["title"];?>
            </a>                                        
            </div>
            </div>
            </li> 
            <?php
          }
        }               
      }
        ?>                                     
                                         
        </ul>
        </div>

      </div>
       
      </div>

    </section>

   
    <?php include("include/footer.php");?>


  </div>
</div>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>