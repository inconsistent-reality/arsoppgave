<?php
session_start();

$melding = "";
if (isset($_POST['submit'])) {
    //Gjøre om POST-data til variabler
    $brukernavn = $_POST['brukernavn'];
    $passord = md5($_POST['passord']);

    //Koble til databasen
    $dbc = mysqli_connect('localhost', 'root', '', 'terminoppgave')
        or die('Error connecting to MySQL server.');

    //Gjøre klar SQL-strengen
    $query = "SELECT * from users where username='$brukernavn' and password='$passord'";

    //Utføre spørringen
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    //Koble fra databasen
    mysqli_close($dbc);

    //Sjekke om spørringen gir resultater
    if ($result->num_rows > 0) {
        //Gyldig login
        $_SESSION = mysqli_fetch_assoc($result);

        header('location: ../index.php');
    } else {
        //Ugyldig login
        //header('location: failure.html');
        $melding = "Feil brukrnavn eller passord, prøv igjen";
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


    </div><div class="meny">
        <a class="orange" href="../index.php">Hjem</a>
        <a class="orange" href="../php/Meny.php">Meny</a>
        <a class="orange" href="../php/Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="../php/bord.php">Bord</a>
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
            echo ' <a class="darkorange" href="inLOG.php">login</a>';
        }
        
        ?>
    </div>
    <div class="login center">
        <p>Vennligst logg inn:</p>
        <?php echo $melding; ?>
        <form method="post" class="center">
            <label for="brukernavn">Brukernavn:</label>
            <input type="text" name="brukernavn" /><br />
            <label for="passord">Passord:</label>
            <input type="password" name="passord" /><br />

            <input type="submit" value="Logg inn" name="submit" />

        </form>
        <br><br>
        <div class="knapp">
        <a href="registration.php">Registrere deg her</a>
        </div>
        <br>
        <br>
        
        <div class="knapp">
        <a href="glemmt.php">Glemt passord</a>
        </div>
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