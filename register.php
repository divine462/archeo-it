<?php
require 'pdo.php';

$success = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $mode = $_POST['mode'];

    if ($nom && $prenom && $email && $mode) {
        // Appel du script Python pour générer le mot de passe
        $command = escapeshellcmd("python3 generate_password.py " . escapeshellarg($mode));
        $password = trim(shell_exec($command));

        // Hachage du mot de passe pour la BDD
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        // Enregistrement en BDD
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $password_hashed]);

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
    <title>Inscription - Archéo-IT</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="card">
        <h1>Inscription</h1>

        <?php if ($success): ?>
            <p class="success">✅ Inscription réussie !<br> Mot de passe généré : <strong><?= htmlspecialchars($password) ?></strong></p>
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

            <label for="mode">Type de mot de passe :</label>
            <select name="mode" id="mode" required>
                <option value="">-- Choisir un mode --</option>
                <option value="1">Alphabétique seulement</option>
                <option value="2">Alphanumérique</option>
                <option value="3">Alphanumérique + caractères spéciaux</option>
            </select>

            <input type="submit" value="S'inscrire">
        </form>
    </div>
</body>
</html>
