<script src = "scripts.js"></script>
<?php

include("connection.php");
//include("scripts.js");
$username = $_POST["login"];
$password = $_POST["password"];

$sql = "SELECT * FROM login WHERE login = \"{$username}\" AND password = \"{$password}\"";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Witaj ". ucfirst($row["login"]). "!<br>";
      $_SESSION["username"] = $row["login"];
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  //echo ("<script> filechange(\"menu.php\"); </script>");
  echo("<button onclick=\"location.href='menu.php'\">Click Me</button>");
  

?>