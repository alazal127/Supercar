<?php
// Connexion à la base de données
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

// Récupération des données
$sql = "SELECT * FROM voiture";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Voitures</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f0f0f0; }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            border-radius: 4px;
            margin-right: 5px;
        }
        .btn:hover { background-color: #2980b9; }
        .btn-danger { background-color: #e74c3c; }
        .btn-danger:hover { background-color: #c0392b; }
        .btn-add { margin-top: 10px; display: inline-block; }
        img { width: 100px; height: auto; }
    </style>
</head>
<body>

    <h1>Gestion des voitures</h1>

  <a href="ajouter.php" class="btn btn-add">➕ Ajouter une voiture</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Prix (€)</th>
            <th>Propriété</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        <?php while ($voiture = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= htmlspecialchars($voiture['id_voiture']) ?></td>
            <td><?= htmlspecialchars($voiture['marque']) ?></td>
            <td><?= htmlspecialchars($voiture['modele']) ?></td>
            <td><?= htmlspecialchars($voiture['prix']) ?></td>
            <td><?= htmlspecialchars($voiture['propriete']) ?></td>
            <td>
                <?php if (!empty($voiture['image'])): ?>
                    <img src="<?= htmlspecialchars($voiture['image']) ?>" alt="Voiture">
                <?php else: ?>
                    Aucune image
                <?php endif; ?>
            </td>
            <td>
                <a href="Modification.php?id=<?= $voiture['id_voiture'] ?>" class="btn">Modifier</a>
                <a href="supprimer.php?id=<?= $voiture['id_voiture'] ?>" class="btn btn-danger" onclick="return confirm('Supprimer cette voiture ?');">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
