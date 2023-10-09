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
    <div id = "container">
    <div id = "header">
    <h1>Rozwiązuj 30 pytań</h1>
    </div>
    <div id = "menu">
        <div class="wypelniacz">
            <a href="allquestions.php"><h2>Przeglądaj pytania</h2></a>
        </div>
        <div class="wypelniacz">
            <a href="shorttest.php"><h2>Rozwiązuj 1 pytanie</h2></a>
        </div>
        <div class="wypelniacz">
            <a href="fulltest.php"><h2>Rozwiązuj 30 pytań</h2></a>
        </div>
    </div>
    <div id = "content">
    <form action="fullanswer.php" method="POST">
            <?php 
            include("connection.php");
            for($a=1;$a<399;$a+=1)
            {
                echo '<div class="answers">';
                $_SESSION["fqid"][$a] = $a;
                $sql = "SELECT * FROM questions where id = ".$a;
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
                            echo '&nbsp;<input type="hidden" name="odp'.$a.$i.'" value="1" />';
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
</div>
</body>
</html>