<?php
require_once 'config.php';
   
   
$db = @mysqli_connect($server, $user, $password, $my_db);
if (!$db) {
    echo "Error: Unable to connect." . PHP_EOL;
       exit;
}

//mysqli_close($db);

