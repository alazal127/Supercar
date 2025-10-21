<?php
session_start();
include("bdco.php"); // connexion BDD

// Suppression d'un utilisateur
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($bdd, "DELETE FROM utilisateur WHERE guestid=$id");
    header("Location: admin_utilisateur.php");
    exit();
}

// Récupération des utilisateurs
$result = mysqli_query($bdd, "SELECT * FROM utilisateur ORDER BY guestid ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Utilisateurs</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 95%;
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
            color: white;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
            color: white;
        }
        a:hover { text-decoration: underline; }
        .edit { background-color: green; }
        .copy { background-color: orange; }
        .delete { background-color: red; }
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
    <script>
        function cocherTout(source) {
            checkboxes = document.getElementsByName('selection[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
</head>
<body>
<h1 style="text-align:center;">👤 Gestion des utilisateurs</h1>

<form method="post" action="">
    <table>
        <thead>
            <tr>
                <th><input type="checkbox" onclick="cocherTout(this)"></th>
                <th>ID</th>
                <th>Nom complet</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Confirmation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><input type="checkbox" name="selection[]" value="<?= $row['guestid'] ?>"></td>
                <td><?= $row['guestid'] ?></td>
                <td><?= htmlspecialchars($row['fullname']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['mdp']) ?></td>
                <td><?= htmlspecialchars($row['conf_mdp']) ?></td>
                <td>
                    <a class="edit" href="modifier_utilisateur.php?id=<?= $row['guestid'] ?>">Modifier</a>
                    <a class="delete" href="admin_utilisateur.php?delete=<?= $row['guestid'] ?>" 
                       onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</form>

<a href="admin.php" class="retour">⬅ Retour au tableau de bord</a>
</body>
</html>
