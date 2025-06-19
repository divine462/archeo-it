<?php
session_start();
require 'pdo.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];

    if ($email && $mot_de_passe) {
        $sql = "SELECT * FROM utilisateurs WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            // Connexion réussie
            $_SESSION['utilisateur'] = [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email']
            ];
            header("Location: dashboard.php"); // Redirection vers la zone connectée
            exit;
        } else {
            $error = "Identifiants incorrects.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Archéo-IT</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
  <div class="LOGO">
    <img src="assets/images/logo.png" alt="Logo">
  </div>
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="chantiers.php">Chantiers</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="register.php">Inscription</a></li>
      <?php if (isset($_SESSION['utilisateur'])): ?>
        <li><a href="logout.php">Déconnexion</a></li>
      <?php else: ?>
        <li><a href="login.php">Connexion</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

    <div class="card">
        <h1>Connexion</h1>

        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>

            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>
