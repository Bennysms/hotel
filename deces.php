<?php
session_start();
// inclure la base de données
include 'db.php';
if (!$_SESSION['auth']) {
   header('Location:login.php');
}
if (isset($_POST['valider'])) {
   if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['nat']) && !empty($_POST['cause']) && !empty($_POST['date1']) && !empty($_POST['date2']) && !empty($_POST['adresse'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $nat = $_POST['nat'];
      $cause = $_POST['cause'];
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $adresse = $_POST['adresse'];

      try {
         $stmt1 = $pdo->prepare("INSERT INTO deces (nom, prenom, nationalite, cause, naissance,deces,adresse) VALUES (?, ?, ?, ?, ?,?,?)");
         $stmt1->execute([$nom, $prenom, $nat, $cause, $date1, $date2, $adresse]);
         $succes = 'donnée ajoutée avec succès';
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
   <link rel="stylesheet" href="style/dece.css">
   <title>Acte de décès</title>
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
            <h2>Ajouter un acte de décès</h2>
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
                  <!-- matricule -->
                  <div class="input-label">
                     <label for="nat">Nationalité</label>
                     <input type="text" id="nat" name="nat" placeholder="Entrer la nationalité" required>
                  </div>
                  <!-- cause -->
                  <div class="input-label">
                     <label for="cause">Cause de décès</label>
                     <select name="cause" id="">
                        <option value="">Choisissez la cause du décès</option>
                        <option value="maladie">Maladie</option>
                        <option value="accident">Accident</option>
                        <option value="autre">Autres</option>
                     </select>
                  </div>
               </div>
               <div class="input-group">
                  <div class="input-label">
                     <label for="date1">Date de naissance</label>
                     <input type="date" id="date1" name="date1" required>
                  </div>
                  <div class="input-label">
                     <label for="dc">Date du décès</label>
                     <input type="date" id="dc" name="date2" required>
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
         <h2>Tous les actes de décès</h2>
         <table>
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Nationalité</th>
                  <th>Cause</th>
                  <th>Naissance</th>
                  <th>Décès</th>
                  <th>Adresse</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               try {
                  $stmt2 = $pdo->prepare('SELECT * FROM deces');
                  $stmt2->execute();
                  if ($stmt2->rowCount() > 0) {
               ?>
                     <?php while ($deces = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                           <td><?php echo $deces['id'] ?></td>
                           <td><?php echo $deces['nom'] ?></td>
                           <td><?php echo $deces['prenom'] ?></td>
                           <td><?php echo $deces['nationalite'] ?></td>
                           <td><?php echo $deces['cause'] ?></td>
                           <td><?php echo $deces['naissance'] ?></td>
                           <td><?php echo $deces['deces'] ?></td>
                           <td><?php echo $deces['adresse'] ?></td>
                           <td class="action">
                              <a href="modifdece.php?id=<?php echo $deces['id'] ?>" class="mod">Modifier</a>
                              <a href="consuldece.php?id=<?php echo $deces['id'] ?>" class="con">Consulter</a>
                              <a href="decessupp.php?id=<?php echo $deces['id'] ?>" class="sup">Supprimer</a>
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