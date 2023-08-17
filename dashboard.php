<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $user['username']; ?> !</h1>
    <p>Votre rôle : <?php echo $user['role']; ?></p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
