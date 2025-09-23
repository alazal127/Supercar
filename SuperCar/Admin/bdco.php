<?php

//définir vos paramètres de connexion

// nom du serveur
$host="localhost";
// nom utilisateur
$login="root";
// mot de passe
$pass="";
// nom de la base de données
$dbname="supercar";


// créer la connexion avec la base de données
$bdd = mysqli_connect($host, $login, $pass, $dbname);


// changer le jeu de caractères à utf8
mysqli_set_charset($bdd,"utf8");

 ?>