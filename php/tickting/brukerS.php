<?php

session_start(); 

include ("../koble.php");
if((isset($_SESSION) && $_SESSION['admin'] === 'Admin') ){
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
        <a class="orange" href="ticket.php">ticket</a>
        <a class="orange" href="../BB.php">Bygg</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'Admin') { ?>
        <a class="darkorange" href="brukerS.php">støtte</a>
        <?php } ?>
        
        <a class="orange" href="../showBB.PHP">se Bygg</a>


        <?php
        if ($_SESSION)
        // session er lik økt
        {
            echo '<a class="orange" href="../passord.php">passord</a>';

            echo '<a class="orange" href="/login/logout.php">logout</a>';
        } else {
            echo ' <a class="orange" href="/login/inLOG.php">login</a>';
        }
        ?>
    </div>
    <h1 class="overskrift">
        Tickets
    </h1><br>

<div class="center">
<table>
<form method="POST" >
<tr>
  <th>Navn</th>
  <th>Melding</th>
  <th>tid</th>
  <th>status</th>
  <th>Slett</th>
</tr>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowname=1;
    while(isset($_POST['newStatus_'.$rowname])){

        $newStatus = $_POST['newStatus_'.$rowname];
        $ticketid = $_POST['ticketid_'.$rowname];
        
        if(isset($_POST['slett_'.$rowname])){
            $slett = $_POST['slett_'.$rowname];
        } else{
            $slett="behold";
        }

        if($slett=="slett"){
            $slettquery="DELETE FROM ticket WHERE id='$ticketid'";
            mysqli_query($con, $slettquery);
        }
        // echo $ticketid."  ";
    
        // Oppdater statusen i databasen
        $updateQuery = "UPDATE ticket SET status='$newStatus' WHERE id='$ticketid'";
        
        // echo $updateQuery."<br>";
        mysqli_query($con, $updateQuery);
        $rowname=$rowname+1;
    }
    // Redirect tilbake til ticket-listen eller annen ønsket side
  

  }

//query som henter alle tickets
$query= "SELECT * from ticket";
//sende qery og få $result i en if som sjekker at det funket
if( $result = mysqli_query($con, $query)){
    //while løkke som kjører gjennom alle mresult med mysqli_fetch_assoc
    $rowname=1;
    while ($row=mysqli_fetch_assoc($result)){
        //defiener dataen i databasen som variabler
        $id = $row["id"];
        $brukernavn=$row["brukernavn"];
        $mld=$row["mld"];
        $tid=$row["tid"];
        $status=$row["status"];
                
       

        //skrive ut alt som ELEGANT html kode
        echo"<tr><td>   ".$brukernavn." </td><td> ".$mld."  </td><td> ". $tid."</td><td>
        <select name='newStatus_".$rowname."'><option value=".$status.">".$status."</option>
        <option value='jobbes på'>jobbes på</option><option value='ikke besvart'>ikke besvart</option><option value='løst'>løst</option></select>
        </td>
        <td>
        <input type='checkbox' id='slett' name='slett_".$rowname."' value='slett'>


        </td>
        </tr> 
        <input type='hidden' value=".$id." name='ticketid_".$rowname."'>";
        $rowname++;
    }
}


?>

</table>
</div>
<div class="centertxt">
    <br>
<input type="submit" value="lagre endringer">
</div>
</form>


    </div>
    <br><br><br><br>
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
<!-- avsluter kode -->
<?php
}else{
    header("location: ../../index.php");
}
?>