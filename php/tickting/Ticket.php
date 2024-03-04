<?php

session_start(); 

include ("../koble.php");
$melding="";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //hent hva personen skrev inn og lagre i variabel
    $mld = $_POST['mld'];

    //finn navn på personen ($_session())
    if($_SESSION){
    $persn = $_SESSION['username'];
    } else{
        $persn = "Anonym";
    }

    $tid = date("Y-m-d H:i:s");

    //send inn dataen til databasen
    //først, lag meldingen
    //Gjøre klar SQL-strengen
    $query = "INSERT INTO ticket(brukernavn, mld, tid, status) VALUES ('$persn','$mld','$tid', 'venter')";
    
    //Utføre spørringen
    $result = mysqli_query($con, $query)
      or die('Error querying database.');
    
    //så, send inn meldingen

if($result){
                //Gyldig login
                $melding= "Takk for at din beskjed!";
            }else{
                //Ugyldig login
                $melding= "Noe gikk galt, prøv igjen!";
            }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css" media="screen and (min-device-width: 800px)">
    <link rel="stylesheet" href="../../style/phonestyle.css" media="screen and (max-device-width: 800px)">

    <title>støtte</title>
</head>
<body>
    <div class="meny">
        <a class="orange" href="../../index.php">Hjem</a>
        <a class="orange" href="../Meny.php">Meny</a>
        <a class="orange" href="../Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="../bord.php">Bord</a>
        <a class="orange" href="../FAQ.php">FAQ</a>
        <a class="darkorange" href="ticket.php">ticket</a>
        <a class="orange" href="../BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') { ?>
        <a class="orange" href="brukerS.php">støtte</a>
        <?php } ?>
        <a class="orange" href="../showBB.PHP">se Bygg</a>

            

        <?php
        if ($_SESSION)
        // session er lik økt
        {
            echo '<a class="orange" href="../passord.php">passord</a>';

            echo '<a class="orange" href="../../login/logout.php">logout</a>';
        } else {
            echo ' <a class="orange" href="../../login/inLOG.php">login</a>';
        }
        ?>
    </div>
    <h1 class="overskrift">
        Send en ticket
    </h1>
    <div class="line"></div>
    <br>

<form method="POST" class = "Sin">
    send inn en melding om mulige feil eller problemer på siden
<br><br>
<textarea rows="10" cols="70" name="mld" maxlength="100">
</textarea>
<br>
<input type="submit"class = "tx" value="send inn">
<?php echo $melding ?>

<?php
include("../koble.php");

$query = "SELECT * FROM ticket;";
$result = mysqli_query($con, $query);

if ($result) 
   


?>

</form>

<!-- #region -->
    </div>
    <br><br><br><br>
    <br>
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