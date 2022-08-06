<header  id="header" style="margin-bottom: 10px;">

<!-- Top header above banner -->
<div class="header_top_section_div">
 <div class="header_top_item1">

 <form class="examplesssss" method="post"  action="news/news.php">
 <button name="submit" type="submit"><i class="fa fa-search"></i></button>
  <input required type="text" placeholder="لټون ...." name="query">
</form>

 </div>

 <div class="header_top_item2" >
  <div class="menus">
  
					<div id="dd" class="wrapper-dropdown-2" tabindex="1">Follow Us
						<ul class="dropdown" style="z-index: 20;">
							<li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
							<li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i>Youtube</a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i>Linkedin</a></li>
						</ul>
					</div>
 </div>

  <h4 id="curr_date_time"></h4>
 </div>

</div>
<!-- Top header End -->

    <!-- Top banner image -->
    <img class="top_img_he"  src="images/top_banner.png" alt="">

               <!-- Top nav bar -->
                <div class="header_top" style="border:none; margin-top:10px;" >
                    <nav class="navbar navbar-default" style=" width:100%;" role="navigation">
                        <div class="container-fluid" style="padding-right:0px;">
                            <div class="navbar-header">
                                <button id="scrol_nav_id" style="float: left; margin-left: 15px;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                 <span class="sr-only">Toggle navigation</span> 
                                 <span class="icon-bar"></span>
                                  <span class="icon-bar"></span> 
                                  <span class="icon-bar"></span> 
                            </button>
                            </div>
                            
                            <div id="navbar" class="navbar-collapse collapse" style=" width:100%; ">
                                <ul class="nav navbar-nav custom_nav small_screen" style="float: right; text-align:right">
                                    <li><a style="font-size: 15px;" href="contact">اړیکې</a></li>
                                    <li class="<?php if($pageName=="about") {echo "active";}?>"><a style="font-size: 15px;" href="AboutUs">زمونږ په اړه</a></li>
                                    <li><a style="font-size: 15px;" href="blog/blog?cat_search=3">توره بوړه پیژندنه</a></li>
                                    <li class="<?php if($pageName=="about_tora") {echo "active";}?>"><a style="font-size: 15px;" href="About_torabora_mahaz">توره بوړه محاذ پیژندنه</a></li>
                                    <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        له الاماره څخه <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="blog/blog?cat_search=8">دورځې خبره</a></li>
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="blog/blog?cat_search=9">تبصرې</a></li>
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="blog/blog?cat_search=10">اعلامیې</a></li>
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="blog/blog?cat_search=11">څرګندونې</a></li>
                                        </ul>
                                    </li>
                                    <li><a style="font-size: 15px;" href="blog/blog?cat_search=2">نظرپوښتنه او پیغامونه</a></li>
                                    <li><a style="font-size: 15px;" href="blog/blog?cat_search=6">ځانګړی راپور</a></li>
                                     <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        فلمونه او ترانې <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="videos?category=1">توره بوړه سټوډیو</a></li>
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="videos?category=2">منبع الجهاد سټوډیو</a></li>
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="videos?category=3">الاماره سټوډیو</a></li>
                                        <li><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="videos?category=4">الهجرة سټوډیو</a></li>
                                        </ul>
                                    </li>
                                
                                    <li><a style="font-size: 15px;" href="blog/blog">لیکنې</a></li>

                                    <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        خبرونه <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <li class="new_desing"><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="news/news?category=7">نړۍ</a></li>
                                        <li class="new_desing"><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="news/news?category=4">افغانستان</a></li>
                                        <li class="new_desing"><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="news/news?category=5">دکابل حالات</a></li>
                                        <li class="new_desing"><a  style="width:100%; text-align:right;" style="font-size: 15px;" href="news/news?category=6">توره بوړه خبرونه ارشیف</a></li>
                                        </ul>
                                    </li>

                                    <li class="<?php if($pageName=="home") {echo "active";}?>"><a style="font-size: 16px;" href="index">کورپاڼه</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
               
            </header>
           
            <!-- Latest News / news headline -->
            <div class="rowss" style="background-color:#414a4c;">
            
            <div class="item2 " style="padding:0px; background-color:#414a4c;">
            
            <div class="acme-news-ticker">
                <div class="acme-news-ticker-box" >
                    <ul class="my-news-ticker">
                       
                    <?php 
                        $items=DBHelper::get("SELECT id,title FROM news ORDER by id desc limit 10;");
                        if($items->num_rows > 0){
                        while($row=$items->fetch_assoc()){
                        ?>
                        <li><a style="font-size:13px; color:white; font-family: pashto; font-weight:normal" href="single_news?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a></li>
                        <?php
                        }
                        }
                        ?>

                    </ul>

                </div>
            </div>  

            </div>

            <div class="item3" style="padding:0px; background-color:#09c;; height: 40px;">
            <h3 style="color:white; text-align:center; padding:0px; margin:0px; height:40px; padding-top:5px">وروستی</h3>
            </div>

            </div>









