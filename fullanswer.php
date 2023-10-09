<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />    
  <?php
  include("connection.php");
  echo (' <link rel="stylesheet" href="css/style.css">');
  $_SESSION["RpktSum"] = 0;
  ?>  
    
</head>

<body>
  <div id="container">
    <div id="header">
      <h1>Rozwiązuj 30 pytań - odpowiedzi</h1>
    </div>
    <div id="menu">
      <div class="wypelniacz">
        <a href="allquestions.php">
          <h2>Przeglądaj pytania</h2>
        </a>
      </div>
      <div class="wypelniacz">
        <a href="shorttest.php">
          <h2>Rozwiązuj 1 pytanie</h2>
        </a>
      </div>
      <div class="wypelniacz">
        <a href="fulltest.php">
          <h2>Rozwiązuj 30 pytań</h2>
        </a>
      </div>
      <div class="answers">
        <?php
          echo 'Wynik: '.($_SESSION["RpktSum"]/30).'%<br>';
          echo 'Punkty: '.$_SESSION["RpktSum"].'/30pkt<br>';
        ?>
      </div>

    </div>
    <div id="content">
      <?php

      for ($a = 1; $a < 31; $a += 1) {
        echo '<div class="answers">';

        for ($i = $a * 10; $i < ($a * 10 + 10); $i += 10) //wczytywanie moich odp
          for ($j = 1; $j < 10; $j += 1) {
            if (isset($_POST["odp" . ($i + $j)])) {
              $odp[$a][$j] = $_POST["odp" . ($i + $j)]; //moje odpowiedzi
            }
          }

        $sqlQ = "SELECT * FROM questions WHERE id = {$_SESSION["fqid"][$a]}";
        $sqlA = "SELECT * FROM answers WHERE idAns = {$_SESSION["fqid"][$a]}";

        $Ans = $conn->query($sqlA)->fetch_array(); //poprawne odpowiedzi

        $result = $conn->query($sqlQ);

        if ($result->num_rows > 0) {
          $row = $result->fetch_array(); //pytania
          echo '<span>' . $a . ". " . $row[2] . '<br/><br/></span>';
          $point = 1;

          for ($i = 1; $i < 10; $i += 1)
            if ($row[$i + 2] != "") {
              if ($Ans[$i]) {
                echo '<span style="color:green";<br>';
                if ($odp[$a][$i] == $Ans[$i]) echo "✔️";
                else {
                  echo "❌";
                  $point = 0;
                }
                echo ' ' . $row[$i + 2] . '<br>';
              } else {
                echo '<span style="color:red";<br>';

                if ($odp[$a][$i] == $Ans[$i]) echo "✔️";
                else {
                  echo "❌";
                  $point = 0;
                }
                echo ' ' . $row[$i + 2] . '<br>';
              }
              echo '</span>';
            }
        }

        if ($point == 1){
          echo '<span class="pkt">1 punkt</span>';
          $_SESSION["RpktSum"] += 1;
        }
        else echo '<span class="pkt">0 punktów</span>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</body>

</html>