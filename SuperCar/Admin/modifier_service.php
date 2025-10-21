<?php
include("bdco.php");

if (!isset($_GET['id'])) {
    die("ID du service manquant.");
}

$id = intval($_GET['id']);

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = mysqli_real_escape_string($bdd, $_POST['titre']);
    $amorce = mysqli_real_escape_string($bdd, $_POST['amorce']);
    $caracteristique = mysqli_real_escape_string($bdd, $_POST['caracteristique']);
    $image = mysqli_real_escape_string($bdd, $_POST['image']);

    $sql_update = "UPDATE service SET titre='$titre', amorce='$amorce', caracteristique='$caracteristique', image='$image' WHERE id_service=$id";

    if (mysqli_query($bdd, $sql_update)) {
        header("Location: service.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($bdd);
    }
}

// Récupération des données existantes
$sql = "SELECT * FROM service WHERE id_service=$id";
$result = mysqli_query($bdd, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Service introuvable.");
}

$service = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Service</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }

        .form-container {
            background: white;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            width: 100%;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Modifier le Service</h2>
    <form method="post">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($service['titre']) ?>" required>

        <label for="amorce">Amorce :</label>
        <textarea name="amorce" id="amorce" rows="3" required><?= htmlspecialchars($service['amorce']) ?></textarea>

        <label for="caracteristique">Caractéristiques :</label>
        <textarea name="caracteristique" id="caracteristique" rows="5" required><?= htmlspecialchars($service['caracteristique']) ?></textarea>

        <label for="image">URL de l'image :</label>
        <input type="text" name="image" id="image" value="<?= htmlspecialchars($service['image']) ?>" required>

        <button type="submit">Enregistrer les modifications</button>
    </form>
    <a href="service.php">← Retour à la liste des services</a>
</div>

</body>
</html>
