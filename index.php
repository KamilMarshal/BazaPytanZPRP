<?php session_start();?>
<!DOCTYPE html>
<html>
<head lang="pl">
    <meta charset="UTF-8">
    <title>Baza Pytań ZPRP</title>
    <link rel="stylesheet" href="css/style.css">
    <script src = "scripts.js"></script>
</head>
<body>
<div id = "container">
    <div id = "header">
        <h1>Witaj na stronie sprawdzającej przepisy Piłki Ręcznej!</h1>
    </div>
    <div id = "menu"></div>
    <div id = "content" style="text-align:center;">
        <h2>Logowanie</h2>
        <form action="authentication.php" onsubmit = "return validation()" method="POST">
                <input type="text" name="login" id="login" placeholder="Podaj login"><br>
                <input type="password" name="password" id="password"  placeholder="Podaj hasło"><br>
                <input type="submit" value="Zaloguj">
        </form>
    </div>
</div>
</body>
</html>