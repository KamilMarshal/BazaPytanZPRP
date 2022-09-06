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
    <h2>30 pytań</h2>
    
    <div id="questions">
        <form action="fullanswer.php" method="POST">
            <?php 
            for($a=1;$a<31;$a+=1)
            {
                echo '<div class="answers">';
                $idQ = rand(0,399);
                //$idQ = 98;
                $_SESSION["fqid"][$a] = $idQ;
                $sql = "SELECT * FROM questions where id = ".$idQ;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                    $row = $result->fetch_array();

                    echo $a.". ";
                    echo $row[2]."<br/><br/>";

                    for($i = 1; $i<10; $i+=1)
                        if($row[$i+2]!="")
                        {
                            echo '<input type="hidden" name="odp'.$a.$i.'" value="0" />';
                            echo '<input type="checkbox" name="odp'.$a.$i.'" value="1" />';
                            echo '<label for="odp'.$i.'">'.$row[$i+2].'</label><br>';
                        }
                        
                } 
                echo '</div>';
            }
            echo '<input type="submit" value="Sprawdź">';
            $conn->close();
            ?>
        </form>                
    </div>    
    


</div>
</body>
</html>