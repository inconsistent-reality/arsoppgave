<?php
session_start();

?>
<html>
    <head>
<link rel="stylesheet" href="../style/style.css" media="screen and (min-device-width: 800px)">
<link rel="stylesheet" href="../style/phonestyle.css" media="screen and (max-device-width: 800px)">
        <meta charset="utf-8">
        <title>PHP registrering</title>
    </head>
    <body>
    <div class="meny">
        <div class="linker">
        <a class="orange" href="/index.php">Hjem</a>
        <a class="orange" href="/php/Meny.php">Meny</a>
        <a class="orange" href="/php/Anmeldelse.php">Anmeldelse</a>
        <a class="orange" href="/php/bord.php">Bord</a>
        <?php
        if($_SESSION){
            echo '<a class="orange" href="/php/passord.php">passord</a>';

            echo '<a class="orange" href="/login/logout.php">logout</a>'; 
        }
        else{
            echo ' <a class="darkorange" href="/login/inLOG.php">login</a>'; 
        }
         ?>
    </div>
    </div>
    <div class="center login">
        <p>Opprett ny bruker:</p>
        <form method="post" class="center">
            <label for="brukernavn">Brukernavn:</label>
            <input type="text" name="brukernavn" /><br />
            <label for="passord">Passord:</label>
            <input type="password" name="passord" /><br />
            <label for="email">email:</label>
            <input type="email" name="email" /><br />


            
            <input type="submit" value="Logg inn" name="submit" />
        </form>  
        </div>  
    </body>
    <?php
        if(isset($_POST['submit'])){
            //Gjøre om POST-data til variabler
            $brukernavn = $_POST['brukernavn'];
            $passord = md5($_POST['passord']);
            $email = $_POST['email'];
            
            //Koble til databasen
            $dbc = mysqli_connect('localhost', 'root', '', 'terminoppgave')
              or die('Error connecting to MySQL server.');
            
            //Gjøre klar SQL-strengen
            $query = "INSERT INTO users(username, password, email) VALUES ('$brukernavn','$passord','$email')";
            
            //Utføre spørringen
            $result = mysqli_query($dbc, $query)
              or die('Error querying database.');
            
            //Koble fra databasen
            mysqli_close($dbc);

            //Sjekke om spørringen gir resultater
            if($result){
                //Gyldig login
                echo "Takk for at du lagde bruker! Trykk <a href='inLOG.php'>her</a> for å logge inn";
            }else{
                //Ugyldig login
                echo "Noe gikk galt, prøv igjen!";
            }
        }
    ?>
</html> 