<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
<link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>

<body>
<div class="meny">
    <a class="orange" href="/index.php">Hjem</a>
        <a class="orange" href="/php/Meny.php">Meny</a>
        <a class="orange" href="/php/Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="/php/bord.php">Bord</a>
        <?php
        if($_SESSION){
            echo '<a class="darkorange" href="/login/logout.php">logout</a>'; 
        }
        else{
            echo ' <a class="orange" href="/login/inLOG.php">login</a>'; 
        }
         ?>
</div>
<div class="center">
    <h1>Er du sikker på at du vil logge ut</h1>
    <form action="" method="post">
        <input type="submit" name="submit" value="Ja, logg ut">
    </form>
    <a href="../index.php">
        <input type="submit" value="Nei, forbli inlogget"></a>

    <?php
    if (isset($_POST['submit'])) {
        $_SESSION = array();
        session_destroy();
        header("location: ../index.php");

    }
    ?>
    </div>
<br>
    <div class="bunntext bunn">
                KONTAKT OSS OM SPØRSMÅL OG RESERVASJONER
                <div class="kon">
                    <p>Tlf: XXXXXXXXX</p>
                    <p>Epost: NEI@GMAIL.COM</p>
                    <p>Adresse: xxxx gate xx</p>





                </div>
</body>

</html>