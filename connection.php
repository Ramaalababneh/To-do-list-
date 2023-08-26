<?php 
    // arguments to check for connect
    $serverName  = 'localhost';
    $userName   = 'root'     ;
    $password   = ''         ;
    $dbName     = "todolist" ;
    //create connection ,,returns boolean value success or faild connectio
    $conn = mysqli_connect($serverName ,$userName ,$password,$dbName);
   if(!$conn)
   {
       die('Connection failed' . mysqli_connect_error()); //msg shows what exactly cause the error
    } 
?>