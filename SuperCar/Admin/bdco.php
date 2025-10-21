<?php

//définir vos paramètres de connexion

// nom du serveur
$host="mysql-attoumani.alwaysdata.net";
// nom utilisateur
$login="attoumani";
// mot de passe
$pass="128@azali";
// nom de la base de données
$dbname="attoumani_supercar";


// créer la connexion avec la base de données
$bdd = mysqli_connect($host, $login, $pass, $dbname);


// changer le jeu de caractères à utf8
mysqli_set_charset($bdd,"utf8");

 ?>