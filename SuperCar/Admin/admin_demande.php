<?php
session_start();
include("bdco.php"); // Connexion à la base de données

// Si l'admin confirme une demande
if (isset($_GET['confirmer'])) {
    $id = intval($_GET['confirmer']);
    mysqli_query($bdd, "UPDATE demande_essaie SET etat='Validé' WHERE guestid=$id");
    header("Location: admin_demande.php");
    exit();
}

// Suppression d'une demande
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($bdd, "DELETE FROM demande_essaie WHERE guestid=$id");
    header("Location: admin_demande.php");
    exit();
}

// Récupération des demandes
$result = mysqli_query($bdd, "SELECT * FROM demande_essaie ORDER BY guestid ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Demandes d'essai</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
            margin-top: 30px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background: black;
        }
        a {
            text-decoration: none;
            padding: 8px 12px;
            margin-right: 5px;
            border-radius: 4px;
            color: white;
        }
        a:hover {
            text-decoration: underline;
        }
        .edit { background-color: green; }
        .delete { background-color: red; }
        .confirmer { background-color: dodgerblue; }
        .etat-valide {
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
    <h1 style="text-align:center;">📋 Gestion des demandes d'essai</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Voiture</th>
                <th>Modèle</th>
                <th>Utilisateur</th>
                <th>Date</th>
                <th>Heure</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['guestid'] ?></td>
                <td><?= htmlspecialchars($row['voiture']) ?></td>
                <td><?= htmlspecialchars($row['modele']) ?></td>
                <td><?= htmlspecialchars($row['utilisateur']) ?></td>
                <td><?= htmlspecialchars($row['date_demande']) ?></td>
                <td><?= htmlspecialchars($row['temps']) ?></td>
                <td>
                    <?php if (!empty($row['etat'])): ?>
                        <span class="etat-valide"><?= htmlspecialchars($row['etat']) ?></span>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (empty($row['etat'])): ?>
                        <a class="confirmer" href="admin_demande.php?confirmer=<?= $row['guestid'] ?>">Confirmer</a>
                    <?php endif; ?>
                    <a class="edit" href="modifier_demande.php?id=<?= $row['guestid'] ?>">Modifier</a> 
                    <a class="delete" href="admin_demande.php?delete=<?= $row['guestid'] ?>" 
                       onclick="return confirm('Supprimer cette demande ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
   <a href="admin.php" class="retour">⬅ Retour au tableau de bord</a>
</body>
</html>
