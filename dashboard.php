<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['utilisateur'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <div class="card">
        <h1>Bienvenue <?= htmlspecialchars($user['prenom']) ?> !</h1>
        <p>Vous êtes connecté avec l'adresse : <?= htmlspecialchars($user['email']) ?></p>
        <a href="logout.php">Se déconnecter</a>
    </div>
</body>
</html>
