<?php
// Starter PHP-sesjonen for å kunne bruke $_SESSION-variabler

session_start();


// Inkluderer filen som inneholder databasekoblingen


include("koble.php");

$iBruk = "";
// Variabel for feilmeldinger eller informasjon til brukeren
if (isset($_POST['submit'])) // Sjekker om skjemaet er sendt inn

// isset betyr at du trykker start til å sende inn info til database
    // Sjekker om nødvendige skjemafelter er satt


{
    if (isset($_POST['Nr']) && isset($_POST['navn']) && isset($_POST['kommentar']) && isset($_POST['tid'])) {
       // Setter datoen til 1 (endre dette hvis du vil bruke dato)
       $dato = 1;
        $dato = 1;
        $Nr = $_POST['Nr'];
        $navn = $_POST['navn'];
        $kommentar = $_POST['kommentar'];
        $tid = $_POST['tid'];

        // Henter alle reservasjoner n fra bord-tabellen

        $query = "SELECT * FROM bord;";
        $result = mysqli_query($con, $query);

        // Henter alle reservasjoner fra bord-tabellen

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["Nr"] == $Nr && $row["tid"] == $tid) {
                $iBruk = "Bordet du valgte er dessverre reservert,<br>
                           vennligst velg et annet bord <br>
                           eller et annet klokkeslett";
            }
        }

        if (!empty($Nr) && !empty($navn) && !empty($tid) && $iBruk == "") {
   // Setter opp SQL-spørringen for å legge til en ny reservasjon
            $sql = "INSERT INTO bord (Nr, Navn, komentar, tid)
             VALUES ('$Nr', '$navn', '$kommentar', '$tid')";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die('Error: ' . mysqli_error($con));
            }
        }
    } elseif (isset($_POST["submit"]) && $_SESSION['admin'] == 'Admin') {
               // vis disse kriteriene møttes gjør x ting 
               //wlese fi hvis kriteriene ikke møttes gjør noe ennet 

        $query = "SELECT * FROM ticket;";
        $result = mysqli_query($con, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $Nr = $_POST["bord" . $row["id"]];
                $tid = $_POST["tid" . $row["id"]];
                $komentar = $row["komentar"];
        
                if ($row["Nr"] == $Nr && $row["tid"] == $tid) {
                    $iBruk = "ingen endringer gjort";
                    // echo $iBruk;
                } else {
                    $updateQuery = "UPDATE bord SET Nr='$Nr', komentar='$komentar', tid='$tid' WHERE id = '$id'";
                    //echo $updateQuery . "<br>";
                    $updateResult = mysqli_query($con, $updateQuery) or die('Error updating database.');
                }
                // echo $row["Nr"] ." = ". $tid;
                // echo $row["Nr"] ." = ". $Nr;
                // echo $query."<br>";
            }
        } else {
            die('Error querying database: ' . mysqli_error($con));
        }
        
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
    <title>andmeleser</title>
</head>

<body>
    <script src="../script/script.js"></script>

    <div class="meny">
        <a class="orange" href="../index.php">Hjem</a>
        <a class="orange" href="Meny.php">Meny</a>
        <a class="orange" href="Anmeldelse.php">Anmeldelse</a>
        <a class="darkorange" href="bord.php">Bord</a>
        <a class="orange" href="FAQ.php">FAQ</a>
        <a class="orange" href="tickting/ticket.php">ticket</a>
        <a class="orange" href="/php/BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') {?>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') {?>
                <a class="orange" href="tickting/brukerS.php">støtte</a>
        <?php } } ?>
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
    <h1 class="overskrift">
        Bord
    </h1>
    <div class="line"></div>
    <br>

    <?php //starter en php session//
    // skjeker om person er admin og vis de er det så skjører følgende kode  //
if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin'|| $_SESSION && $_SESSION['admin'] == 'Manager') {
    ?><div class="bordmanage center"><?php
    echo '<div class="Vad"><form method="post">';
    echo "<h1>Rediger reservasjoner</h1>";
    // DEN HENTER FRA DATABASEN MED EN SPØRING(SPØRING ER QUERY) //
    $query = "SELECT * FROM bord;";

// mysqli_query($con, $query). mysqli_query ER INSTRUKSER OM Å SENDE MELDING OG $CON ER HVOR DEN SKAL HEN//
//OG $QUERY ER HVA MELDINGEN ER   //
    $result = mysqli_query($con, $query);

    // WHILE= SÅ LENGE DETTE HER SKJER GJØR X. HER GÅR KODEN GJENNOM RESULTATET OG PUTTER DET INN I $ROW, SKIL AT DET KAN BRUKES I KODEN                                                                                 //
    while ($row = mysqli_fetch_assoc($result)) {
        $tid = ($row["tid"] + 12) . ":00";
        echo "Nr: <input type='number' class='bestilltid' value='" . $row["id"] .
            "' placeholder='" . $row["id"] . "'> - ";
            // DETTE ER SELECKT KNAPEN FOR Å GI VALGET OM KLOKESLETT FOR RESERVASJON OG LEDIGE BORD //
        echo "  navn: " . $row["navn"] .
            " - tid <select name='tid" . $row["id"] . "'>
                <option value='" . $row["tid"] . "'>" . $tid . "</option>
                <option value='1'>13:00</option>
                <option value='2'>14:00</option>
                <option value='3'>15:00</option>
                <option value='4'>16:00</option>
                <option value='5'>17:00</option>
                <option value='6'>18:00</option>
                <option value='7'>19:00</option>
                <option value='8'>20:00</option>
                <option value='9'>21:00</option>
                <option value='10'>22:00</option>
            </select>
            - Bord NR: <select name='bord" . $row["id"] . "'>
                <option value='" . $row["Nr"] . "'>" . $row["Nr"] . "</option>
                <option value='ett'>1</option>
                <option value='to'>2</option>
                <option value='tre'>3</option>
                <option value='fire'>4</option>
                <option value='fem'>5</option>
                <option value='seks'>6</option>
            </select>
            <br>";
    }
//     //
    echo "<input type='submit' value='Lagre endringer' name='submit' />
    </form></div></div>";
}
?>


    <div class="border absolute">
        <h2>bordoversikt</h2>
        <div class="flex">
            <div id="1" class="border bord"> 1</div>
            <div id="2" class="border bord">2 </div>
        </div>
        <div></div>
        <div class="flex">
            <div id="3" class="border bord">3</div>
            <div id="4" class="border bord">4</div>
        </div>
        <div></div>
        <div class="flex">
            <div id="5" class="border bord">5</div>
            <div id="6" class="border bord">6</div>
        </div>
    </div>
    <!-- Bordoversikt -->
<div class="bordreserver">
    <h1>Reserver bord</h1>
    <form method="POST">
        <label for="tid">velg klokkeslett for å reservasjon bord</label>
        <select name="tid" id="tid" onchange="visdiv(); optatt();">
            <option value="0">--velg--</option>
            <script>
                var selectElement = document.getElementById("tid");
                var currentHour = new Date().getHours();

                for (var i = 13; i <= 22; i++) {
                    var option = document.createElement("option");
                    option.value = i - 12;
                    option.text = i + ":00";

                    if (i > currentHour) {
                        selectElement.add(option);
                    }
                }
            </script>
        </select><br><br>
                <!-- Skjuler visse elementer basert på valgt tidspunkt -->

        <div id="gjemt" class="gjemt">
            <label for="Nr">bord nr</label>
            <select name="Nr" id="Nr" onchange="reservert()">
                <option value="0">--velg--</option>
                <option value="ett">1</option>
                <option value="to">2</option>
                <option value="tre">3</option>
                <option value="fire">4</option>
                <option value="fem">5</option>
                <option value="seks">6</option>
            </select>
            <div class="tatt" id="tatt"></div>
            <br>
            <label for="navn">reservasjon navn</label>
            <input type="text" name="navn" id="">
            <br><br>
            <label for="kommentar">kommentar (valgfritt)</label>
            <textarea name="kommentar" id="" cols="30" rows="2"></textarea>
            <br><br>
            <input type="submit" name="submit" id="submit" value="send inn reservasjon">
        </div>
        <div class="rød" id="rød"><?php echo $iBruk; ?></div>
    </form>

    <?php
    $query = "SELECT * FROM bord;";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $tid = $row["tid"];
        echo "<script> 
                bord" . $row["Nr"] . "[" . $tid . "]=0;
                console.log('bord" . $row["Nr"] . "." . $tid . "=0');
                console.log(bord" . $row["Nr"] . ");
            </script>";
    }
    ?>


 <?php     // Viser ekstra informasjon for admin( fordi admin er tech daddy)

  if ($_SESSION && $_SESSION['admin'] == 'Admin' || $_SESSION && $_SESSION['admin'] == 'Manager') 
  {echo "<br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>";

}            
    ?>
      </div>              <br>
    <div class="
    <?php 
    if(!$_SESSION)
    {echo "bunn";}
    else if($_SESSION['admin'] != 'Admin')
    {if($_SESSION['admin'] != 'Manager'){echo "bunn";} }
    ?> bunntext">

 <!--dette er buntekst og alle div er for å sørge før at bun tekst forblir på bunene --> 
    KONTAKT OSS OM SPØRSMÅL OG RESSERVASJONER
                <div class="kon">
                    <p>Tlf: XXXXXXXXX</p>
                    <p>Epost: NEI@GMAIL.COM</p>
                    <p>Adresse: xxxx gate xx</p>





                </div> <div class="classTest"></div>
</body>

</html>
<!-- avsluter kode --><!-- avsluter kode -->