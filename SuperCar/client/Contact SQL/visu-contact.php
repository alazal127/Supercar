<!DOCTYPE HTML>
<html lang=fr>
<head>
<meta charset="utf-8" />
</head>
<body>

<?php
include ("bdconnect.php");
$sql= "select * from contact";
$curseur = mysqli_query($bdd,$sql);

echo ("<H2>Visualiser mon contact!</H2>");
while ($row = mysqli_fetch_assoc($curseur)){
$guestid = $row["guestid"]; echo "<b>ID :</b> $guestid<br />";
$nom = $row["nom"]; echo "<b>Nom :</b> $nom<br />";
$adresse = $row["adresse"]; echo "<b>Adresse :</b> $adresse<br />";
$tel = $row["tel"]; echo "<b>Tel :</b> $tel<br />";
$email = $row["email"]; echo "<b>Email :</b> $email<br />";
$message = $row["message"]; echo "<b>Message :</b> $message<br /><br />";
}
mysqli_free_result($curseur);
mysqli_close($bdd);
?>

<p>
<h1 align='center'><a href='contact.html'> Retour au formulaire de contact </a></h1>
</p>
</body>
</html>