<?php
    include ("bdconnect.php");

    $name = $_POST["name"];
    $adresse = $_POST["adresse"];

    $ajouter = "insert into registre (name,adresse) values('$name','$adresse')";
    mysqli_query($bdd, $ajouter);
    mysqli_close($bdd);
?>

<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <meta charset = "UTF-8" />
    </head>
<body>
<p>
    <h2 align='center'> Merci. Vos données sont bien insérées !!! </h2>
    <h2 align='center'><a href='visualiser.php'> Veuillez consulter mon Guestbook !!!
    </a></h2>
</p>
</body>
</html>