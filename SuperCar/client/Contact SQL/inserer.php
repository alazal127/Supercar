<?php
include ("bdconnect.php");

$nom = $_POST["nom"];
$adresse = $_POST["adresse"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$message = $_POST["message"];

$ajouter = "insert into contact (nom,adresse,tel,email,message) values ('$nom','$adresse','$tel','$email','$message')";
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
<h2 align='center'><a href='visu-contact.php'> Veuillez consulter mon contact!!!</a></h2>
</p>
</body>
</html>