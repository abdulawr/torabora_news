<?php
$con=new mysqli("localhost","root","","afghan_news_project");
#$con->set_charset("utf8");  use when question mark is show in place of letter
if($con->connect_errno)
{
    die("Error occured while connecting with database");
}
?>