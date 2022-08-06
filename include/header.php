<?php
include("include/conn.php");
include("include/DBHelper.php");
include("include/Encryption.php");
include("include/HelperFunction.php");
$company=DBHelper::get("select * from company_info")->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $company["name"];?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="include/css/style.css">
    <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16"> 
    <link rel="stylesheet" href="news_headline/assets/css/style.css">

    <style>
        .containerss {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}

.contentssdfdf h4{
          font-weight: bold;
        }
        .contentssdfdf p{
          font-size: 17px;
          font-weight: normal;
          margin-top: 15px;
          margin-bottom: 15px;
        }


@font-face {
        font-family: pashto;
        src: url(fonts/pashto.ttf);
        }
        *{
            font-family: pashto;
        }
    </style>
    
    <!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>