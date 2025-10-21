<?php
session_start();
include("bdco.php"); // connexion à la base supercar

// Vérifier si un ID est passé
if (!isset($_GET['id'])) {
    header("Location: admin_contact.php");
    exit();
}

$id = intval($_GET['id']);

// Si le formulaire est soumis → mise à jour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
    $email = mysqli_real_escape_string($bdd, $_POST['email']);
    $message = mysqli_real_escape_string($bdd, $_POST['message']);

    mysqli_query($bdd, "UPDATE contact SET nom='$nom', email='$email', message='$message' WHERE guestid=$id");

    $_SESSION['message'] = "✅ Message modifié avec succès.";
    header("Location: admin_contact.php");
    exit();
}

// Récupérer les données existantes
$result = mysqli_query($bdd, "SELECT * FROM contact WHERE guestid=$id");
$contact = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un contact</title>
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
        input, textarea {
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
        <h2 style="text-align:center;">✏️ Modifier un message</h2>
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($contact['nom']) ?>" required>

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" required>

        <label>Message :</label>
        <textarea name="message" rows="4" required><?= htmlspecialchars($contact['message']) ?></textarea>

        <button type="submit">💾 Enregistrer</button>
        <a href="admin_contact.php">⬅ Retour</a>
    </form>

</body>
</html>
