<?php
session_start();
require_once 'function/function.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>shorten url</title>
        <link rel="stylesheet" href="css/style.css"/>
</head>
    <body>
        <div class="container">
            <h1 class="title">Shorten a URL</h1>
            <?php
            if(isset($_SESSION['feedback'])){
         echo "<p class=\"\bg-success\">{$_SESSION['feedback']}</p>";
           unset($_SESSION['feedback']);
            }
          // session that handle feedback
             //feedback_session();
            ?>
            
<form method="post" action="shorten.php" role="form">
    <input type="url" name="url" placeholder="enter your long url" autocomplete="off" />
    <input type="submit" value="Shorten" class="btn btn-danger"/>
</form>
        </div>
    </body>
</html>
