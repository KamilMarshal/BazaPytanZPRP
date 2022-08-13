<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "baza_pytan_zprp";  
      
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