<?php
session_start();
// inclure la base de données
include 'db.php';
if (!$_SESSION['auth']) {
   header('Location:login.php');
}

if (isset($_POST['valider'])) {
   if (!empty($_POST['marie']) && !empty($_POST['mariee']) && !empty($_POST['date']) && !empty($_POST['enfant']) && !empty($_POST['adresse'])) {
      $marie = $_POST['marie'];
      $mariee = $_POST['mariee'];
      $date = $_POST['date'];
      $enfant = $_POST['enfant'];
      $adresse = $_POST['adresse'];

      try {
         $stmt1 = $pdo->prepare("INSERT INTO mariage (marie, mariee, date_mariage, enfants,adresse) VALUES (?, ?, ?, ?, ?)");
         $stmt1->execute([$marie, $mariee, $date, $enfant, $adresse]);
         $succes = 'Donnée ajoutée avec succès';
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   } else {
      $error = "Certains champs sont vide";
   }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/mariage.css">
   <title>Acte de mariage</title>
</head>

<body>
   <header>
      <div class="container">
         <a href="" class="logo">
            <img src="images/Logo.png" alt="">
         </a>
         <nav>
            <a href="agent.php">Menu principal</a>
            <a href="logout.php" class="logout">Déconnexion</a>
         </nav>
      </div>
   </header>
   <div class="text">
      <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
   </div>
   <!-- section 1 -->
   <section id="section1">
      <div class="container">
         <div class="gauche">
            <img src="images/H1.jpeg" alt="">
            <img src="images/H2.jpeg" alt="">
            <img src="images/H3.jpeg" alt="">
            <img src="images/H4.jpg" alt="">
         </div>
         <div class="droite">
            <h2>Ajouter un acte de mariage</h2>
            <form method="POST">
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
                     <input type="text" id="marie" name="marie" placeholder="Entre le nom du marié" required>
                  </div>
                  <div class="input-label">
                     <!-- prenom -->
                     <label for="mariee">Nom de la mariée</label>
                     <input type="text" id="mariee" name="mariee" placeholder="Entre le nom de la mariée" required>
                  </div>

               </div>

               <div class="input-group">
                  <!-- matricule -->
                  <div class="input-label">
                     <label for="date">Date de mariage</label>
                     <input type="date" id="date" name="date" required>
                  </div>
                  <!-- cause -->
                  <div class="input-label">
                     <label for="enfants">Nombre d'enfants</label>
                     <select name="enfant" id="enfants" required>
                        <option value="">Choisissez le nombre d'enfants</option>
                        <option value="Pas d'enfants">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3+">3+</option>
                     </select>
                  </div>
               </div>
               <div class="input-text">
                  <label for="adresse">Adresse</label>
                  <textarea name="adresse" placeholder="Entrer une adresse" required></textarea>
               </div>
               <button type="submit" class="btn" name="valider">Valider</button>
            </form>
         </div>
      </div>
   </section>
   <!-- le tableau -->
   <section id="section2">
      <div class="container">
         <h2>Tous les actes de mariage</h2>
         <table>
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nom du marié</th>
                  <th>Nom de la mariée</th>
                  <th>Date</th>
                  <th>Nombre d'enfants</th>
                  <th>Adresse</th>
                  <th>Action</th>
               </tr>
            </thead>

            <tbody>
               <?php
               try {
                  $stmt2 = $pdo->prepare('SELECT * FROM mariage');
                  $stmt2->execute();
                  if ($stmt2->rowCount() > 0) {
               ?>
                     <?php while ($mariage = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                           <td><?php echo $mariage['id'] ?></td>
                           <td><?php echo $mariage['marie'] ?></td>
                           <td><?php echo $mariage['mariee'] ?></td>
                           <td><?php echo $mariage['date_mariage'] ?></td>
                           <td><?php echo $mariage['enfants'] ?></td>
                           <td><?php echo $mariage['adresse'] ?></td>
                           <td class="action">
                              <a href="modifmariage.php?id=<?php echo $mariage['id'] ?>" class="mod">Modifier</a>
                              <a href="consulmariage.php?id=<?php echo $mariage['id'] ?>" class="con">Consulter</a>
                              <a href="mariagesupp.php?id=<?php echo $mariage['id'] ?>" class="sup">Supprimer</a>
                           </td>

                        </tr>
                     <?php endwhile; ?>
               <?php } else {
                     echo '<tr><td>Aucune donnée enregistrés</td></tr>';
                  }
               } catch (PDOException $e) {
                  echo $e->getMessage();
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>
   <footer>
      <p>2024 Tous droits resérvés.</p>
   </footer>
</body>

</html>