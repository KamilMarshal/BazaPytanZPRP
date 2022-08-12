<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Baza Pytań ZPRP</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div id="container">
    <h1>MENU</h1>
    <h2>Witaj <?php echo($_POST['login'])?>!</h2>
    <div class="log">
        <?php
        $server = 'localhost';
        $username = $_POST['login'];
        $password = $_POST['haslo'];
        $db = 'baza_pytan_zprp';

        $conn = mysqli_connect($server, $username, $password, $db);

        if($conn) echo("zalogowano");

        else echo 'Błędne hasło';


        ?>
    </div>
    <div class="wypelniacz">
        <h2>Przeglądaj pytania</h2>
    </div>
    <div class="wypelniacz">
        <h2>Rozwiązuj 1 pytanie</h2>
    </div>
    <div class="wypelniacz">
        <h2>Rozwiązuj 20 pytań</h2>
    </div>


</div>
</body>
</html>