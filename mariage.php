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
            <h2>Ajouter un acte de mariage</h2>
            <form method="post">
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
               <button type="submit" class="btn">Valider</button>
            </form>
         </div>
      </div>
   </section>
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
               <tr>
                  <td>12H</td>
                  <td>jdjdjdj</td>
                  <td>kdjdj</td>
                  <td>jdjd</td>
                  <td>jdjdjdj</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consulmariage.php" class="con">Consulter</a>
                     <a href="" class="sup">Supprimer</a>
                  </td>

               </tr>
               <tr>
                  <td>12H</td>
                  <td>ididid</td>
                  <td>ididi</td>
                  <td>kdkdi</td>
                  <td>iidi</td>
                  <td>Directeur</td>

                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consulmariage.php" class="con">Consulter</a>
                     <a href="" class="sup">Supprimer</a>
                  </td>

               </tr>
               <tr>
                  <td>12</td>
                  <td>jjdjdj</td>
                  <td>dididi</td>
                  <td>idiid</td>
                  <td>ididid</td>
                  <td>Directeur</td>

                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consulmariage.php" class="con">Consulter</a>
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