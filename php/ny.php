<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
    <link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
</head>
<body>
<div class="forsidebildet"></div>
    <div class="frosidemeny">
        <div class="linker forsidelinker">
        <a class="darkorange" href="index.php">Hjem</a>
        <a class="orange" href="php/Meny.php">Meny</a>
        <a class="orange" href="php/Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="php/bord.php">Bord</a>
        <a class="orange" href="php/FAQ.php">FAQ</a>
        <a class="orange" href="php/tickting/ticket.php">ticket</a>
        <a class="orange" href="php/BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') { ?>
        <a class="orange" href="php/tickting/brukerS.php">støtte</a>
        <?php } ?>
        <a class="orange" href="php/showBB.PHP">se Bygg</a>

        </div>
     
      
      
    <h1>heisann  <?php echo $_SESSION['username']?> </h1>
</body>
</html>