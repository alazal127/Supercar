<?php
session_start();

// Vérifier si connecté comme admin
if (!isset($_SESSION['admin'])) {
    header("Location: connexion_admin.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Tableau de bord - Supercar Admin</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f5f7fa, #e6ecf0);
    margin: 0;
    padding: 0;
    color: #333;
}

h2 {
    text-align: center;
    color: #222;
    margin-top: 40px;
    font-weight: 600;
}

p {
    text-align: center;
    color: #666;
    margin-bottom: 40px;
}

.dashboard {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    padding: 20px;
}

.card {
    width: 200px;
    height: 110px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: center;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.card h3 {
    margin: 0;
    font-size: 22px;
    color: #fff;
}

.card p {
    margin: 5px 0 0;
    color: #fff;
    font-size: 14px;
}

.card-blue { background: linear-gradient(135deg, #007bff, #0056b3); }
.card-green { background: linear-gradient(135deg, #28a745, #1e7e34); }
.card-yellow { background: linear-gradient(135deg, #ffc107, #e0a800); }
.card-dark { background: linear-gradient(135deg, #343a40, #23272b); }
.card-navy { background: linear-gradient(135deg, #004085, #002752); }

        /* Disposition sous-catégories marques */
        .marque-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        /* Mise en page globale */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #111;
            color: white;
            padding: 15px 30px;
        }
        .logout a {
            background: red;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
        .dashboard-container {
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: black;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }
        .sidebar ul li a:hover {
            background: grille;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <h1>Supercar - Admin</h1>
        </div>
        <div class="logout">
            <span>Bonjour, <?php echo $_SESSION['admin']; ?> 👋</span>
            <a href="logout.php">Se déconnecter</a>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Menu latéral -->
        <nav class="sidebar">
            <ul>
                <li><a href="admin voiture.php">🚗 Voitures</a></li>
                <li><a href="admin_demande.php">📝 Essai</a></li>
                <li><a href="service.php">🛠️ Services</a></li>
                <li><a href="admin_contact.php">📞 Contact</a></li>
                <li><a href="admin_utilisateur.php">👤 Utilisateur</a></li>

            </ul>
        </nav>

        <!-- Contenu principal -->
        <main class="content">
            <h2>Bienvenue dans le panneau d'administrations</h2>
            <p>Sélectionnez un élément à gauche ou consultez les statistiques ci-dessous.</p>

            <!-- Cartes principales -->
    <div class="dashboard">
    <div class="card card-blue">
        <h3>4</h3>
        <p>Services</p>
    </div>

    <div class="card card-green">
        <h3>3</h3>
        <p>Marques</p>
    </div>

    <div class="card card-navy">
        <h3>BMW</h3>
        <p>4 modèles</p>
    </div>

    <div class="card card-yellow">
        <h3>Lamborghini</h3>
        <p>4 modèles</p>
    </div>

    <div class="card card-dark">
        <h3>Peugeot</h3>
        <p>4 modèles</p>
    </div>
</div>
</body>
</html>
