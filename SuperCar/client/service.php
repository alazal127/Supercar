<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="services.css"> </head>
<body>
    <header class="header">
        <div class="logo">
            <img src="images/logo.png" alt="logo" class="logo" align="center">
        </div>
        <nav class="menu">
            <a href="accueil.html">Accueil</a>
            <a href="voiture.html">Voitures</a>
            <a href="service.php">Services</a>
            <a href="connexion.html?redirect=formulaire.html">Demande d'essai</a>
            <a href="contact.html">Contactez-nous</a>
        </nav>

        <div class="auth-dropdown">
            <button class="auth-btn" id="compte"><img src="images/utilisateur.png" alt="Compte" class="icon"></button>
            <div class="auth-menu">
                <a href="s'inscrire.html">S'inscrire</a>
                <a href="connexion.html">Se connecter</a>
            </div>
        </div>
    </header>
    <div class="services-container">
<?php
include("bdco.php"); 

$sql = "SELECT titre, amorce, caracteristique, image FROM service";
$curseur = mysqli_query($bdd, $sql);

while ($row = mysqli_fetch_assoc($curseur)) {
    $titre = $row["titre"];
    $amorce = $row["amorce"];
    $caracteristique = $row["caracteristique"];
    $image = $row["image"];

    echo "<div class='service-card'>";
    echo "<img src='$image' alt='$titre'>";
    echo "<div class='card-content'>";
    echo "<h1>$titre</h1>";
    echo "<p>$amorce</p>";
    echo "<h2>Caractéristiques :</h2>";
    echo "<p>$caracteristique</p>";
    echo "</div>";
    echo "</div>";
}

mysqli_free_result($curseur);
mysqli_close($bdd);
?>
</div>


<footer>
<p>&copy;2025 SuperCar World. Tous droits réservés. </p>
</footer>
</body>
</html>