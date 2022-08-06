<footer id="footer">
                <div class="footer_top">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInLeft">
                            <h2>Follow By Email</h2>
                            <div class="subscribe_area">
                                <p>"Subscribe here to get our newsletter, it is safe just Put your Email and click subscribe"</p>
                                <form action="#" method="post">
                                    <div class="subscribe_mail">
                                        <input required name="email" class="form-control" type="email" placeholder="Email Address">
                                        <i class="fa fa-envelope"></i></div>
                                    <input name="submitemailsubscribe" class="submit_btn" type="submit" value="Submit">
                                </form>
                            
                                <?php 
                                if(isset($_POST["submitemailsubscribe"])){
                                 $email=$_POST["email"];
                                 if(DBHelper::set("INSERT INTO `subscribe`(`email`) VALUES ('{$email}')"))
                                 {
                                    ?>
                                    <script>alert("Successfully submitted!")</script>
                                   <?php
                                   }
                                 else{
                                    ?>
                                     <script>alert("Email exist!")</script>
                                    <?php
                                    }
                                }
                                
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInLeft">
                            <h2>Popular Blog</h2>
                            <ul class="catg3_snav ppost_nav">

                                 <?php
                                    $popular=DBHelper::get("SELECT * from blog ORDER by VIEW DESC LIMIT 3");
                                    if($popular->num_rows > 0){
                                    while($row=$popular->fetch_assoc()){
                                        ?>
                                        <li>
                                        <div class="media" style="direction: rtl;">
                                        <a href="blog/blog-single?id=<?php echo $row["id"];?>" class="media-left">
                                        <img alt="" src="images/blog/<?php echo $row["image"];?>" style="border-radius: 8px;">
                                        </a>
                                        <div class="media-body">
                                        <a href="blog/blog-single?id=<?php echo $row["id"];?>" class="catg_title" style="text-align:right; padding-right:7px; font-size:15px">
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
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInRight">
                            <h2>Labels</h2>
                            <ul class="footer_labels">
                            <?php
                            $label=DBHelper::get("SELECT * from blog_cat LIMIT 20;");
                            if($label->num_rows > 0){
                                while($row=$label->fetch_assoc()){
                                    ?>
                                      <li><a href="blog/blog?cat_search=<?php echo $row["id"];?>"  style="font-size:15px"><?php echo $row["name"];?></a></li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInRight">
                            <h2>Contact Form</h2>
                            <form action="#" class="contact_form" method="POST">
                                <label>Name</label>
                                <input name="name" required class="form-control" type="text">
                                <label>Email*</label>
                                <input name="email" required class="form-control" type="email">
                                <label>Message*</label>
                                <textarea name="message" required class="form-control" cols="30" rows="10"></textarea>
                                <input name="submitcontactform" class="send_btn" type="submit" value="Send">
                            </form>
                        </div>
                    </div>

                    <?php
                    if(isset($_POST['submitcontactform'])){
                     $name=$_POST["name"];
                     $email=$_POST["email"];
                     $message=$_POST["message"];
                     if(DBHelper::set("INSERT INTO `contact`(`name`, `email`,`message`) VALUES ('{$name}','{$email}','{$message}')"))
                     {
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

                </div>
                <div class="footer_bottom">
                    <div class="footer_bottom_left">
                        <p>Copyright &copy; Abdul Basit (tcomprog@gmail.com)</p>
                    </div>
                    <div class="footer_bottom_right">
                        <ul>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Googel+" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Rss" href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>

<script src="assets/js/jquery.min.js"></script>
<script src="include/js/design.js"></script>
<script src="news_headline/assets/js/acmeticker.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.my-news-ticker').AcmeTicker({
            type:'marquee',/*horizontal/horizontal/Marquee/type*/
            direction: 'left',/*up/down/left/right*/
            speed: 0.05,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
            controls: {
                toggle: $('.acme-news-ticker-pause'),/*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
            }
        });
    })

</script>



<script type="text/javascript">

function DropDown(el) {
    this.dd = el;
    this.initEvents();
}
DropDown.prototype = {
    initEvents : function() {
        var obj = this;

        obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            event.stopPropagation();
        });	
    }
}

$(function() {

    var dd = new DropDown( $('#dd') );

    $(document).click(function() {
        // all dropdowns
        $('.wrapper-dropdown-2').removeClass('active');
    });

});

</script>

            
