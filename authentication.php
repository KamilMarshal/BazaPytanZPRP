<?php session_start();?>
<!DOCTYPE html>
<html>
<head lang="pl">
    <meta charset="UTF-8">
  <?php
    include("connection.php");
    echo(' <link rel="stylesheet" href="css/style.css">');

    $username = $_POST["login"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE login = \"{$username}\" AND password = \"{$password}\"";

    $result = $conn->query($sql);
  ?>
</head>
<body>
  <div id="container">
    <div id="loginWindow">
      <span style="color:whitesmoke;">
        <?php
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                echo("Poprawnie zalogowano! <br/>");
                echo "Witaj ". $row["login"]. "!<br>";
                $_SESSION["username"] = $row["login"];                
                echo '<script>window.location.href = "menu.php";</script>';
              }
            } 
          else {
              echo("Błędny login lub hasło! <br/>");              
              echo '<script>window.location.href = "index.php";</script>';
            }
            $conn->close();
        ?>
      </span>
    </div>
  </div>
</body>
</html>