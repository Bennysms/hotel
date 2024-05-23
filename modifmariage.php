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
      $stmt = $pdo->prepare('SELECT * FROM mariage WHERE id = ?');
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
      if (!empty($_POST['marie']) && !empty($_POST['mariee']) && !empty($_POST['date']) && !empty($_POST['enfant']) && !empty($_POST['adresse'])) {
         $marie = $_POST['marie'];
         $mariee = $_POST['mariee'];
         $date = $_POST['date'];
         $enfant = $_POST['enfant'];
         $adresse = $_POST['adresse'];

         try {
            $stmt1 = $pdo->prepare("UPDATE  mariage SET marie=?,mariee=?,date_mariage=?,enfants=?,adresse=? WHERE id = $id");
            $stmt1->execute([$marie, $mariee, $date, $enfant, $adresse]);
            $succes = 'Données modifiées';
         } catch (PDOException $e) {
            echo $e->getMessage();
         }
      } else {
         $error = "Ne laissez pas certains champs vide";
      }
   }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Modifier un acte de mariage</title>
   <link rel="stylesheet" href="style/modifmariage.css">
</head>

<body>
   <header>
      <div class="container">
         <a href="" class="logo">
            <img src="images/Logo.png" alt="">
         </a>
         <nav>
            <a href="mariage.php">Retour</a>
            <a href="logout.php" class="logout">Déconnexion</a>
         </nav>
      </div>
   </header>
   <div class="text">
      <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
   </div>
   <main>
      <div class="container">
         <h1>Acte de mariage numéro <span class="id"><?php echo $data['id'] ?></span></h1>
         <form method="post">
            <h2>Modifier un acte de mariage</h2>
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
                  <label for="marie">Nom du marié</label>
                  <input type="text" id="username" name="marie" placeholder="Entre le nom du marié" required value="<?php echo $data['marie'] ?>">
               </div>
               <div class="input-label">
                  <!-- prenom -->
                  <label for="mariee">Nom de la mariée</label>
                  <input type="text" id="prenom" name="mariee" placeholder="Entre le nom de la mariée" required value="<?php echo $data['mariee'] ?>">
               </div>

            </div>

            <div class="input-group">
               <!-- matricule -->
               <div class="input-label">
                  <label for="date">Date de mariage</label>
                  <input type="date" id="date" name="date" required value="<?php echo $data['date_mariage'] ?>">
               </div>
               <!-- cause -->
               <div class="input-label">
                  <label for="enfants">Nombre d'enfants</label>
                  <select name="enfant" id="enfant" required>
                     <option value="<?php echo $data['enfants'] ?>"><?php echo $data['enfants'] ?></option>
                     <option value="0">0</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="3+">3+</option>
                  </select>
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