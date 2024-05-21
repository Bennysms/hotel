<?php
session_start();
if (!$_SESSION['auth']) {
   header('Location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/agent.css">
   <title>Agent</title>
</head>

<body>
   <header>
      <div class="container">
         <a href="" class="logo">
            <img src="images/Logo.png" alt="">
         </a>
         <nav>
            <?php
            if ($_SESSION['user']['fonction'] == 'Directeur') {
               echo '<a href="directeur.php">Page d\'accueil</a>';
            }
            ?>
            <a href="logout.php" class="logout">Déconnexion</a>
         </nav>
      </div>
   </header>
   <div class="text">
      <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
   </div>
   <section>
      <div class="container">
         <div class="text">
            <h1>Gérer efficacement la ville de Kinshasa</h1>
            <div class="actes">
               <a href="naissance.php">Acte de naissance</a>
               <a href="deces.php" class="dc">Acte de déces</a>
               <a href="mariage.php" class="mr">Acte de mariage</a>
            </div>
         </div>
         <div class="images">
            <img src="images/H1.jpeg" alt="">
            <img src="images/H2.jpeg" alt="">
            <img src="images/H3.jpeg" alt="">
            <img src="images/H4.jpg" alt="">
         </div>
      </div>
   </section>
   <footer>
      <p>2024 Tous droits resérvés.</p>
   </footer>
</body>

</html>