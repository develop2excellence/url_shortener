<?php
session_start();
require_once 'function/function.php';

if(isset($_POST['url']) && !empty(($_POST['url']))){
  
  $url = $_POST['url'];
  if($code = makeCode($url)){
    // $url = getUrl($code);
 $_SESSION['feedback'] = "short version of <b> $url </b> is  :<a href=\"$url_path{$code}\">$url_path{$code}</a>";
  }
 else {
  $_SESSION['feedback'] = "<p class='bg-danger'>oops, invalid URL perhaps ?</p>";     
  }
}

header('location:index.php');