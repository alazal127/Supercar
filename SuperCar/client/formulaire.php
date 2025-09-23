<?php
session_start();
if (!isset($_SESSION["user"])) {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
    header("Location: connexion.php?redirect=formulaire.php");
    exit();
}

include("bdco.php"); // Inclusion de la connexion à la base de données

// Vérifier si les données du formulaire ont été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $voiture = $_POST["voiture"];
    $utilisateur = $_POST["utilisateur"];
    $date_demande = $_POST["date_demande"];
    $temps = $_POST["temps"];
    $modele = $_POST["modele"];
    
    // Sécuriser les données avant de les insérer dans la base
    $voiture = mysqli_real_escape_string($bdd, $voiture);
    $utilisateur = mysqli_real_escape_string($bdd, $utilisateur);
    $date_demande = mysqli_real_escape_string($bdd, $date_demande);
    $temps = mysqli_real_escape_string($bdd, $temps);
    $modele = mysqli_real_escape_string($bdd, $modele);

    // Préparer la requête d'insertion
    $query = "INSERT INTO demande_essaie (voiture, utilisateur, date_demande, temps, modele) 
              VALUES ('$voiture', '$utilisateur', '$date_demande', '$temps', '$modele')";
    
    // Exécuter la requête
    if (mysqli_query($bdd, $query)) {
        // Si l'insertion est réussie, rediriger l'utilisateur
        header("Location: formulaire.php?success=1");
        exit();
    } else {
        // Si l'insertion échoue, afficher une erreur
        echo "Erreur lors de l'enregistrement de la demande : " . mysqli_error($bdd);
    }

    // Fermer la connexion à la base de données
    mysqli_close($bdd);
}
?>

<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <meta charset = "UTF-8" />
        <link rel="stylesheet" href="formulaire.css">
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
    
    </header>
    <h1 align="center" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
        Votre demande a bien été envoyer
    </h1>
</body>
</html>