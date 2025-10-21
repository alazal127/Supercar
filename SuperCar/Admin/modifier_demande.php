<?php
include("bdco.php");

if (!isset($_GET['id'])) {
    die("ID de la demande manquant.");
}

$id = intval($_GET['id']);

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voiture = mysqli_real_escape_string($bdd, $_POST['voiture']);
    $modele = mysqli_real_escape_string($bdd, $_POST['modele']);
    $utilisateur = mysqli_real_escape_string($bdd, $_POST['utilisateur']);
    $date_demande = mysqli_real_escape_string($bdd, $_POST['date_demande']);
    $temps = mysqli_real_escape_string($bdd, $_POST['temps']);

    $sql_update = "UPDATE demande_essaie 
                   SET voiture='$voiture', modele='$modele', utilisateur='$utilisateur', date_demande='$date_demande', temps='$temps' 
                   WHERE guestid=$id";

    if (mysqli_query($bdd, $sql_update)) {
        header("Location: admin_demande.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($bdd);
    }
}

// Récupération des données existantes
$sql = "SELECT * FROM demande_essaie WHERE guestid=$id";
$result = mysqli_query($bdd, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Demande introuvable.");
}

$demande = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Demande</title>
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
        h2 { text-align: center; }
        label { display: block; margin-top: 15px; }
        input[type="text"], input[type="date"], input[type="time"] {
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
        button:hover { background-color: #0056b3; }
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
    <h2>Modifier la Demande</h2>
    <form method="post">
        <label for="voiture">Voiture :</label>
        <input type="text" name="voiture" id="voiture" value="<?= htmlspecialchars($demande['voiture']) ?>" required>

        <label for="modele">Modèle :</label>
        <input type="text" name="modele" id="modele" value="<?= htmlspecialchars($demande['modele']) ?>" required>

        <label for="utilisateur">Utilisateur :</label>
        <input type="text" name="utilisateur" id="utilisateur" value="<?= htmlspecialchars($demande['utilisateur']) ?>" required>

        <label for="date_demande">Date :</label>
        <input type="date" name="date_demande" id="date_demande" value="<?= htmlspecialchars($demande['date_demande']) ?>" required>

        <label for="temps">Heure :</label>
        <input type="time" name="temps" id="temps" value="<?= htmlspecialchars($demande['temps']) ?>" required>

        <button type="submit">Enregistrer les modifications</button>
    </form>
    <a href="admin_demande.php">← Retour à la liste</a>
</div>

</body>
</html>
