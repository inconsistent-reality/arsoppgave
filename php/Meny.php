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

    <div class="meny">
        <a class="orange" href="/index.php">Hjem</a>
        <a class="darkorange" href="/php/Meny.php">Meny</a>
        <a class="orange" href="/php/Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="/php/bord.php">Bord</a>
        <a class="orange" href="/php/FAQ.php">FAQ</a>
        <a class="orange" href="/php/tickting/ticket.php">ticket</a>
        <a class="orange" href="/php/BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') { ?>
                <a class="orange" href="tickting/brukerS.php">støtte</a>
        <?php } ?>
        <a class="orange" href="showBB.PHP">se Bygg</a>

        <?php
        if ($_SESSION) {
            echo '<a class="orange" href="/php/passord.php">passord</a>';

            echo '<a class="orange" href="/login/logout.php">logout</a>';
        } else {
            echo ' <a class="orange" href="/login/inLOG.php">login</a>';
        }
        ?>
    </div>
    <h1 class="overskrift">
        MENY
    </h1>
    <div class="line"></div>
    <br>
    <div class="burgermeny">
            <!-- Burgermeny med forskjellige burgere -->

         <!--div class henter bilder fra en annen mappe og lenker de 2 sammen 
        FOR Å LINKE sammen mapper husk ..(gå ut av nåværende mappe)/(inn i ny mappe)navn på ny fill i ny mappe. 
    ../style/ style.css  --> 
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/cheeseburger.png" alt="">
            <h3>cheese burger</h3>
            <p>norsk sorfe kjøtt, ost fra norske bonde</p>
            <h4>G, N, M</h4>
        </div>
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/dubble-cheeseburger.png" alt="">
            <h3>dubble trouble
            </h3>
            <p> dobelt the meat no homo</p>
            <H3>B, E, SU, HV, M </H3>
        </div>
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/lonley-lettuse.png" alt="">
            <h3>lonely lettuce</h3>
            <p>burger uten ost, men med ketchup</p>
            <h3>H, SU, HV </h3>


        </div>
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/chunkey-cheese.png" alt="">
            <h3>chunk cheese</h3>
            <p>salat og ost I en en perfekt hamoni med kolesterol</p>
            <H3>HV, SY, M, SY,  </H3>

        </div>
    </div>
    <br><br>
    <div class="burgermeny">
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/tribble-heart-attack.png" alt="">
            <h3>triple heart attack
            </h3>
            <p>not big mack</p>
            <H3>SU, M, HA, </H3>
        </div>
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/smooth-cheese.png" alt="">
            <h3>smooth cheese
            </h3>
            <p>chunk cheese bare smooth</p>
            <H3>HA, M, SU, </H3>
        </div>
        <div class="burger">
            <img class="burger-img" src="../bilder/burgere/bigus-mackus.png" alt="">
            <h3>Bigus Macus</h3>
            <p>lovlig ikke big mack</p>
            <H3>SU, SY, M, HV, H, </H3>


        </div>
       
    </div>
     <div class="allergi">
        <!-- ALERGIER SLIKT AT DE  IKKE DØR OG KOMMERTILBAKE MED DET OFISELLE MAKERINGENE-->
<h1>Allergener:</h1>
<h3>B – Bygg, E – Egg, F – Fisk, H – Hvete, HA – Hasselnøtter,
 HV – Havre, M – Melk, MA – Mandel, N – Nøtter, P – Peanøtter,
  R – Rug, SP – Sennep, SD – Skalldyr, SL – Selleri, SU – Sulfitter,
   S – Sesam, SY – Soya</h3>
</div>
    <div>

 <!--dette er buntekst og alle div er for å sørge før at bun tekst forblir på bunene --> 
    </div>
    </div>
    <br>
    <br>
    <div class="bunntext">
        KONTAKT OSS OM SPØRSMÅL OG RESERVASJONER
        <div class="kon">
            <p>Tlf: XXXXXXXXX</p>
            <p>Epost: NEI@GMAIL.COM</p>
            <p>Adresse: xxxx gate xx</p>





        </div>

</body>

</html>