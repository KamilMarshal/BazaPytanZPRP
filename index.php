<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Baza Pytań ZPRP</title>
    <link rel="stylesheet" href="style.css">
    <script src = "scripts.js"></script>
</head>
<body>
<div id="container">
    <div class="wypelniacz"></div>
    <div id="header">
        <h1>Logowanie</h1>

        <form action="authentication.php" onsubmit = "return validation()" method="POST">
            <h2>Formularz</h2>
            <input type="text" name="login" id="login" placeholder="Login"><br>
            <input type="password" name="password" id="password"  placeholder="Hasło"><br>
            <input type="submit" value="Zaloguj">
        </form>

    </div>
    <div class="wypelniacz"></div>

</div>
</body>
</html>