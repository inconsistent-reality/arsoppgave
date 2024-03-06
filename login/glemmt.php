<?php
session_start();

include("..koble.php");

$melding = "";
$fyllut = "epost Adresse<input type='text' name='epost'>";


    if(isset($_POST['submit'])){
        if(isset($_POST['nyttpass'])){
        


        }
        else if(isset($_POST['epost'])){
            $epost=$_POST['epost'];

            $query="SELECT * FROM users WHERE email='$epost' ";
            $result = mysqli_query($con, $query);
            if($result){
                $fyllut = "
                nytt passord:
                <input type='text' name='nyttpass'> 

                <br><br>
                gjennta passord:
                <input type='text' name='gjennpass'>"; 
            }else{      
                $melding = "";
            }


        }


    }
?>
<html>

<head>
    <link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
    <link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Innlogging</title>
</head>

<body>

<div class="meny">
        <a class="orange" href="../index.php">Hjem</a>
        <a class="orange" href="../php/Meny.php">Meny</a>
        <a class="orange" href="../php/Anmeldelse.php">Anmeldelse</a>
        <a class="darkorange" href="../php/bord.php">Bord</a>
        <a class="orange" href="../php/FAQ.php">FAQ</a>
        <a class="orange" href="../php/tickting/ticket.php">ticket</a>
        <a class="orange" href="../php/BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') {?>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') {?>
                <a class="orange" href="../php/tickting/brukerS.php">støtte</a>
        <?php } } ?>
        <a class="orange" href="../php/showBB.PHP">se Bygg</a>

        <?php
        if ($_SESSION) {
            echo '<a class="orange" href="../php/passord.php">passord</a>';

            echo '<a class="orange" href="logout.php">logout</a>';
        } else {
            echo ' <a class="orange" href="inLOG.php">login</a>';
        }
        
        ?>
    </div>
    <div class="login center">
        <h1>Resett passord:</h1>
        <?php echo $melding; ?>
        <form method="post" class="center">
            <?php echo $fyllut; ?>
            <br>
            <input type="submit" value="forny passord" name="submit" />

        </form>
        <p>Registrere deg <a href="registration.php">her</a>
    </div>
    
    <br>
    <div class="bunntext bunn">
        KONTAKT OSS OM SPØRSMÅL OG RESSERVASJONER
        <div class="kon">
            <p>Tlf: XXXXXXXXX</p>
            <p>Epost: NEI@GMAIL.COM</p>
            <p>Adresse: xxxx gate xx</p>





        </div>
        <div class="classTest"></div>

</body>

</html>