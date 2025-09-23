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
<?php
    include ("bdco.php");
    $nom = $_POST["nom"];

    $email = $_POST["email"];
    
    $message = $_POST["message"];

    $ajouter = "insert into contact (nom,email,message) values('$nom','$email','$message')";
    mysqli_query($bdd, $ajouter);
    mysqli_close($bdd);
?>

<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <meta charset = "UTF-8" />
        <link rel="stylesheet" href="contact.css">
    </head>
<body>
    <h1 align="center" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
        Vous avez bien été enregistrer
    </h1>
</body>
</html>