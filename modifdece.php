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
      $stmt = $pdo->prepare('SELECT * FROM deces WHERE id = ?');
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
      if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['nat']) && !empty($_POST['cause']) && !empty($_POST['date1']) && !empty($_POST['date2']) && !empty($_POST['adresse'])) {
         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];
         $nat = $_POST['nat'];
         $cause = $_POST['cause'];
         $date1 = $_POST['date1'];
         $date2 = $_POST['date2'];
         $adresse = $_POST['adresse'];
         try {
            $stmt1 = $pdo->prepare("UPDATE  deces SET nom=?,prenom=?,nationalite=?,cause=?,naissance=?,deces=?,adresse=? WHERE id = $id");
            $stmt1->execute([$nom, $prenom, $nat, $cause, $date1, $date2, $adresse]);
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
   <title>Modifier un acte de décès</title>
   <link rel="stylesheet" href="style/modifdece.css">
</head>

<body>
   <header>
      <div class="container">
         <a href="" class="logo">
            <img src="images/Logo.png" alt="">
         </a>
         <nav>
            <a href="deces.php">Retour</a>
            <a href="logout.php" class="logout">Déconnexion</a>
         </nav>
      </div>
   </header>
   <div class="text">
      <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
   </div>
   <main>
      <div class="container">
         <h1>Acte de décès numéro <span class="id"><?php echo $data['id'] ?></span></h1>
         <form method="post">
            <h2>Modifier un acte de décès</h2>
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
                  <input type="text" id="nom" name="nom" placeholder="Entre votre nom" required value="<?php echo $data['nom'] ?>">
               </div>
               <div class="input-label">
                  <!-- prenom -->
                  <label for="prenom">Prénom</label>
                  <input type="text" id="prenom" name="prenom" placeholder="Entre votre prénom" required value="<?php echo $data['prenom'] ?>">
               </div>

            </div>

            <div class="input-group">
               <!-- nationalité -->
               <div class="input-label">
                  <label for="nat">Nationalité</label>
                  <input type="text" id="nat" name="nat" placeholder="Entrer la nationalité" required value="<?php echo $data['nationalite'] ?>">
               </div>
               <!-- cause -->
               <div class="input-label">
                  <label for="cause">Cause de décès</label>
                  <select name="cause" id="cause">
                     <option value="<?php echo $data['cause'] ?>"><?php echo $data['cause'] ?></option>
                     <option value="maladie">Maladie</option>
                     <option value="accident">Accident</option>
                     <option value="autre">Autres</option>
                  </select>
               </div>
            </div>
            <div class="input-group">
               <div class="input-label">
                  <label for="date">Date de naissance</label>
                  <input type="date" id="date" name="date1" required value="<?php echo $data['naissance'] ?>">
               </div>
               <div class="input-label">
                  <label for="dc">Date de décès</label>
                  <input type="date" id="dc" name="date2" required value="<?php echo $data['deces'] ?>">
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