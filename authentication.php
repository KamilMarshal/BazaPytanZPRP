<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
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
                header('Refresh: 1; URL=menu.php');
              }
            } else {
              echo("Błędny login lub hasło! <br/>");
              header('Refresh: 1; URL=index.php');
            }
            $conn->close();
        ?>
      </span>
    </div>
  </div>
</body>
</html>