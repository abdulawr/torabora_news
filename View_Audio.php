<?php include("include/header.php");?>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">

  <?php include("include/top.php");?>


    <section id="errorpage_body" class="container" style="margin-top:30px; margin-bottom:60px;">
    
   
    
     


       <!-- Audio start -->
       <div class="container-fluid main_div" style=" border-left:3px solid #09c; padding: 30px 20px;">
         <?php
          DBHelper::set("UPDATE audio SET view=view+1 WHERE id={$_GET["id"]}");
          $file=DBHelper::get("select * from audio where id={$_GET["id"]}")->fetch_assoc();
          $type=explode(".",$file["audio_file"])["1"];
         ?>
            <audio preload controls style="width:100%;border-radius: 20px; height:300px; background-image: url(images/audio_back.gif);  background-repeat: no-repeat;background-size: cover;">
            <source src="audio/<?php echo $file['audio_file'];?>" type="audio/<?php echo $type; ?>">
            </audio> 

           <p style="font-size:17px; text-align:right; margin-top:20px;"><?php echo $file["title"];?></p>
           <div style="text-align: right;">
           <a download href="audio/<?php echo $file['audio_file'];?>" class="btn btn-primary">ډاونلوډ</a>
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