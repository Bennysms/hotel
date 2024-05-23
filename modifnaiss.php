<?php
session_start();
include 'db.php';
if (!$_SESSION['auth']) {
  header('Location:login.php');
  exit();
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  try {
    $stmt = $pdo->prepare('SELECT * FROM naissance WHERE id = ?');
    $stmt->execute([$id]);
    if ($stmt->rowCount() > 0) {
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
      echo 'Identifiant introuvable';
      exit();
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  // requete pour modifier les données dans la base de données
  if (isset($_POST['modifier'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pere']) && !empty($_POST['mere']) && !empty($_POST['nat']) && !empty($_POST['date']) && !empty($_POST['adresse'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $pere = $_POST['pere'];
      $mere = $_POST['mere'];
      $nat = $_POST['nat'];
      $date = $_POST['date'];
      $adresse = $_POST['adresse'];

      try {
        $stmt1 = $pdo->prepare("UPDATE  naissance SET nom=?,prenom=?,pere=?,mere=?,nationalite=?,date_naissance=?,adresse=? WHERE id = $id");
        $stmt1->execute([$nom, $prenom, $pere, $mere, $nat, $date, $adresse]);
        $succes = 'Données modifiées';
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    } else {
      $error = 'Ne laissez pas certains champs vide';
    }
  }
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
      <h1>Acte de naissance numéro <span class="id"><?php echo $data['id'] ?></span></h1>
      <form method="post">
        <h2>Modifier un acte de naissance</h2>
        <!-- message d'erreur -->
        <p class="erreur" <?php if (isset($error)) {
                            echo 'style="display:block;"';
                          } else {
                            echo 'style="display:none;"';
                          } ?>>
          <?php if (isset($error)) {
            echo $error;
          } ?>
        </p>
        <!-- message de succès -->
        <p class="succes" <?php if (isset($succes)) {
                            echo 'style="display:block;"';
                          } else {
                            echo 'style="display:none;"';
                          } ?>>
          <?php if (isset($succes)) {
            echo $succes;
          } ?>
        </p>
        <div class="input-group">
          <!-- nom -->
          <div class="input-label">
            <label for="nom">Nom</label>
            <input type="text" id="username" name="nom" placeholder="Entre votre nom" required value="<?php echo $data['nom'] ?>">
          </div>
          <div class="input-label">
            <!-- prenom -->
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entre votre prénom" required value="<?php echo $data['prenom'] ?>">
          </div>

        </div>
        <div class="input-group">
          <!-- nom du père -->
          <div class="input-label">
            <label for="pere">Nom du père</label>
            <input type="text" id="pere" name="pere" placeholder="Entrer le nom du père" required value="<?php echo $data['pere'] ?>">
          </div>
          <!-- nom de la mère -->
          <div class="input-label">
            <label for="mere">Nom de la mère</label>
            <input type="text" id="mere" name="mere" placeholder="Entrer le nom de la mère" required value="<?php echo $data['mere'] ?>">
          </div>

        </div>
        <div class="input-group">
          <!-- matricule -->
          <div class="input-label">
            <label for="nat">Nationalité</label>
            <input type="text" id="nat" name="nat" placeholder="Entrer la nationalité" required value="<?php echo $data['nationalite'] ?>">
          </div>
          <!-- fonction -->
          <div class="input-label">
            <label for="date">Date de naissance</label>
            <input type="date" id="date" name="date" required value="<?php echo $data['date_naissance'] ?>">
          </div>


        </div>
        <div class="input-text">
          <label for="adresse">Adresse</label>
          <textarea name="adresse" placeholder="Entrer une adresse" required><?php echo $data['adresse'] ?></textarea>
        </div>
        <button type="submit" class="btn" name="modifier">Modifier</button>
      </form>
    </div>
  </main>

  <footer>
    <p>2024 Tous droits resérvés.</p>
  </footer>
</body>

</html>