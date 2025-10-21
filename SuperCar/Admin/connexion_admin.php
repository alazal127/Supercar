<?php
session_start();
include("bdco.php"); // connexion MySQL

// Récupérer les données
$nom = $_POST["nom"] ?? '';
$mdp = $_POST["mot_de_passe"] ?? '';

// Vérif champs vides
if (empty($nom) || empty($mdp)) {
    echo "<div class='message-erreur'>❌ Veuillez remplir tous les champs.</div>";
    exit();
}

// Vérifier dans la table admin
$query = "SELECT mdp FROM admin WHERE nom = ?";
$stmt = mysqli_prepare($bdd, $query);
mysqli_stmt_bind_param($stmt, "s", $nom);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "<div class='message-erreur'>❌ Compte admin introuvable.</div>";
    exit();
}

$row = mysqli_fetch_assoc($result);

// Vérification du mot de passe
if ($mdp === $row['mdp']) {
    $_SESSION['admin'] = $nom; // on stocke le nom d'admin
    header("Location: admin.php");
    exit();
} else {
    echo "<div class='message-erreur'>❌ Mot de passe incorrect.</div>";
}
?>
