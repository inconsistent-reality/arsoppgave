<?php
session_start();

?>


<?php
include("koble.php");
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
    <div class="meny">
        <a class="orange" href="../index.php">Hjem</a>
        <a class="orange" href="Meny.php">Meny</a>
        <a class="darkorange" href="Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="bord.php">Bord</a>
        <a class="orange" href="FAQ.php">FAQ</a>
        <a class="orange" href="tickting/ticket.php">ticket</a>
        <a class="orange" href="/php/BB.php">Bygg</a>
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
    <h1 class="overskrift">
    Andmeleser
    </h1>
    <div class="line"></div>
    <br>
    <div class="skrivanmeld">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div>
                <h2>Skriv om din opplevelse</h2>
                <textarea name="TILBAKEMELDING" id="TILBAKEMELDING" cols="30" rows="5"></textarea>
            </div>

            <div>
                meg sjerner hva
                <br>
                <br>
                <select name="stjerner" id="stjerner">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <input type="submit" name="submit" id="submit" value="Submit">
        </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_SESSION) {
            $NAME = $_SESSION['username'];
        } else {
            $NAME = "Navnløss";
        }
        $TILBAKEMELDING = $_POST['TILBAKEMELDING'];
        $stjerner = $_POST['stjerner'];
        if (!empty($NAME) && !empty($TILBAKEMELDING) && !empty($stjerner)) {
            $sql = "INSERT INTO reviw (brukere, komentar, stjerner) VALUES ('$NAME', '$TILBAKEMELDING', '$stjerner')";

            // send query to the database to add values and confirm if successful
            $rs = mysqli_query($con, $sql);
        }
    }
    ?>


    <div>
        <h2>tidligere opplevelser</h2>
        <div></div>
    </div>
    <?php
    // SQL QUERY 
    $query = "SELECT * FROM reviw;";
    // FETCHING DATA FROM DATABASE 
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // OUTPUT DATA OF EACH ROW 
        $nrow = 0;
        $anmeld = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $anmeld = $anmeld + $row["stjerner"];
            $nrow++;

        }


        $avrage = $anmeld / $nrow;
        echo number_format((float) $avrage, 2, ".", "") . "/5 <br><br>";


        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            //print_r($row);         
            echo "<div class='reviews'>navn: " . $row["brukere"] . " <br> komentar: " .
                $row["komentar"] . " <br> vurdering:" . $row["stjerner"] . "/5 <br><br></div>";

        }
    } else {
        echo "0 results";
    }









    ?>
    
    </div>
    <!--dette er buntekst og alle div er for å sørge før at bun tekst forblir på bunene -->
    <br>
    <div class=" bunntext">
        KONTAKT OSS OM SPØRSMÅL OG RESSERVASJONER
        <div class="kon">
            <p>Tlf: XXXXXXXXX</p>
            <p>Epost: NEI@GMAIL.COM</p>
            <p>Adresse: xxxx gate xx</p>





        </div>
        <div class="classTest"></div>
</body>

</html>