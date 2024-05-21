<?php
session_start();
// inclure la base de données
include 'db.php';
if (!$_SESSION['auth']) {
   header('Location:login.php');
}
if (isset($_POST['valider'])) {
   if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['mat']) && !empty($_POST['fonction'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $tel = $_POST['tel'];
      $mat = $_POST['mat'];
      $fonction = $_POST['fonction'];

      // verifier si un utilisateur existe déjà dans la base de données
      try {
         $stmt1 = $pdo->prepare("SELECT * FROM user WHERE email = ? AND matricule = ?");
         $stmt1->execute([$email, $mat]);
         // si un utilisateur est trouvé
         if ($stmt1->rowCount() > 0) {
            $error = 'Cet utilisateur existe déjà';
         } else {
            // si l'utilisateur n'existe pas inseré les données
            try {
               $stmt2 = $pdo->prepare("INSERT INTO user (nom, prenom, email, telephone, matricule,fonction) VALUES (?, ?, ?, ?, ?,?)");
               $stmt2->execute([$nom, $prenom, $email, $tel, $mat, $fonction]);
               $succes = 'Utilisateur ajouté avec succès';
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
         }
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
   <title>Gestion des agents</title>
   <link rel="stylesheet" href="style/gestion.css">
</head>

<body>
   <header>
      <div class="container">
         <a href="" class="logo">
            <img src="images/Logo.png" alt="">
         </a>
         <nav>
            <a href="directeur.php">Page d'accueil</a>
            <a href="logout.php" class="logout">Déconnexion</a>
         </nav>
      </div>
   </header>
   <div class="text">
      <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
   </div>
   <!-- section principal -->
   <main>
      <div class="contenu">
         <div class="gauche">
            <h2>Liste des agents</h2>
            <table>
               <thead>
                  <tr>
                     <th>Matricule</th>
                     <th>Nom</th>
                     <th>Prenom</th>
                     <th>Email</th>
                     <th>Telephone</th>
                     <th>fonction</th>
                     <th>Action</th>
                  </tr>
               </thead>

               <tbody>
                  <?php
                  try {
                     $stmt3 = $pdo->prepare('SELECT * FROM user');
                     $stmt3->execute();
                     if ($stmt3->rowCount() > 0) {
                  ?>
                        <?php while ($users = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
                           <tr>
                              <td><?php echo $users['matricule'] ?></td>
                              <td><?php echo $users['nom'] ?></td>
                              <td><?php echo $users['prenom'] ?></td>
                              <td><?php echo $users['email'] ?></td>
                              <td><?php echo $users['telephone'] ?></td>
                              <td><?php echo $users['fonction'] ?></td>
                              <td class="supprimer">
                                 <a href="agentsuppression.php?id=<?php echo $users['id'] ?>">Supprimer</a>
                              </td>

                           </tr>
                        <?php endwhile; ?>
                  <?php } else {
                        echo 'Aucun utilisateur enregistré';
                     }
                  } catch (PDOException $e) {
                     echo $e->getMessage();
                  }
                  ?>


               </tbody>
            </table>
         </div>
         <div class="droite">
            <h2>Ajouter un agent</h2>
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
                     <label for="nom">Nom</label>
                     <input type="text" id="nom" name="nom" placeholder="Entre votre nom" required>
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
                     <label for="email">Email</label>
                     <input type="email" id="email" name="email" placeholder="Entrer un email" required>
                  </div>
                  <!-- telephone -->
                  <div class="input-label">
                     <label for="tel">Téléphone</label>
                     <input type="text" id="tel" name="tel" placeholder="Entrer un numéro de téléphone" required>
                  </div>

               </div>
               <div class="input-group">
                  <!-- matricule -->
                  <div class="input-label">
                     <label for="mat">Matricule</label>
                     <input type="text" id="mat" name="mat" placeholder="Entrer le matricule" required>
                  </div>
                  <!-- fonction -->
                  <div class="input-label">
                     <label for="fonction">Fonction</label>
                     <select name="fonction" id="fonction" class="fonction" required>
                        <option value="">Selectionner une fonction</option>
                        <option value="Directeur">Directeur</option>
                        <option value="Agent">Agent</option>
                     </select>
                  </div>
               </div>
               <button type="submit" class="btn" name="valider">Valider</button>
            </form>
         </div>
      </div>
   </main>

   <footer>
      <p>2024 Tous droits resérvés.</p>
   </footer>
</body>

</html>