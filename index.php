<?php require 'pdo.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil - Archéo-IT</title>
  <link rel="stylesheet" href="assets/css/index.css">
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

  <div class="container">
    <h1>Actualités Archéo-IT</h1>

    <div class="card-grid">
      <div class="card">
        <img src="assets/images/Lyon.jpg" alt="Fouille à Lyon">
        <div class="card-body">
          <h3 class="card-title">Fouille à Lyon</h3>
          <p class="card-text">Une nouvelle fouille archéologique commence dans le quartier historique de Lyon.</p>
        </div>
      </div>

      <div class="card">
        <img src="assets/images/Marseille.jpg" alt="Découverte à Marseille">
        <div class="card-body">
          <h3 class="card-title">Découverte à Marseille</h3>
          <p class="card-text">Des artefacts antiques ont été découverts lors d’un chantier de construction.</p>
        </div>
      </div>

      <div class="card">
        <img src="assets/images/Paris.jpg" alt="Conférence à Paris">
        <div class="card-body">
          <h3 class="card-title">Conférence à Paris</h3>
          <p class="card-text">L’association organise une conférence sur les nouvelles technologies en archéologie.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
