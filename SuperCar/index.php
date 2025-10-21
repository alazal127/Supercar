<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Accueil</title>
<style>
    /* Fond de la page */
    body {
        background: linear-gradient(to bottom right, #e0f7fa, #b2ebf2);
        font-family: Arial, sans-serif;
        height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Conteneur des boutons */
    .button-container {
        display: flex;
        gap: 50px; /* espace entre les boutons */
        margin-bottom: 50px;
    }

    /* Style des boutons */
    .btn {
        display: inline-block;
        padding: 20px 40px;
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        background-color: #00796b;
        border: 3px solid #004d40;
        border-radius: 15px;
        box-shadow: 3px 3px 8px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn:hover {
        background-color: #004d40;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.4);
    }

    /* Cadres autour des boutons */
    .btn-frame {
        padding: 15px;
        border: 2px solid #004d40;
        border-radius: 20px;
        background-color: rgba(255,255,255,0.2);
    }

    /* Bouton Admin en bas */
    .admin-button {
        display: block;
        padding: 20px 50px;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        background-color: #d32f2f;
        border: 3px solid #b71c1c;
        border-radius: 15px;
        box-shadow: 3px 3px 8px rgba(0,0,0,0.3);
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .admin-button:hover {
        background-color: #b71c1c;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.4);
    }
</style>
</head>
<body>

<div class="button-container">
    <div class="btn-frame">
        <a href="client/accueil.html" class="btn">Client</a>
    </div>
    <div class="btn-frame">
        <a href="Admin/connexion_admin.html" class="btn">Admin</a>
    </div>
</div>

</body>
</html>
