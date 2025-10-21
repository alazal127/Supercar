<?php
include("bdco.php");
$sql = "SELECT id_service, titre, amorce, caracteristique, image FROM service";
$services = mysqli_query($bdd, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .service {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: calc(50% - 20px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px;
            box-sizing: border-box;
        }

        .service img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .service h2 {
            margin: 10px 0;
        }

        .buttons {
            margin-top: 10px;
        }

        .buttons a {
            text-decoration: none;
            padding: 8px 12px;
            margin-right: 10px;
            border-radius: 4px;
            color: white;
        }

        .edit {
            background-color: green;
        }

        .delete {
            background-color: red;
        }

        @media (max-width: 768px) {
            .service {
                width: 100%;
            }
        }
         .retour {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 15px;
            background: #555;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Liste des Services</h1>

<div class="grid">
<?php while ($s = mysqli_fetch_assoc($services)) : ?>
    <div class="service">
        <img src="<?= $s['image'] ?>" alt="Image de <?= htmlspecialchars($s['titre']) ?>">
        <h2><?= htmlspecialchars($s['titre']) ?></h2>
        <p><strong>Amorce :</strong> <?= htmlspecialchars($s['amorce']) ?></p>
        <p><strong>Caractéristiques :</strong> <?= htmlspecialchars($s['caracteristique']) ?></p>
        <div class="buttons">
            <a class="edit" href="modifier_service.php?id=<?= $s['id_service'] ?>">Modifier</a>
            <a class="delete" href="supprimer_service.php?id=<?= $s['id_service'] ?>" onclick="return confirm('Supprimer ce service ?');">Supprimer</a>
        </div>
    </div>
<?php endwhile; ?>
</div>

<?php
mysqli_free_result($services);
mysqli_close($bdd);
?>
<a href="admin.php" class="retour">⬅ Retour au tableau de bord</a>
</body>
</html>
