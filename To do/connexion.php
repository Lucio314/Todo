<?php
$servername = "localhost"; //nom du server
$username = "root"; //nom de l'utilisateur(par défaut c'est "root")
$password = "";
$dbname = "todo"; //nom de la base de donnée créée

try {
   // Création de la connexion
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (\Throwable $th) {
    die("La connexion a échoué");
    exit;
 }