<?php 
session_start();
include("../include/conn.php");
include("../include/DBHelper.php");
include("../include/Encryption.php");
include("../include/HelperFunction.php");

if(!isset($_SESSION["isAdminLogin"])){
  header("Location: index.php?error=true");
}
$companyinfo=DBHelper::get("SELECT * from company_info;")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $companyinfo["name"];?></title>
  <link rel="icon" href="../images/favicon.ico" type="image/gif" sizes="16x16"> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
 
  <style>
    .containersdf p,h4{
      text-align: right;
    }
  </style>
</head>