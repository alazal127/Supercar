<?php
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

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $prix = $_POST['prix'];
    $propriete = $_POST['propriete'];

    // Gestion de l’upload de l’image
    $imagePath = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $imageName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $error = "Échec de l'envoi de l'image.";
        }
    }

    if (empty($error)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO voiture (marque, modele, prix, propriete, image)
                                   VALUES (:marque, :modele, :prix, :propriete, :image)");
            $stmt->execute([
                ':marque' => $marque,
                ':modele' => $modele,
                ':prix' => $prix,
                ':propriete' => $propriete,
                ':image' => $imagePath
            ]);

            // ✅ Message succès centré
            echo "<div style='
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background:#d4edda;
                    color:#155724;
                    border:1px solid #c3e6cb;
                    padding:25px 40px;
                    border-radius:8px;
                    text-align:center;
                    font-family:Arial, sans-serif;
                    z-index:1000;
                    box-shadow: 0 8px 20px rgba(0,0,0,0.2);'>
                    ✅ Votre voiture a bien été insérée !<br><br>
                    <a href='admin voiture.php' style='
                        display:inline-block;
                        padding:10px 20px;
                        background:#3498db;
                        color:white;
                        text-decoration:none;
                        border-radius:6px;
                        margin-top:10px;'>↩ Retour à la liste</a>
                  </div>";
            exit;
        } catch (PDOException $e) {
            $error = "Erreur lors de l'ajout : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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

        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Ajouter une voiture</h2>

    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label>Marque :</label>
        <input type="text" name="marque" required>

        <label>Modèle :</label>
        <input type="text" name="modele" required>

        <label>Prix :</label>
        <input type="text" name="prix" required>

        <label>Propriété :</label>
        <input type="text" name="propriete">

        <label>Image (fichier) :</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Ajouter la voiture">
    </form>
</div>

</body>
</html>
