<?php include("include/header.php"); 
    $headline=DBHelper::get("SELECT * from news where news_type=1 order by id desc LIMIT 5;");
    $data=[];
    if($headline->num_rows > 0){
        while($row=$headline->fetch_assoc()){
            array_push($data,$row);
        }
    }

    $pageName="home";
?>
<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div id="main_control_section" class="container">
        <div class="box_wrapper">
        
            <?php include("include/top.php");?>

            <!-- Top Images -->
            <div class="thumbnail_slider_area">

                <div class="owl-carousel" style="padding-left:15px; padding-right:15px;">

                <?php
                $headline=DBHelper::get("SELECT * from blog where cat_id=2 ORDER by id desc limit 8;");
                if($headline->num_rows > 0){
                    $i=0;
                    while($row=$headline->fetch_assoc()){
                       
                        if($i == 0){
                        ?>
                         <div class="signle_iteam">
                              <img style="border-radius:10px; box-shadow: inset 0px 0px 10px rgba(0,0,0,0.5);" src="images/blog/<?php echo $row["image"];?>" alt="">
                         <!-- <div class="sing_commentbox slider_comntbox">
                            <p><i class="fa fa-calendar"></i><?php echo $row["date"];?></p>
                            <br>
                            <p style="margin-top: 10px;">نظرپوښتنه او پیغامونه</p>                           
                        </div> -->
                        <a style="margin-bottom:0px; padding:5px 5px; margin-left:5px; margin-right:5px;" class="slider_tittle" href="blog/blog-single.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
                        </div>
                        <?php
                        }
                        elseif($i == 1){
                            ?>
                             <div class="signle_iteam"> 
                                 <img  style="border-radius:10px; box-shadow: inset 0px 0px 10px rgba(0,0,0,0.5);" src="images/blog/<?php echo $row["image"];?>" alt="">
                               <!--  <div class="sing_commentbox slider_comntbox">
                                    <p><i class="fa fa-calendar"></i><?php echo $row["date"];?></p>
                                    <br>
                                    <p style="margin-top: 10px;">نظرپوښتنه او پیغامونه</p>  
                                </div> 
                                <div class="sing_commentbox slider_comntbox">
                                    <p><i class="fa fa-calendar"></i><?php echo $row["date"];?></p> 
                                </div> -->
                                
                                <a style="margin-bottom:0px; padding:5px 5px; margin-left:5px; margin-right:5px;" class="slider_tittle" href="blog/blog-single.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="signle_iteam">
                            <img  style="border-radius:10px;" src="images/blog/<?php echo $row["image"];?>" alt="">
                           <!--  <div class="sing_commentbox slider_comntbox">
                                <p><i class="fa fa-calendar"></i><?php echo $row["date"];?></p>
                                <br>
                            <p style="margin-top: 10px;">نظرپوښتنه او پیغامونه</p>  
                            </div> -->
                            <a style="margin-bottom:0px; padding:5px 5px; margin-left:5px; margin-right:5px;" class="slider_tittle" href="blog/blog-single.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a>
                           </div>
                            <?php
                        }
                        $i++;
                    }
                }
               ?>     
                </div>
            </div>

            
            <section id="contentbody" style="background-color: white; padding-left:15px; padding-right:15px;">
          
          <!-- Top Headline Section -->
           <div class="row smg" style="margin-bottom: 30px;">

            <div class="col-md-6 col-lg-6 col-sm-12" style="padding-left: 0px;;">

             <div class="row">

             <div class="col-md-6 col-lg-6 col-sm-12" style="height: 180px;" >
             <div style=" position: relative;text-align: center;">
             <a href="single_news.php?id=<?php echo $data[1]["id"];?>">
             <img style="width: 100%; height:180px; border-radius:8px" src="images/news/<?php echo $data[1]["image"]; ?>" class="" alt="">
             </a>
             <a class="text-styless" style="font-size: 18px;" href="single_news.php?id=<?php echo $data[1]["id"];?>"><?php echo $data[1]["title"]; ?></a>
            
            </div>
             </div>

             <div class="col-md-6 col-lg-6 col-sm-12" style="height: 180px; padding:0px;" >
             <div style=" position: relative;text-align: center;">
             <a href="single_news.php?id=<?php echo $data[2]["id"];?>">
             <img style="width: 100%; height:180px; border-radius:8px" src="images/news/<?php echo $data[2]["image"]; ?>" class="" alt="">
             </a>
             <a class="text-styless" style="font-size: 18px;" href="single_news.php?id=<?php echo $data[2]["id"];?>"><?php echo $data[2]["title"]; ?></a>
           
            </div>
             </div>

             </div>

             <div class="row" style="margin-top: 15px;">

             <div class="col-md-6 col-lg-6 col-sm-12" style="height: 180px;" >
             <div style=" position: relative;text-align: center;">
             <a href="single_news.php?id=<?php echo $data[3]["id"];?>">
             <img style="width: 100%; height:180px; border-radius:8px" src="images/news/<?php echo $data[3]["image"]; ?>" class="" alt="">
             </a>
             <a class="text-styless" style="font-size: 18px;" href="single_news.php?id=<?php echo $data[3]["id"];?>"><?php echo $data[3]["title"]; ?></a>
            
            </div>
             </div>

             <div class="col-md-6 col-lg-6 col-sm-12" style="height: 180px; padding:0px;" >
             <div style=" position: relative;text-align: center;">
             <a href="single_news.php?id=<?php echo $data[4]["id"];?>">
             <img style="width: 100%; height:180px; border-radius:8px" src="images/news/<?php echo $data[4]["image"]; ?>" class="" alt="">
             </a>
             <a class="text-styless" style="font-size: 18px;" href="single_news.php?id=<?php echo $data[4]["id"];?>"><?php echo $data[4]["title"]; ?></a>
           
            </div>
             </div>

             </div>

            </div>

            <div class="col-md-6 col-lg-6 col-sm-12" style="height: 375px; padding-right:0px;">
            <div style=" position: relative;text-align: center;">
            <a href="single_news.php?id=<?php echo $data[0]["id"];?>">
            <img style=" width: 100%; height:375px; border-radius:8px;" src="images/news/<?php echo $data[0]["image"]; ?>" class="" alt="">
            </a>
            <a class="text-style" href="single_news.php?id=<?php echo $data[0]["id"];?>"><?php echo $data[0]["title"]; ?></a>
            </div>
            </div>

           </div> 


        <div class="container-fluid main_div" style="padding-left: 0; padding-right:0px; margin-bottom:10px">
         <div class="sub_div">
        <?php
        $kabal=DBHelper::get("SELECT * from news WHERE news_type=0 order by id desc LIMIT 6;");
        if($kabal->num_rows > 0){
            while($row=$kabal->fetch_assoc()){
                ?>
               
                <div class="cards1234" style="margin-bottom:20px">
                
                <img class="imags" src="images/news/<?php echo $row["image"];?>" alt="Avatar" style="width:100%; height:130px"> 
                
                <div class="containers">
                <a href="single_news.php?id=<?php echo $row["id"];?>"> <p style="color:black; margin-top:5px; height:60px; overflow:hidden;  text-overflow: ellipsis;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>
        </div>


        <div style="  padding: 0px 10px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;" class="container-fluid main_div">
         <h2 style="font-family:pashto; text-align: center; margin-top:13px; margin-bottom:15px;">دکابل حالات</h2>
         <hr style="width: 100%; margin:0px; margin-bottom:15px;">
         <div class="sub_div">
        <?php
        $kabal=DBHelper::get("SELECT * from news WHERE news_cat = 5 order by id desc LIMIT 5;");
        if($kabal->num_rows > 0){
            while($row=$kabal->fetch_assoc()){
                ?>
               
                <div class="cards" style="padding-top:5px; margin-bottom:30px">
                <div class="cont_ainer">
                <img class="imags" src="images/news/<?php echo $row["image"];?>" alt="Avatar" style="width:100%;  border-bottom-right-radius: 100px;"> 
                </div>
               
                <div class="containers">
                <p style="color:gray; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                <a href="single_news.php?id=<?php echo $row["id"];?>"> <p style="color:black; margin-top:0px;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>
        </div>


        <div class="container-fluid main_div" style=" padding: 0px 10px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="main-card-toper" >

        <div class="container-fluid" style="padding: 0px; width:100%;">
           <div class="row">

           <div class="col-lg-6 col-md-6 col-sm-12" style="border-right: 1.5px dashed gray;">
           <div style=" overflow:hidden; width:100%; ">
            <h2 style="font-family:pashto;" class="subtitle fancy" style="text-align: center;">
            <span> لیکنې  </span></h2>
           </div>
           <hr style="width: 100%; margin:0px; margin-top:10px">

        <div class="container-fluid main_div" style="margin-top: 15px; padding-right:0px; padding-left:10px;">
         <div class="sub_div">
        <?php
        $video=DBHelper::get("select * from blog order by id desc limit 4");
        if($video->num_rows > 0){
            while($row=$video->fetch_assoc()){
                ?>
               
                <div class="cards12">
                <div class="cont_ainer">
                <img class="imags" src="images/blog/<?php echo $row["image"];?>" alt="Avatar" style="width:100%">
                </div>
                <div class="containers">
                <div class="container-fluid">
                <div class="row">
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:center; margin:5px 0;"><?php echo "By: ".$row["writer"]; ?></p>
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                </div>
                </div>
                <a href="blog/blog-single.php?id=<?php echo $row["id"];?>"> <p style="color:black; padding-bottom:5px; margin-top:0px; height:66px; text-overflow: ellipsis; overflow:hidden;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>
        </div>
            
           </div>

           <div class="col-lg-6 col-md-6 col-sm-12">
           <div style=" overflow:hidden; width:100%; ">
            <h2 style="font-family:pashto;" class="subtitle fancy" style="text-align: center;"><span> ځانګړی راپور </span></h2>
           </div>
           <hr style="width: 100%; margin:0px; margin-top:10px">

           <div class="container-fluid main_div" style="margin-top: 15px; padding-right:0px; padding-right:10px;">
            <div class="sub_div">
            <?php
            $video=DBHelper::get("select * from blog where cat_id=6 order by id desc limit 4");
            if($video->num_rows > 0){
                while($row=$video->fetch_assoc()){
                    ?>
                
                    <div class="cards12">
                    <div class="cont_ainer">
                    <img class="imags" src="images/blog/<?php echo $row["image"];?>" alt="Avatar" style="width:100%">
                    </div>
                    <div class="containers">
                    <div class="container-fluid">
                    <div class="row">
                    <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:center; margin:5px 0;"><?php echo "By: ".$row["writer"]; ?></p>
                    <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                    </div>
                    </div>
                    <a href="blog/blog-single.php?id=<?php echo $row["id"];?>"> <p style="color:black; padding-bottom:5px; margin-top:0px; height:66px; text-overflow: ellipsis; overflow:hidden;"><?php echo $row["title"];?></p></a>
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
           </div> 
        
        </div>
        </div>
       

        <!-- Last Section -->
        <div class="container-fluid main_div" style=" padding: 0px 10px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="main-card-toper" style="padding-bottom: 30px;">

        <div class="single-item_div" style="border-left: 1.5px dashed gray;">
        <div style="overflow:hidden; margin-left:10px">
        <h2 class="subtitle fancy" style="text-align: center;"><span>دورځې خبره</span></h2>
        </div>
        <hr style="width: 100%; margin:0px; margin-top:10px">
         
        <?php
        $kabal=DBHelper::get("SELECT * from blog WHERE cat_id = 8 order by id desc LIMIT 2;");
        if($kabal->num_rows > 0){
            while($row=$kabal->fetch_assoc()){
                ?>
               
                <div class="cards_last" style="margin-top:20px">
                <div class="cont_ainer">
                <img class="imags" src="images/blog/<?php echo $row["image"];?>" alt="Avatar" style="width:100%;  border-bottom-right-radius: 100px;"> 
                </div>
                <div class="containers">
                <div class="container-fluid">
                <div class="row">
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:center; margin:5px 0;"><?php echo "By: ".$row["writer"]; ?></p>
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                </div>
                </div>
                <a href="blog/blog-single.php?id=<?php echo $row["id"];?>"> <p style="color:black; margin-top:0px; height:65px; overflow:hidden"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>

        </div>

        <div  class="single-item_div" style="border-left: 1.5px dashed gray;">
        <div style="overflow:hidden; margin-left:10px; margin-right:10px;">
        <h2 class="subtitle fancy" style="text-align: center;"><span>تبصرې</span></h2>
        </div>
        <hr style="width: 100%; margin:0px; margin-top:10px">
       
        <?php
        $kabal=DBHelper::get("SELECT * from blog WHERE cat_id = 9 order by id desc LIMIT 2;");
        if($kabal->num_rows > 0){
            while($row=$kabal->fetch_assoc()){
                ?>
               
                <div class="cards_last" style="margin-top:20px">
                <div class="cont_ainer">
               
                <img class="imags" src="images/blog/<?php echo $row["image"];?>" alt="Avatar" style="width:100%;  border-bottom-right-radius: 100px;"> 
                </div>
                <div class="containers">
                <div class="container-fluid">
                <div class="row">
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:center; margin:5px 0;"><?php echo "By: ".$row["writer"]; ?></p>
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                </div>
                </div>
                <a href="blog/blog-single.php?id=<?php echo $row["id"];?>"> <p style="color:black; margin-top:0px; height:65px; overflow:hidden"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>

        <div  class="single-item_div" style="border-left: 1.5px dashed gray;">
        <div style="overflow:hidden; margin-left:10px; margin-right:10px;">
        <h2 class="subtitle fancy" style="text-align: center;"><span>اعلامیې</span></h2>
        </div>
        <hr style="width: 100%; margin:0px; margin-top:10px">
       
        <?php
        $kabal=DBHelper::get("SELECT * from blog WHERE cat_id = 10 order by id desc LIMIT 2;");
        if($kabal->num_rows > 0){
            while($row=$kabal->fetch_assoc()){
                ?>
               
                <div class="cards_last" style="margin-top:20px">
                <div class="cont_ainer">
               
                <img class="imags" src="images/blog/<?php echo $row["image"];?>" alt="Avatar" style="width:100%;  border-bottom-right-radius: 100px;"> 
                </div>
                <div class="containers">
                <div class="container-fluid">
                <div class="row">
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:center; margin:5px 0;"><?php echo "By: ".$row["writer"]; ?></p>
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                </div>
                </div>
                <a href="blog/blog-single.php?id=<?php echo $row["id"];?>"> <p style="height:65px; overflow:hidden; color:black; margin-top:0px;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>

        <div  class="single-item_div">
        <div style="overflow:hidden; margin-left:10px; margin-right:10px;">
        <h2 class="subtitle fancy" style="text-align: center;"><span>څرګندونې</span></h2>
        </div>
        <hr style="width: 100%; margin:0px; margin-top:10px">

        <?php
        $kabal=DBHelper::get("SELECT * from blog WHERE cat_id = 11 order by id desc LIMIT 2;");
        if($kabal->num_rows > 0){
            while($row=$kabal->fetch_assoc()){
                ?>
               
                <div class="cards_last" style="margin-top:20px">
                <div class="cont_ainer">
               
                <img class="imags" src="images/blog/<?php echo $row["image"];?>" alt="Avatar" style="width:100%;  border-bottom-right-radius: 100px;"> 
                </div>
                <div class="containers">
                <div class="container-fluid">
                <div class="row">
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:center; margin:5px 0;"><?php echo "By: ".$row["writer"]; ?></p>
                <p class="col-lg-6 col-md-6 col-sm-6" style="color:#707070; text-align:right; margin:5px 0;"><?php echo explode(" ",$row["date"])[0]; ?></p>
                </div>
                </div>
                <a href="blog/blog-single.php?id=<?php echo $row["id"];?>"> <p style="height:65px; overflow:hidden; color:black; margin-top:0px;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>
        
        </div>
        </div>



        <!-- توره بوړه سټوډیو -->
        <div class="container-fluid main_div" style=" padding: 0px 10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
        <div class="main-card-toper" style="padding-bottom: 30px;">

        <div class="container-fluid" style="padding: 0px; width:100%;">
           <div class="row">

           <div class="col-lg-4 col-md-4 col-sm-12" style="border-right: 1.5px dashed gray;">
           <div style="overflow:hidden; width:100%;">
            <h2 class="subtitle fancy" style="text-align: center;"><span> وروستي ویډیوګانې </span></h2>
           </div>
           <hr style="width: 100%; margin:0px; margin-top:10px">
           <div class="sub_divss" style="margin-top: 15px;">
           <?php
        $video=DBHelper::get("select * from video order by id desc limit 5");
        if($video->num_rows > 0){
            $i=1;
            while($row=$video->fetch_assoc()){
                if($i == 10){
                    $i=1;
                }
                ?>
                <div class="audio_cardss">
                <div style="position: relative; text-align: center;">
                <a href="view_single_video.php?id=<?php echo $row["id"];?>"  style="position: absolute;  top: 50%; left: 50%; transform: translate(-50%, -50%);"><img style="border-radius: 0px;;width: 40px; height:40px;" src="images/playicon.png" alt=""></a>
                <img style="height: 80px; width:80px;    border-top-right-radius: 10px; border-bottom-right-radius: 10px; " src="images/video/<?php echo $row["image"]; ?>" alt="Avatar">
                </div>
                
                <div class="audio_contaimer">
                <a href="view_single_video.php?id=<?php echo $row["id"];?>"> <p style="color:black; padding-bottom:10px; height:70px; overflow:hidden"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
                $i++;
            }
          }
        ?>  
        </div>
           </div>

           <div class="col-lg-8 col-md-8 col-sm-12">
           <div style=" width:100%;">
            <h2 class="subtitle fancy" style="text-align: center; margin-bottom:0px">
            <span>توره بوړه سټوډیو</span></h2>
            </div>
            <br>
            <hr style="width: 100%; margin:0px;">

           <div class="specific_video">
           <?php
            $video=DBHelper::get("select * from video where video_cat=1 order by id desc limit 4");
            if($video->num_rows > 0){
                while($row=$video->fetch_assoc()){
                    ?>
                    <div class="items_video" style="background-color:black;">
                    <div style="position: relative; text-align: center;">
                    <a href="view_single_video.php?id=<?php echo $row["id"];?>"  style=" position: absolute; bottom: 8px;  right: 16px;">
                    <img style="border-radius: 0px;;width: 40px; height:40px;" src="images/new_play.png" alt="">
                    </a>
                    <a href="view_single_video.php?id=<?php echo $row["id"];?>">
                    <img style="width: 100%; height:220px; border-radius:15px;" src="images/video/<?php echo $row["image"];?>" alt="">
                    </a>
                     <h4 style="position: absolute; bottom: 3px;  right: 65px; color:white; height:40px; overflow:hidden"><?php echo $row["title"];?></h4>
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
        
        </div>
        </div>

      

                 <!-- Video Section Start -->
                 <div  class="container-fluid main_div">
         <h2  style="font-family:pashto;text-align: center; margin-top:0px; margin-bottom:25px;">فلمونه او ترانې</h2>
         <hr style="width: 100%; margin:0px; margin-bottom:15px;">
         <div class="sub_div">
        <?php
        $video=DBHelper::get("select * from video order by id desc limit 10");
        if($video->num_rows > 0){
            while($row=$video->fetch_assoc()){
                ?>
               
                <div class="cards">
                <div style="position: relative; text-align: center;">
                <a href="view_single_video.php?id=<?php echo $row["id"];?>"  style="position: absolute;  top: 50%; left: 50%; transform: translate(-50%, -50%);"><img width="50" height="50" src="images/playicon.png" alt=""></a>
                <img class="imags" src="images/video/<?php echo $row["image"];?>" alt="Avatar" style="width:100%">
                </div>
                <div class="containers">
                <p style="color:gray; text-align:right; margin:5px 0;">Date: <?php echo explode(" ",$row["date"])[0]; ?></p>
                <a href="view_single_video.php?id=<?php echo $row["id"];?>"> <p style="color:black; margin-top:0px;"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
            }
        }
        ?>
        </div>
        </div>
        <!-- Video Section End -->



         <!-- Audio start -->
         <div class="container-fluid main_div">
         <h2 style="font-family:pashto;text-align: center; margin-top:0px; margin-bottom:25px;">پښتو ترانې</h2>
         <hr style="width: 100%; margin:0px; margin-bottom:15px;">
         <div style="display: flex; flex-direction:row-reverse; flex-wrap:wrap">
         <div class="audio_play_dev">
         <?php
         $fav=DBHelper::get("SELECT * from audio WHERE fav=1 ORDER BY id DESC LIMIT 1;")->fetch_assoc();
         $type=explode(".",$fav["audio_file"])["1"];
        ?>
         <audio preload controls style="width:100%;border-radius: 20px; height:160px; background-image: url(images/audio_back.gif);  background-repeat: no-repeat;background-size: cover;">
            <source src="audio/<?php echo $fav['audio_file'];?>" type="audio/<?php echo $type; ?>">
         </audio> 

         <div class="container-fluid">
             <div class="row">
             <div class="col-lg-4 col-md-4 col-sm-4">
             <a style="margin-left: 10px;" download href="audio/<?php echo $fav['audio_file'];?>" class="btn btn-primary">Download</a>
             </div>
                 <div class="col-lg-8 col-md-8 col-sm-8">
                 <p style="text-align:right; margin-bottom:2px;">Date: <?php echo explode(" ",$fav["date"])[0]; ?></p>
                 <p style="text-align:right; margin-bottom:2px;">View: <?php echo explode(" ",$fav["view"])[0]; ?></p>
                 </div>
                
             </div>
         </div>
         <h4 style="text-align:right; font-wight:bold; padding:0px 7px"><?php echo $fav["title"]; ?></h4>

         </div>
        <div class="audio_seciond_list">
        <div class="sub_div">
        <?php
        $video=DBHelper::get("select * from audio where fav != 1 order by id desc limit 6");
        if($video->num_rows > 0){
            $i=1;
            while($row=$video->fetch_assoc()){
                if($i == 10){
                    $i=1;
                }
                ?>
                <div class="audio_card">
                <div style="position: relative; text-align: center;">
                <a href="View_Audio.php?id=<?php echo $row["id"];?>"  style="position: absolute;  top: 50%; left: 50%; transform: translate(-50%, -50%);"><img style="border-radius: 0px;;width: 40px; height:40px; background-color:white; padding:5px; border-radius:50px" src="images/audio_play_icon.png" alt=""></a>
                <img style="height: 80px;" src="images/audio/<?php echo $i; ?>.jpg" alt="Avatar">
                </div>
                
                <div class="audio_contaimer">
                <a href="View_Audio.php?id=<?php echo $row["id"];?>"> <p style="color:black; padding-bottom:10px; height:70px; overflow:hidden"><?php echo $row["title"];?></p></a>
                </div>
                </div>
              
                <?php
                $i++;
            }
          }
        ?>
        </div>
        </div>
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