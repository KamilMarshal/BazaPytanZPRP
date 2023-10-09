<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" >
    <title>Baza Pytań ZPRP</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div id = "container">
    <div id = "header">
    <h1>MENU</h1>
    <h2>Witaj 
        <?php 
        include("connection.php");
            echo($_SESSION["username"]);
        ?>!
    </h2>
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
        <h3>Wybierz co chcesz robić ;)</h3>
    </div>
</div>
</body>
</html>