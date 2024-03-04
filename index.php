<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/style/style.css" media="screen and (min-device-width: 800px)">
<link rel="stylesheet" href="/style/phonestyle.css" media="screen and (max-device-width: 800px)">



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>terminoppgave</title>

</head>
<body>
    <div class="frosidemeny">
        <div class="linker">
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

        <?php
        if($_SESSION){
            echo '<a class="orange" href="/php/passord.php">passord</a>';

            echo '<a class="orange" href="/login/logout.php">logout</a>'; 
        }
        else{
            echo ' <a class="orange" href="/login/inLOG.php">login</a>'; 
        }
         ?>
       

        </div>
        <div class="H1"> 
     <h1>
        TERMIN RESTAURANT BURGER
    </h1>  
 </div>
    </div>
    <?php
            



    ?>
    
    <div class="OmOss">
        <h2>
        Velkommen til oss<?php
        if($_SESSION){
            if ( $_SESSION['admin']=='Admin'){
                echo ' sjef';
            }else{
                echo ' lojale kunde';
            }
         echo ", ", $_SESSION['username']; 
        }
        //else if ($_SESSION['admin']==value 0 ''){echo '';
         ?>
    </h2 >
        JEG LIKER BURGER SÅ JEG LAGDET EN RESTAURANT :-p
    </div>
    
    <br><br><br><br><br>
    <div class="qr-box">
        <img class="qr" src="../bilder/burgere/totaly legit.png" alt="">
    </div>
<br>
    <div class="bunntext">
                KONTAKT OSS OM SPØRSMÅL OG RESERVASJONER
                <div class="kon">
                    <p>Tlf: XXXXXXXXX</p>
                    <p>Epost: NEI@GMAIL.COM</p>
                    <p>Adresse: xxxx gate xx</p>





                </div>

    </div>

 

</body>
</html>