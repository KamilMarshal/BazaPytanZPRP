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
       
    <div id = "header">
    <h1>Rozwiązuj 1 pytanie</h1>
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
        <div class="answers">
            <form action="shortanswer.php" method="POST">
                <?php 
                    include("connection.php");
                    $idQ = rand(0,399);
                    //$idQ = 98;
                    $_SESSION["qid"] = $idQ;
                    $sql = "SELECT * FROM questions where id = ".$idQ;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        // output data of each row
                        $row = $result->fetch_array();

                        echo $row[1]."<br/>";
                        echo $row[2]."<br/><br/>";

                        for($i = 3; $i<12; $i+=1)
                            if($row[$i]!="")
                            {
                                echo '<input type="hidden" name="odp'.$i.'" value="0" />';
                                echo '<input type="checkbox" name="odp'.$i.'" value="1" />';
                                echo '<label for="odp'.$i.'"> '.$row[$i].'</label><br>';
                            }
                            echo '<br><input type="submit" value="Sprawdź">';
                    } 

                    $conn->close();
                ?>
            </form> 
        </div>                   
    
    </div> 

</div>
</body>
</html>