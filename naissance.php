<?php
session_start();
// inclure la base de données
include 'db.php';
if (!$_SESSION['auth']) {
   header('Location:login.php');
}
if (isset($_POST['valider'])) {
   if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pere']) && !empty($_POST['mere']) && !empty($_POST['nat']) && !empty($_POST['date']) && !empty($_POST['adresse'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $pere = $_POST['pere'];
      $mere = $_POST['mere'];
      $nat = $_POST['nat'];
      $date = $_POST['date'];
      $adresse = $_POST['adresse'];

      try {
         $stmt1 = $pdo->prepare("INSERT INTO naissance (nom, prenom, pere, mere, nationalite,date_naissance,adresse) VALUES (?, ?, ?, ?, ?,?,?)");
         $stmt1->execute([$nom, $prenom, $pere, $mere, $nat, $date, $adresse]);
         $succes = 'Utilisateur ajouté avec succès';
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/naissance.css">
   <title>Acte de naissance</title>
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
            <h2>Ajouter un acte de naissance</h2>
            <form method="post">
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
                     <input type="text" id="nom" name="nom" placeholder="Entre le nom" required>
                  </div>
                  <div class="input-label">
                     <!-- prenom -->
                     <label for="prenom">Prénom</label>
                     <input type="text" id="prenom" name="prenom" placeholder="Entre le prénom" required>
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
               <button type="submit" class="btn" name="valider">Valider</button>
            </form>
         </div>
      </div>
   </section>
   <section id="section2">
      <div class="container">
         <h2>Tous les actes de naissance</h2>
         <table>
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Père</th>
                  <th>Mère</th>
                  <th>Nationalité</th>
                  <th>Naissance</th>
                  <th>Adresse</th>
                  <th>Action</th>
               </tr>
            </thead>

            <tbody>
               <?php
               try {
                  $stmt2 = $pdo->prepare('SELECT * FROM naissance');
                  $stmt2->execute();
                  if ($stmt2->rowCount() > 0) {
               ?>
                     <?php while ($nat = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                           <td><?php echo $nat['id'] ?></td>
                           <td><?php echo $nat['nom'] ?></td>
                           <td><?php echo $nat['prenom'] ?></td>
                           <td><?php echo $nat['pere'] ?></td>
                           <td><?php echo $nat['mere'] ?></td>
                           <td><?php echo $nat['nationalite'] ?></td>
                           <td><?php echo $nat['date_naissance'] ?></td>
                           <td><?php echo $nat['adresse'] ?></td>
                           <td class="action">
                              <a href="modifnaiss.php?id=<?php echo $nat['id'] ?>" class="mod">Modifier</a>
                              <a href="consulnaiss.php?id=<?php echo $nat['id'] ?>" class="con">Consulter</a>
                              <a href="naissancesupp.php?id=<?php echo $nat['id'] ?>" class="sup">Supprimer</a>
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