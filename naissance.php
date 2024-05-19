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
      <marquee>Bienvenue, Utilisateur</marquee>
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
               <button type="submit" class="btn">Valider</button>
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
               <tr>
                  <td>12H</td>
                  <td>Simisi</td>
                  <td>benny</td>
                  <td>simisi</td>
                  <td>23563788</td>
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consulnaiss.php" class="con">Consulter</a>
                     <a href="" class="sup">Supprimer</a>
                  </td>

               </tr>
               <tr>
                  <td>12H</td>
                  <td>Simisi</td>
                  <td>benny</td>
                  <td>simisib</td>
                  <td>23563788</td>
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consulnaiss.php" class="con">Consulter</a>
                     <a href="" class="sup">Supprimer</a>
                  </td>

               </tr>
               <tr>
                  <td>12</td>
                  <td>Simisi</td>
                  <td>benny</td>
                  <td>simisibe</td>
                  <td>23563788</td>
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consulnaiss.php" class="con">Consulter</a>
                     <a href="" class="sup">Supprimer</a>
                  </td>

               </tr>
            </tbody>
         </table>
      </div>
   </section>
   <footer>
      <p>2024 Tous droits resérvés.</p>
   </footer>
</body>

</html>