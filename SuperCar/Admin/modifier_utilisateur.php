<?php
session_start();
include("bdco.php"); // connexion à la base Supercar

// Vérifier si un ID est passé
if (!isset($_GET['id'])) {
    header("Location: admin_utilisateur.php");
    exit();
}

$id = intval($_GET['id']);

// Si le formulaire est soumis → mise à jour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($bdd, $_POST['fullname']);
    $email = mysqli_real_escape_string($bdd, $_POST['email']);
    $mdp = mysqli_real_escape_string($bdd, $_POST['mdp']);
    $conf_mdp = mysqli_real_escape_string($bdd, $_POST['conf_mdp']);

    mysqli_query($bdd, "UPDATE utilisateur 
                        SET fullname='$fullname', email='$email', mdp='$mdp', conf_mdp='$conf_mdp' 
                        WHERE guestid=$id");

    $_SESSION['message'] = "✅ Utilisateur modifié avec succès.";
    header("Location: admin_utilisateur.php");
    exit();
}

// Récupérer les données existantes
$result = mysqli_query($bdd, "SELECT * FROM utilisateur WHERE guestid=$id");
if (!$result) {
    die("Erreur SQL: " . mysqli_error($bdd));
}
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body { font-family: Arial, sans-serif; background:#fafafa; }
        form {
            width: 400px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: green;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>

    <form method="POST">
        <h2 style="text-align:center;">✏️ Modifier un utilisateur</h2>

        <label>Nom complet :</label>
        <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required>

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label>Mot de passe :</label>
        <input type="text" name="mdp" value="<?= htmlspecialchars($user['mdp']) ?>" required>

        <label>Confirmation mot de passe :</label>
        <input type="text" name="conf_mdp" value="<?= htmlspecialchars($user['conf_mdp']) ?>" required>

        <button type="submit">💾 Enregistrer</button>
        <a href="admin_utilisateur.php">⬅ Retour</a>
    </form>

</body>
</html>
