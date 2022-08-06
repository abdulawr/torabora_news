<?php include("include/header.php");
$pageName="video";
$video="null";
if(isset($_POST["query"]) && isset($_POST["submit"])){
  $query=validateInput($_POST["query"]);
  $video=DBHelper::get("SELECT * from video where title LIKE '%".$query."%' LIMIT 30");
}
elseif(isset($_GET["category"])){
$category=$_GET["category"];
$video=DBHelper::get("SELECT * from video WHERE video_cat={$_GET["category"]}");
}
else{
  $video=DBHelper::get("select * from video order by id desc limit 30");
}
?>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">

  <?php include("include/top.php");?>


    <section id="errorpage_body" class="container" style="margin-top:30px; margin-bottom:60px;">
      
              <!-- Video Section Start -->
        <div style="margin-top:40px;" class="container-fluid main_div">
         <h2 class="top_heading_text" style="text-align: center;">فلمونه او ترانې</h2>
         
        <form class="row" method="post" style="margin-bottom: 20px;">
        <div class="col-sm-2 col-lg-2 col-md-2" style="text-align: center;">
        
        </div>
        <div class="col-sm-9 col-lg-9 col-md-9">
          <button name="submit" style="height:40px; width:120px; background:#09c; color:white; border:none; font-weight:bold;" type="submit">لټون</button>
          <input name="query" required type="text" style="width: 80%; height:40px; font-weight:bold; padding-left:10px; padding-right:10px; direction:rtl" placeholder="ویډیو لټون">
        </div>
        </form>

         <div class="sub_div">
        <?php
        if($video != "null"){
        if($video->num_rows > 0){
            while($row=$video->fetch_assoc()){
                ?>
               
                <div class="cards" >
                <div style="position: relative; text-align: center;">
                <a href="view_single_video.php?id=<?php echo $row["id"];?>"  style="position: absolute;  top: 50%; left: 50%; transform: translate(-50%, -50%);"><img width="50" height="50" src="images/playicon.png" alt=""></a>
                <img class="imags" src="images/video/<?php echo $row["image"];?>" alt="Avatar" style="width:100%">
                </div>
                <div class="containers">
                <a href="view_single_video.php?id=<?php echo $row["id"];?>"> <p style="color:black;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }}
        ?>
        </div>
        </div>
        <!-- Video Section End -->



       <!-- Audio start -->
       <div class="container-fluid main_div" style="margin-top: 0px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
       <h2 class="top_heading_text" style="text-align: center; margin:20px 20px;">پښتو ترانې</h2>
         <div class="sub_div">
        <?php
        $video=DBHelper::get("select * from audio order by id desc");
        if($video->num_rows > 0){
            $i=1;
            while($row=$video->fetch_assoc()){
                if($i == 10){
                    $i=1;
                }
                ?>
                <div class="audio_card">
                <img style="height: 80px;"  src="images/audio/<?php echo $i; ?>.jpg" alt="Avatar">
                <div class="audio_contaimer">
                <a href="View_Audio.php?id=<?php echo $row["id"];?>"> <p style="color:black; padding-bottom:10px; height:70px; overflow:hidden;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
                $i++;
            }
          }
        ?>
        </div>
        </div>
        <!-- Audio end -->


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