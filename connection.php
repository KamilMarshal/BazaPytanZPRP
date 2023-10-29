<?php      
    $host = "localhost";  

    /*$user = "root";  
    $password = ''; 
    $db_name = "marshalpl"; */

    $user = "id21375490_marshalpl";  
    $password = '-TAH!xyd6Y6uV9ns';  
    $db_name = "id21375490_marshalpl";  
      
    $conn = new mysqli($host, $user, $password, $db_name);  
    if($conn->connect_error) {  
        die("Failed to connect with MySQL: ". $conn->connect_error);  
        echo("Failed to connect");
    }  
    else
    {
       // echo("Connected");
    }
    global $sess;
?>