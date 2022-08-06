<?php include("include/header.php");
$news=DBHelper::get("select * from news where id = {$_GET["id"]}")->fetch_assoc();
DBHelper::set("UPDATE news SET view=view+1 WHERE id= {$_GET["id"]}");
?>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">

  <?php include("include/top.php");?>

    <section id="contentbody">

      <div class="row">
    
        <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
          <div class="row">
            <div class="middle_bar">
              <div class="single_post_area">
                
                <div class="single_post_content" style="padding:5px; border-radius:10px;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <h2 sy style="font-weight:bold;text-align: right; margin-bottom:30px; background-color:#09c; color:white; padding:10px 5px;"><?php echo $news["title"];?></h2>
                  <div style="margin-bottom: 30px; ">
                  <img style="border-radius:10px;" class="img-center" src="images/news/<?php echo $news["image"];?>" alt="">
                  </div>
                 
                  <div style="text-align: right; padding:10px 20px;" class="contentssdfdf">
                  <?php
                     $json=$news["des"];
                     $json=str_replace("&lt;","<",$json);
                     $json=str_replace("&gt;",">",$json);
                     $array=explode("||",$json);
                     foreach($array as $value){
                       echo $value;
                     }
                  ?>
                  </div>                  
                  
                    <!-- Comment section -->
                    <hr style="margin-top: 40px;">
                  
                    <form method="post" action="include/model/news_Comment.php" style="margin:20px 20px;">
                    <h3>Write Comment</h3>
                    
                    <div style="margin-top: 20px;">
                    <label for="">Name</label>
                    <input name="name" required type="text" class="form-control" placeholder="Name">
                    </div>
                    <div style="margin-top: 20px;">
                    <label for="">Email</label>
                    <input required name="email" type="email" class="form-control" placeholder="Email">
                    <input name="id" type="hidden" value="<?php echo $news["id"];?>" class="form-control" placeholder="Email">
                    </div>
                    <div style="margin-top: 20px;">
                    <label for="">Comment</label>
                    <textarea maxlength="255" required name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" style="margin-top:15px;" class="btn btn-success">Submit</button>
                    </form>
                    

                </div>

              
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="row">
            <div class="right_bar">
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Recent News</span></h2>
                <div class="singleleft_inner">
                  <ul class="catg3_snav ppost_nav wow fadeInDown">
                   
                  <?php
                  $recent=DBHelper::get("SELECT * from news order by id desc LIMIT 10;");
                  if($recent->num_rows > 0){
                    while($row=$recent->fetch_assoc()){
                      ?>
                      <li>
                      <div class="media" style="direction: rtl;">
                      <a href="single_news.php?id=<?php echo $row["id"];?>" class="media-left">
                      <img alt="" src="images/news/<?php echo $row["image"];?>" style="border-radius: 8px;">
                      </a>
                      <div class="media-body">
                      <a href="single_news.php?id=<?php echo $row["id"];?>" class="catg_title" style="text-align:right; padding-right:7px; font-size:16px; font-weight:normal">
                      <?php echo $row["title"];?>
                      </a>                                        
                      </div>
                      </div>
                      </li> 
                      <?php
                    }
                  }               
                
                  ?>   
                  
                  </ul>
                </div>
              </div>
                        
             
            </div>
          </div>
        </div>

      </div>

      <div class="row" style=" margin-bottom:40px; background-color:white; padding:15px; border-radius:10px;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h2>User comments</h2>
        <hr>

        <?php
        $comment=DBHelper::get("SELECT * FROM `news_comment` WHERE news_id={$_GET["id"]} and status=1");
        if($comment->num_rows > 0){
          while($row=$comment->fetch_assoc()){
            ?>
            <div>
            <img style="display:inline-block" src="images/comment_icon.png" width="40" height="40" alt="">
              <p style="display:inline-block; margin-left:10px; font-weight:bold; margin-bottom:0px;" ><?php echo $row["name"];?> (<small><?php echo $row["email"];?></small>)</p>
              <p style="margin-left: 50px;"><?php echo $row["comment"];?></p>
              <hr style="width:70%; margin:4px auto;">
            </div>
            <?php
          }
        }
        ?>
      

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