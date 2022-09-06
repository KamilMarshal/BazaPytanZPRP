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

    $sqlA = "SELECT * FROM answers WHERE idAns = {$_SESSION["qid"]}";
    $sqlQ = "SELECT * FROM questions WHERE id = {$_SESSION["qid"]}";

    $Ans = $conn->query($sqlA)->fetch_array();

    $result = $conn->query($sqlQ);
    if ($result->num_rows > 0) 
    {
      $row = $result->fetch_array();

      echo '<div class="answers">';
      echo '<span>'.$row[1].'<br></span>';
      echo '<span>'.$row[2]."<br/><br/></span>";

      $point = 1;
      
      for($i = 1; $i<10; $i+=1)
      
          if(isset($row[$i+2]))
          {
            
              
              if($Ans[$i])
              {
                echo '<span style="color:green";<br>';
                if($odp[$i]==$Ans[$i]) echo "✔️";
                else
                {
                  echo "❌";
                  $point = 0;
                }
                echo ' '.$row[$i+2].'<br>';
              }
              else
              {
                echo '<span style="color:red";<br>';
                if($odp[$i]==$Ans[$i]) echo "✔️";
                else
                {
                  echo "❌";
                  $point = 0;
                }
                echo ' '.$row[$i+2].'<br>';
                
              }
              echo '</span>';
          }
          echo '<div>';
          
    }
    
    if ($point == 1)
    echo '<span class="pkt">1 punkt</span>';
    else echo '<span class="pkt">0 punktów</span>';
    echo '</div>';
    echo '<a href="shorttest.php"><button>Następne pytanie</button></a>';
    
    

    ?>
</div>
</body>
</html>