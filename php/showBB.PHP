<?php
// Starter PHP-sesjonen for å kunne bruke $_SESSION-variabler

session_start();


// Inkluderer filen som inneholder databasekoblingen


include("koble.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
    <link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
    <title>se Bygg</title>
</head>

<body>
    <div class="meny">
        <a class="orange" href="../index.php">Hjem</a>
        <a class="orange" href="Meny.php">Meny</a>
        <a class="orange" href="Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="bord.php">Bord</a>
        <a class="orange" href="FAQ.php">FAQ</a>
        <a class="orange" href="tickting/ticket.php">ticket</a>
        <a class="orange" href="/php/BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') {?>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') {?>
                <a class="orange" href="tickting/brukerS.php">støtte</a>
        <?php } } ?>

        
         
        <a class="darkorange" href="showBB.PHP">se Bygg</a>
        

              

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
        se bygg
    </h1>
    <div class="line"></div>
    <br>


    <?php //starter en php session//
    // skjeker om person er admin og vis de er det så skjører følgende kode  //
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin' || isset($_SESSION['admin']) && $_SESSION['admin'] === 'kokk') {
    
    // DEN HENTER FRA DATABASEN MED EN SPØRING(SPØRING ER QUERY) //
    $query = "SELECT * FROM borgar;";

// mysqli_query($con, $query). mysqli_query ER INSTRUKSER OM Å SENDE MELDING OG $CON ER HVOR DEN SKAL HEN//
//OG $QUERY ER HVA MELDINGEN ER   //
    $result = mysqli_query($con, $query);

    
    echo '<div class="allborgershow">';
    // WHILE= SÅ LENGE DETTE HER SKJER GJØR X. HER GÅR KODEN GJENNOM RESULTATET OG PUTTER DET INN I $ROW, SKIL AT DET KAN BRUKES I KODEN                                                                                 //
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="borgershow">';
    echo "<h1>". $row["brukernavn"] ." sin burger  </h1>";
    echo "<select name='status-".$row["id"]."' id='status-".$row["id"]."' >
    <option value='". $row["status"] ."'>". $row["status"] ."</option>
    <option value='Bestillt'>Bestillt</option>
    <option value='Jobbes på'>Jobbes på</option>
    <option value='Ferdig'>Ferdig</option>
    </select><br>";

    for ($i=0; isset($row["drop".strval($i)]); $i++){
        if($row["drop".strval($i)] != "none"){
            echo '<img src="../bilder/'.$row["drop".strval($i)].'" class="ingimg" >';
        }
        else{
            echo '<img src="../bilder/none.png" class="ingimg" >';            
        }
    }
    echo '</div>';    
    }
    
    echo '</div>';
}

else{
    echo '<div class="cewnterimg"><img class="cewnterimgimg" src="../bilder/emp.webp" alt=""></div>';
}
//     //

?>
<!-- 
  <img class="showb" src="../bilder/metalb.png" alt="">


        <img class="burger-img" src="../bilder/cow.gif" alt=""> -->






</body>
 
</html>