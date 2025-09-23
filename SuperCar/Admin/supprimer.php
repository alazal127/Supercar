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

// Vérifie que l'ID est fourni
if (!isset($_GET['id'])) {
    die("ID de la voiture non fourni.");
}

$id = intval($_GET['id']);

// Supprimer la voiture
$stmt = $pdo->prepare("DELETE FROM voiture WHERE id_voiture = :id");
$success = $stmt->execute([':id' => $id]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression de voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .btn-retour {
            display: inline-block;
            padding: 10px;
            background-color: #2e8b57;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
        }

        .btn-retour:hover {
            background-color: #256c45;
        }
    </style>
</head>
<body>

<div class="card">
    <?php if ($success): ?>
        <div class="success-message">
            ✅ La voiture a été supprimée avec succès !
        </div>
    <?php else: ?>
        <div class="error-message">
            ❌ Échec de la suppression de la voiture.
        </div>
    <?php endif; ?>

    <a href="admin voiture.php" class="btn-retour">⬅ Retour à la page admin</a>
</div>

</body>
</html>
