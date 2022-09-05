<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <?php
    include("connection.php");
    echo(' <link rel="stylesheet" href="css/style.css">');

?>
</head>
<body>
<div id="questions">
    <?php

    $odp[1] = $_POST["odp3"];
    $odp[2] = $_POST["odp4"];
    $odp[3] = $_POST["odp5"];

    for($i=6;$i<12;$i+=1)
    {
      if(isset($_POST["odp".$i]))
      {
          $odp[$i-2] = $_POST["odp".$i];
      }
    }

    $sql = "SELECT * FROM answers WHERE idAns = {$_SESSION["qid"]}";

    $result = $conn->query($sql);

    $row = $result->fetch_array();

    $x = 1;
    while(isset($odp[$x]))
    {
      echo '<span style="color:';
      if($odp[$x]==$row[$x])
      {
        echo "green;<br>";
        echo 'Odp '.chr($x+64).' poprawna!<br>';
      }
      else 
      {
        echo "red;<br>";
        echo 'Odp '.chr($x+64).' błędna!<br>';
      }


      echo '</span>';
      $x +=1;
    }


    ?>
</div>
</body>
</html>