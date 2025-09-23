<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voitures en Vente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="peugeot.css" rel="stylesheet">
</head>
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
    
</div>

</header>
    </div>
<img src="images/Essai.jpeg" alt="une image " class="image-pleine-largeur">
<div class="container">

<div id="details-box" class="details-box" style="display: none;">
<span class="close-btn" onclick="closeDetails()">×</span>
<img id="details-image" src="" alt="Image voiture">
<h2 id="details-title"></h2>
<p id="details-description"></p>
</div>

<?php
include ("bdco.php");
$sql = "SELECT * FROM voiture WHERE marque='PEUGEOT'";
$curseur = mysqli_query($bdd, $sql);

while ($row = mysqli_fetch_assoc($curseur)) {
    $marque = $row["marque"];
    $modele = $row["modele"];
    $prix = number_format($row["prix"], 0, ',', ' ') . " MUR";
    $propriete = $row["propriete"];
    $image = $row["image"]; 

    echo "
    <div class='car-card'>
        <img src='$image' alt='$modele'>
        <h3>$marque $modele</h3>
        <p><b>Prix:</b> $prix</p>
        <div class='buttons'>
            <button class='button' onclick=\"showDetails('$modele', '$propriete')\">Caractéristiques</button>
            <button class='button' onclick=\"window.location.href='connexion.html?redirect=formulaire.html'\">Demande d'essai</button>
        </div>
    </div>";
}

mysqli_free_result($curseur);
mysqli_close($bdd);
?>
</div>

<!-- Script pour la modale -->
<script>
function showDetails(modele, propriete) {
    // Trouver l'image associée au modèle
    const carCard = Array.from(document.querySelectorAll(".car-card"))
        .find(card => card.querySelector("h3").textContent.includes(modele));
 
    const imageSrc = carCard.querySelector("img").src;
 
    document.getElementById("details-image").src = imageSrc;
    document.getElementById("details-title").textContent = "Caractéristiques de " + modele;
    document.getElementById("details-description").textContent = propriete;
    document.getElementById("details-box").style.display = "block";
}
 
function closeDetails() {
    document.getElementById("details-box").style.display = "none";
}
</script>

</body>
</html>
