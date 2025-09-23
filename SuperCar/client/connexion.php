<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <meta charset = "UTF-8" />
        <link rel="stylesheet" href="connexion.css">
    </head>

<body>
<header class="header">
        <div class="logo">
            <img src="images/logo.png" alt="logo" class="logo" align="center">
        </div>
    <nav class="menu">
            <a href="accueil.html">Accueil</a>
            <a href="voitures.html">Voitures</a>
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
</body>
</html>
<?php
session_start();
include("bdco.php");

// Récupérer les données
$email = $_POST["email"] ?? '';
$mdp = $_POST["mot_de_passe"] ?? '';

// Vérif champs vides
if (empty($email) || empty($mdp)) {
    echo "❌ Veuillez remplir tous les champs.";
    exit();
}

// Vérifier l'email dans la base
$query = "SELECT mdp FROM utilisateur WHERE email = ?";
$stmt = mysqli_prepare($bdd, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "❌ Adresse email inconnue.";
    exit();
}

$row = mysqli_fetch_assoc($result);

// Vérifier le mot de passe
if ($mdp === $row['mdp']) {
    $_SESSION['user'] = $email;
    setcookie('user', $email, time() + 3600, "/");

    // Redirection personnalisée
    $redirect = $_GET['redirect'] ?? 'accueil.html';
    header("Location: $redirect");
    exit();
} else {
    echo "❌ Mot de passe incorrect.";
}
?>
