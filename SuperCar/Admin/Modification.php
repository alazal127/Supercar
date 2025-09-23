<?php
// Connexion à la base
$host = 'localhost';
$dbname = 'supercar';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$success = false;

if (!isset($_GET['id'])) {
    die("ID de la voiture non fourni.");
}

$id = intval($_GET['id']);

// Si formulaire soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $prix = $_POST['prix'];
    $propriete = $_POST['propriete'];
    $image = $_POST['image'];

    $sql = "UPDATE voiture 
            SET marque = :marque, modele = :modele, prix = :prix, propriete = :propriete, image = :image 
            WHERE id_voiture = :id";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':marque' => $marque,
        ':modele' => $modele,
        ':prix' => $prix,
        ':propriete' => $propriete,
        ':image' => $image,
        ':id' => $id
    ]);

    if ($result) {
        $success = true;
    } else {
        $error = "Erreur de mise à jour.";
    }
}

// Charger les données
$stmt = $pdo->prepare("SELECT * FROM voiture WHERE id_voiture = :id");
$stmt->execute([':id' => $id]);
$voiture = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$voiture) {
    die("Voiture non trouvée.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }

        .card {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"], .btn-retour {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #2e8b57;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        input[type="submit"]:hover, .btn-retour:hover {
            background-color: #256c45;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="card">

<?php if ($success): ?>
    <div class="success-message">
        ✅ Modification effectuée avec succès !
    </div>
    <a href="admin voiture.php" class="btn-retour">⬅ Retour à la page admin</a>
<?php else: ?>
    <h2>Modifier la voiture</h2>

    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Marque :</label>
        <input type="text" name="marque" value="<?= htmlspecialchars($voiture['marque']) ?>">

        <label>Modèle :</label>
        <input type="text" name="modele" value="<?= htmlspecialchars($voiture['modele']) ?>">

        <label>Prix :</label>
        <input type="text" name="prix" value="<?= htmlspecialchars($voiture['prix']) ?>">

        <label>Propriété :</label>
        <input type="text" name="propriete" value="<?= htmlspecialchars($voiture['propriete']) ?>">

        <label>Image (URL) :</label>
        <input type="text" name="image" value="<?= htmlspecialchars($voiture['image']) ?>">

        <input type="submit" value="Enregistrer les modifications">
    </form>
<?php endif; ?>

</div>

</body>
</html>
