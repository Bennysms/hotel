<?php
session_start();
if (!$_SESSION['auth']) {
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un acte de naissance</title>
  <link rel="stylesheet" href="style/modifnaiss.css">
</head>

<body>
  <header>
    <div class="container">
      <a href="" class="logo">
        <img src="images/Logo.png" alt="">
      </a>
      <nav>
        <a href="naissance.php">Retour</a>
        <a href="logout.php" class="logout">Déconnexion</a>
      </nav>
    </div>
  </header>
  <div class="text">
    <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
  </div>
  <main>
    <div class="container">
      <h1>Acte de naissance numéro 1</h1>
      <form method="post">
        <h2>Modifier un acte de naissance</h2>
        <p class="erreur">Message d'erreur</p>
        <div class="input-group">
          <!-- nom -->
          <div class="input-label">
            <label for="nom">Nom</label>
            <input type="text" id="username" name="nom" placeholder="Entre votre nom" required>
          </div>
          <div class="input-label">
            <!-- prenom -->
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entre votre prénom" required>
          </div>

        </div>
        <div class="input-group">
          <!-- email -->
          <div class="input-label">
            <label for="pere">Nom du père</label>
            <input type="text" id="pere" name="pere" placeholder="Entrer le nom du père" required>
          </div>
          <!-- telephone -->
          <div class="input-label">
            <label for="mere">Nom de la mère</label>
            <input type="text" id="mere" name="mere" placeholder="Entrer le nom de la mère" required>
          </div>

        </div>
        <div class="input-group">
          <!-- matricule -->
          <div class="input-label">
            <label for="nat">Nationalité</label>
            <input type="text" id="nat" name="nat" placeholder="Entrer la nationalité" required>
          </div>
          <!-- fonction -->
          <div class="input-label">
            <label for="date">Date de naissance</label>
            <input type="date" id="date" name="date" required>
          </div>


        </div>
        <div class="input-text">
          <label for="adresse">Adresse</label>
          <textarea name="adresse" placeholder="Entrer une adresse"></textarea>
        </div>
        <button type="submit" class="btn">Modifier</button>
      </form>
    </div>
  </main>

  <footer>
    <p>2024 Tous droits resérvés.</p>
  </footer>
</body>

</html>