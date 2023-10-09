<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">

<head>
    < meta http-equiv="Content-Language" content="pl" >
    < meta charset="UTF-8" >
  <?php
  include("connection.php");
  echo (' <link rel="stylesheet" href="css/style.css">');
  ?>
</head>

<body>
  <div id="container">
    <div id="header">
      <h1>Rozwiązuj 1 pytanie - odpowiedź</h1>
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

    </div>
    <div id="content">
      <?php

      $odp[1] = $_POST["odp3"];
      $odp[2] = $_POST["odp4"];
      $odp[3] = $_POST["odp5"];

      for ($i = 6; $i < 12; $i += 1) {
        if (isset($_POST["odp" . $i])) {
          $odp[$i - 2] = $_POST["odp" . $i];
        }
      }

      $sqlA = "SELECT * FROM answers WHERE idAns = {$_SESSION["qid"]}";
      $sqlQ = "SELECT * FROM questions WHERE id = {$_SESSION["qid"]}";

      $Ans = $conn->query($sqlA)->fetch_array();

      $result = $conn->query($sqlQ);
      if ($result->num_rows > 0) {
        $row = $result->fetch_array();

        echo '<div class="answers">';
        echo '<span>' . $row[1] . '<br></span>';
        echo '<span>' . $row[2] . "<br/><br/></span>";

        $point = 1;

        for ($i = 1; $i < 10; $i += 1)

          if ($row[$i + 2] != "") {


            if ($Ans[$i]) {
              echo '<span style="color:#33cc33";<br>';
              if ($odp[$i] == $Ans[$i]) echo "✔️";
              else {
                echo "❌";
                $point = 0;
              }
              echo ' ' . $row[$i + 2] . '<br>';
            } else {
              echo '<span style="color:#ff3333";<br>';
              if ($odp[$i] == $Ans[$i]) echo "✔️";
              else {
                echo "❌";
                $point = 0;
              }
              echo ' ' . $row[$i + 2] . '<br>';
            }
            echo '</span>';
          }
        echo '<div>';
      }
      if ($point == 1) echo '<span>1 punkt</span>';
      else echo '<span class="pkt">0 punktów</span>';
      echo '<br><span>Objaśnienia: ' . $Ans[10] . '</span>';
      echo '</div><br>';
      echo '<a href="shorttest.php"><button>Następne pytanie</button></a>';
      echo '<a href="menu.php"><button>Wróć do menu</button></a>';



      ?>
    </div>
  </div>

</body>

</html>