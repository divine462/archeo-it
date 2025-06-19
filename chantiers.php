<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chantiers - Archéo-IT</title>
  <link rel="stylesheet" href="assets/css/chantiers.css">
</head>
<body>
  <header class="header">
    <div class="LOGO">
      <img src="assets/images/logo.png" alt="Logo" width="50">
    </div>
    <div class=Navigation>
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
    </div>
  </header>

  <div class="container">
    <h1>Nos Chantiers</h1>

    <div class="card-grid">
      <div class="card">
        <img src="assets/images/fouille1.jpg" alt="Chantier à Nîmes">
        <div class="card-body">
          <h3 class="card-title">Chantier de Nîmes</h3>
          <p class="card-text">Ce chantier explore des vestiges romains près de l'amphithéâtre.</p>
        </div>
      </div>

      <div class="card">
        <img src="assets/images/fouille2.jpg" alt="Chantier à Bordeaux">
        <div class="card-body">
          <h3 class="card-title">Fouilles à Bordeaux</h3>
          <p class="card-text">Des objets médiévaux ont été mis au jour lors de fouilles récentes dans la région bordelaise.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
