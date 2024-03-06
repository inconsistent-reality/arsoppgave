<?php
session_start();
$message = "";

if(!isset($_SESSION['id'])){
    //skriv hei
    header('location: ../login/inLOG.php');

}
include("koble.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npass = md5($_POST['npass']);
    $rpass = md5($_POST['rpass']);
    $opass = md5($_POST['opass']);
    $spass = $_SESSION["password"];
    $userid = $_SESSION["id"];

    if ($npass === $rpass && $opass === $spass) {
        // "?" betyr at vi bruker "bind_param" som er ment til å bekytte mot "sql-indjections"
        $updateQuery = "UPDATE users SET password = ? WHERE id = ?";

        // forbereder pakken med queryen for å sende inn til databasen
        $stmt = $con->prepare($updateQuery);

        // her difinere vi hva som skal inn i spørsmålstegnene i queryan på line 21
        $stmt->bind_param("si", $npass, $userid);


        if ($stmt->execute()/*sender til database og sjekker om sending funket*/) {
           $message = "<div class='green'>PASSWORD CHANGED SUCCESSFULLY</div>";
        } else {
            $message = "<div class=' red'>FAILED TO UPDATE PASSWORD: " . $stmt->error."</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class=' red'>Invalid input or old password does not match.</div>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>        Endre passord
</title>
    <link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
    <link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
</head>

<body>

    <div class="meny">
        <div class="linker">
        <a class="orange" href="/index.php">Hjem</a>
        <a class="orange" href="Meny.php">Meny</a>
        <a class="orange" href="Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="bord.php">Bord</a>
        <a class="orange" href="FAQ.php">FAQ</a>
        <a class="orange" href="tickting/ticket.php">ticket</a>
        <a class="orange" href="BB.php">bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') { ?>
                <a class="orange" href="tickting/brukerS.php">bruker støtte</a>
        <?php } ?>
        <a class="orange" href="showBB.PHP">se bygg</a>


        <?php
        if ($_SESSION)
        // session er lik økt
        {
            echo '<a class="orange" href="passord.php">passord</a>';

            echo '<a class="orange" href="/login/logout.php">logout</a>';
        } else {
            echo ' <a class="orange" href="/login/inLOG.php">login</a>';
        }
        ?>
        
        </div>
    </div>
    <h1 class="overskrift">
        Endre passord
    </h1><br>

    <form method="post" class="center">
        gammelt passord
        <input type="password" name="opass">

        <br><br>nytt passord
        <input type="password" name="npass">

        <br><br>gjenta passord
        <input type="password" name="rpass">
        <br><br>

        <input type="submit">
    <?php echo $message ?>


    </form>
<div></div>
    <div class="bunn bunntext">
        KONTAKT OSS OM SPØRSMÅL OG RESERVASJONER
        <div class="kon">
            <p>Tlf: XXXXXXXXX</p>
            <p>Epost: NEI@GMAIL.COM</p>
            <p>Adresse: xxxx gate xx</p>





        </div>
</body>
</html>