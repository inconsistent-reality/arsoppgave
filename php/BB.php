<?php
session_start();
include("koble.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $drop = "topb.png";
    $drop1 = $_POST['drop1holder'];
    $drop2 = $_POST['drop2holder'];
    $drop3 = $_POST['drop3holder'];
    $drop4 = $_POST['drop4holder'];
    $drop5 = $_POST['drop5holder'];
    $drop6 = $_POST['drop6holder'];
    $drop7 = $_POST['drop7holder'];
    $drop8 = "bottom.png";
    $tid = date('Y-m-d H:i:s');

    if ($_SESSION) {
        $brukernavn = $_SESSION['username'];
    } else {
        $brukernavn = "Navnløss";
    }


    $sql = "INSERT INTO borgar (brukernavn, tid, drop0, drop1, drop2, drop3, drop4, drop5, drop6, drop7, drop8) VALUES ('$brukernavn', '$tid', '$drop', '$drop1', '$drop2', '$drop3', '$drop4', '$drop5', '$drop6', '$drop7', '$drop8')";

    // echo $sql;

    // echo "<script>console.log('kjører')</script>";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
    <link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
    <title>Document</title>
</head>

<body>
    <div class="meny">
        <a class="orange" href="/index.php">Hjem</a>
        <a class="orange" href="/php/Meny.php">Meny</a>
        <a class="orange" href="/php/Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="/php/bord.php">Bord</a>
        <a class="orange" href="/php/FAQ.php">FAQ</a>
        <a class="orange" href="/php/tickting/ticket.php">ticket</a>
        <a class="darkorange" href="/php/BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') { ?>
                    <a class="orange" href="tickting/brukerS.php">støtte</a>
        <?php } ?>
        <a class="orange" href="showBB.PHP">se Bygg</a>

        
        <?php
        if ($_SESSION) {
            echo '<a class="orange" href="passord.php">passord</a>';

            echo '<a class="orange" href="../login/logout.php">logout</a>';
        } else {
            echo ' <a class="orange" href="../login/inLOG.php">login</a>';
        }
        
        ?>
    </div>

    <h1 class="epi overskrift">
        BYGG DIN EGEN BURGER
    </h1>
    <div class="epiline line"></div>
    <br>
    <div class="ombygg">
    <div class="tk overskrift">
    Bygg din burger for kun 399.99kr
        </div>    
    
I vår restaurant kan du oppleve det ultimate i tilpasning med vårt unike tilbud om å skape din egen burger.<br>
 Ved å dra og slippe ulike toppings inn i et praktisk grid, kan du skreddersy hver bit etter dine ønsker.<br>
  Velg fra et imponerende utvalg av ferske ingredienser, inkludert saftige biffburgere, sprø grønnsaker, smakfull chedar og deilig hjemmelagdt Ketchup og majones.<br>
   Enten du foretrekker en klassisk kombinasjon eller ønsker å eksperimentere med nye smaker, gir vår sammensetningsmulighet deg frihet til å lage den perfekte burgeren.<br>
    Ta kontroll over din matopplevelse og nyt en smakfull reise med hver bit. Besøk oss i dag og utforsk mulighetene!</div>

    <br><br>
    <div class="tk overskrift">
velg hvilke og hvor du ønsker å ha toppingen på din burger  <div class="hart">❤❤🍔</div> <p> 
        </div>
        <div class="designtext">
            Dra toppingen du ønsker fra menyen på høyere side, og slipp den over det hvite feltet på venstre side            
    </div>

        <div class="fixed fixed-place">
            
            <div class="fixedflex">
                <div>
                    <img class="ingimg" id="drag3" alt="lok.png" src="../bilder/lok.png" draggable="true"
                        ondragstart="drag(event)" width="336" height="69">
                    <br>
                    <img class="ingimg" id="drag4" alt="Ketchup.png" src="../bilder/Ketchup.png" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                    <img class="ingimg" id="drag5" alt="patty.avif" src="../bilder/patty.avif" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                </div>
                <div>
                    <img class="ingimg" id="drag7" alt="let.jpg" src="../bilder/let.jpg" draggable="true"
                        ondragstart="drag(event)" width="336" height="69">
                    <br>
                    <img class="ingimg" id="drag8" alt="tomatoes.png" src="../bilder/tomatoes.png" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                    <img class="ingimg" id="drag1" alt="bacong.png" src="../bilder/bacong.png" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                </div>
                <div>
                    <img class="ingimg" id="drag2" alt="agurk.png" src="../bilder/agurk.png" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                    <img class="ingimg" id="drag9" alt="majones.png" src="../bilder/majones.png" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                    <img class="ingimg" id="drag10" alt="bottom.png" src="../bilder/bottom.png" draggable="true"
                        ondragstart="drag(event)">
                    <br>
                </div>
            </div>
            <div class="fixedflex">

                <img class="ingimg" id="drag" alt="cheddar-cheese.jpg" src="../bilder/cheddar-cheese.jpg"
                    draggable="true" ondragstart="drag(event)">
                <br>

<img class="ingimg" id="drag11" alt="none" src="../bilder/none.png" draggable="true"
    ondragstart="drag(event)">
<br>

<img class="ingimg" id="drag12" alt="kløk.png" src="../bilder/kløk.png" draggable="true"
    ondragstart="drag(event)">
<br>
            </div><br>
            <form method="POST" class="createform fixedflex">
                <input value="none" type="hidden" name="dropholder" id="dropholder">
                <input value="none" type="hidden" name="drop1holder" id="drop1holder">
                <input value="none" type="hidden" name="drop2holder" id="drop2holder">
                <input value="none" type="hidden" name="drop3holder" id="drop3holder">
                <input value="none" type="hidden" name="drop4holder" id="drop4holder">
                <input value="none" type="hidden" name="drop5holder" id="drop5holder">
                <input value="none" type="hidden" name="drop6holder" id="drop6holder">
                <input value="none" type="hidden" name="drop7holder" id="drop7holder">
                <input value="none" type="hidden" name="drop8holder" id="drop8holder">
                <input value="none" type="hidden" name="drop9holder" id="drop9holder">
                <input type="submit" class="bestillknapp">
            </form>
        </div>

    <div class="flex allbygg">

        <div class="drop-container-container-container">
            
            <div class="drop-container-container">
                <div value="nothing" class="drop-container-pic">
                    <img class="ingimg" src="../bilder/topb.png" alt="">
                </div>
                <div value="nothing" class="drop-container-pic" id="drop1-hold"></div>
                <div value="nothing" class="drop-container-pic" id="drop2-hold"></div>
                <div value="nothing" class="drop-container-pic" id="drop3-hold"></div>
                <div value="nothing" class="drop-container-pic" id="drop4-hold"></div>
                <div value="nothing" class="drop-container-pic" id="drop5-hold"></div>
                <div value="nothing" class="drop-container-pic" id="drop6-hold"></div>
                <div value="nothing" class="drop-container-pic" id="drop7-hold"></div>
                <div value="nothing" class="drop-container-pic">
                    <img class="ingimg" src="../bilder/bottom.png" alt="">
                </div>
                <br>
            </div>
            <div class="drop-container-container">
                <div value="nothing" class="drop-invis"></div>

                <div value="nothing" class="drop-container" id="drop1" ondrop="drop(event, 'drop1')"
                    ondragover="allowDrop(event)"></div>
                <div value="nothing" class="drop-container" id="drop2" ondrop="drop(event, 'drop2')"
                    ondragover="allowDrop(event)"></div>
                <div value="nothing" class="drop-container" id="drop3" ondrop="drop(event, 'drop3')"
                    ondragover="allowDrop(event)"></div>
                <div value="nothing" class="drop-container" id="drop4" ondrop="drop(event, 'drop4')"
                    ondragover="allowDrop(event)"></div>
                <div value="nothing" class="drop-container" id="drop5" ondrop="drop(event, 'drop5')"
                    ondragover="allowDrop(event)"></div>
                <div value="nothing" class="drop-container" id="drop6" ondrop="drop(event, 'drop6')"
                    ondragover="allowDrop(event)"></div>
                <div value="nothing" class="drop-container" id="drop7" ondrop="drop(event, 'drop7')"
                    ondragover="allowDrop(event)"></div>

                <br>
            </div>
            
        <div class="fixed-line"> </div>
        </div>

    </div>






    <script src="../script/script.js"></script>
</body>

</html>