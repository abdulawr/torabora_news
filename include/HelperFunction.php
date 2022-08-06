<?php 
 function validateInput($value)
 {
   $data = trim($value);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = $GLOBALS["con"]-> real_escape_string($data);
  return $data;
 }

 function is_english($str)
 {
   if (strlen($str) != strlen(utf8_decode($str))) {
     return false;
   } else {
     return true;
   }
 }
?>