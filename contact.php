<?php
require 'pdo.php';

$success = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nom = trim($_POST['nom']);
  $prenom = trim($_POST['prenom']);
  $email = trim($_POST['email']);
  $sujet = $_POST['sujet'];
  $message = trim($_POST['message']);

  if ($nom && $prenom && $email && $sujet && $message) {
    $sql = "INSERT INTO contacts (nom, prenom, email, sujet, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $sujet, $message]);
    $success = true;
  } else {
    $error = "Tous les champs sont obligatoires.";
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contact - Archéo-IT</title>
  <link rel="stylesheet" href="assets/css/contact.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

  <div class="card">
    <h1>Contactez-nous</h1>

    <?php if ($success): ?>
      <p class="success">✅ Votre message a été envoyé avec succès !</p>
    <?php elseif ($error): ?>
      <p class="error">❌ <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required>

      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" required>

      <label for="email">Email :</label>
      <input type="email" name="email" id="email" required>

      <label for="sujet">Sujet :</label>
      <select name="sujet" id="sujet" required>
        <option value="">-- Choisir un sujet --</option>
        <option value="Demande d'infos">Demande d'infos</option>
        <option value="Demande de Rendez-vous">Demande de Rendez-vous</option>
        <option value="Autre">Autre</option>
      </select>

      <label for="message">Message :</label>
      <textarea name="message" id="message" rows="5" required></textarea>

      <input type="submit" value="Envoyer">
    </form>
  </div>

</body>
</html>
