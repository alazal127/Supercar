<?php
session_start();
session_destroy();
header("Location: connexion.html"); // tu peux aussi renvoyer vers connexion_admin.html si c'est un admin
exit();
?>
