<?php
    require_once'config.php';
    require_once'connection.php';
   
 function makeCode($url){
   //function that check and purify url for sql   
   $url = checkurl($url);
     
     $url = escape_string($url);
    //check if URL already exist
   $exist = query("SELECT code FROM links WHERE url = '{$url}'");
  
    if(num_rows($exist) > 0){
    while ($row = mysqli_fetch_object($exist)) {
           return $row->code;
       }
    }
   
  $inserted_code = query("INSERT INTO links(url,date_created)VALUES('{$url}',NOW())");
          //generate and store url code
         global $db;
          $code =  mysqli_insert_id($db);
         $code = generateCode($code);
       
       //update the record with the generated code
    query("UPDATE links SET code ='{$code}' WHERE url = '{$url}'");
          return $code;
 }
    
    
    
    function getUrl($code){
       // $code = escape_string($code);
        $code = query("SELECT url FROM links WHERE code = '$code'");
        
        if(num_rows($code) > 0){
      while ($row = mysqli_fetch_object($code)) {
           return $row->url;
       }
           
     }
 else {
        return "";
 }
   
       return "";
 }
    
    
    
    
    
   function generateCode($num){
        return base_convert($num, 10, 36);
        
    }
    
    function escape_string($clean){
        global $db;
  return trim(mysqli_real_escape_string($db,$clean));
 }
    
    
    function num_rows($result){
        return mysqli_num_rows($result);
    }
    
    function checkurl($url){
        //check if it is a vaild URL
   if(!filter_var($url, FILTER_VALIDATE_URL)){
              return " ";
        }
       else{
            return $url;
       }
  }
    
    
   function query($query){
        global $db;
      return mysqli_query($db, $query);
    }
    
    
function feedback_session(){
    
}