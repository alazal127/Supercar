<?php
session_start();
include("bdco.php"); // Connexion à la base de données supercar

// Suppression d'un message si demandé
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($bdd, "DELETE FROM contact WHERE guestid=$id");
    $_SESSION['message'] = "✅ Message supprimé avec succès.";
    header("Location: admin_contact.php");
    exit();
}

// Récupération de tous les messages
$result = mysqli_query($bdd, "SELECT * FROM contact ORDER BY guestid ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Messages de contact</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fdfdfd;
            color: #000; /* Texte en noir */
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        a {
            text-decoration: none;
            padding: 8px 12px;
            margin-right: 10px;
            border-radius: 4px;
            color: white;
        }
        a:hover {
            opacity: 0.8;
        }
        .edit {
            background-color: green;
        }
        .delete {
            background-color: red;
        }
        .msg {
            text-align: center;
            color: green;
            font-weight: bold;
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
    <h1>📨 Gestion des messages de contact</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['guestid'] ?></td>
                <td><?= htmlspecialchars($row['nom']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                <td>
                    <a class="edit" href="modifier_contact.php?id=<?= $row['guestid'] ?>">Modifier</a>
                    <a class="delete" href="admin_contact.php?delete=<?= $row['guestid'] ?>" 
                       onclick="return confirm('Supprimer ce message ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <a href="admin.php" class="retour">⬅ Retour au tableau de bord</a>
</body>
</html>
