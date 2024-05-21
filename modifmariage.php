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
         <h1>Acte de mariage numéro 1</h1>
         <form method="post">
            <h2>Modifier un acte de mariage</h2>
            <p class="erreur">Message d'erreur</p>
            <div class="input-group">
               <!-- nom -->
               <div class="input-label">
                  <label for="marie">Nom du marié</label>
                  <input type="text" id="username" name="nom" placeholder="Entre le nom du marié" required>
               </div>
               <div class="input-label">
                  <!-- prenom -->
                  <label for="mariee">Nom de la mariée</label>
                  <input type="text" id="prenom" name="prenom" placeholder="Entre le nom de la mariée" required>
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
                  <label for="cause">Nombre d'enfants</label>
                  <select name="" id="">
                     <option value="">Choisissez le nombre d'enfants</option>
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