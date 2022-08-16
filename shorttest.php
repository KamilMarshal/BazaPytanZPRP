<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Baza Pytań ZPRP</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div id="container">
    <h3>Zalogowano 
            <?php 
            include("connection.php");
                echo($_SESSION["username"]);
            ?>!
    </h3>    
    <h2>1 pytanie</h2>
    
    <div id="questions">
        <form>
            <?php 
                include("connection.php");
                $idQ = rand(0,399);
                $sql = "SELECT * FROM questions where id = ".$idQ;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                    // output data of each row
                    $row = $result->fetch_array();

                    echo $row[1]."<br/>";
                    echo $row[2]."<br/>";

                    for($i=3;$i<(count($row))-3;$i++)
                    {
                        echo '<input type="checkbox" id ="odp'.$i.'"><br/>';
                        echo '<label for="odp'.$i.'">'.$row[$i].'</label><br>';
                    }
                    
                } 

                  $conn->close();



            ?>            
        </form>
    </div>
    
    


</div>
</body>
</html>