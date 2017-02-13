<?php
 require_once 'function/function.php';
 
  if(isset($_GET['code'])){

      $code = $_GET['code'];
     
    if($url = getUrl($code)){
           echo $url;
     header("location:{$url}");
               die();
      }
  }
  header('location:index.php');
