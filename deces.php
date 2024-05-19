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
            <h2>Ajouter un acte de décès</h2>
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
                  <!-- matricule -->
                  <div class="input-label">
                     <label for="nat">Nationalité</label>
                     <input type="text" id="nat" name="nat" placeholder="Entrer la nationalité" required>
                  </div>
                  <!-- cause -->
                  <div class="input-label">
                     <label for="cause">Cause de décès</label>
                     <select name="" id="">
                        <option value="">Choisissez la cause du décès</option>
                        <option value="maladie">Maladie</option>
                        <option value="accident">Accident</option>
                        <option value="autre">Autres</option>
                     </select>
                  </div>
               </div>
               <div class="input-group">
                  <div class="input-label">
                     <label for="date">Date de naissance</label>
                     <input type="date" id="date" name="date" required>
                  </div>
                  <div class="input-label">
                     <label for="dc">Date de décès</label>
                     <input type="date" id="dc" name="dc" required>
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
         <h2>Tous les actes de décès</h2>
         <table>
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Nationalité</th>
                  <th>Cause</th>
                  <th>Décès</th>
                  <th>Naissance</th>
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
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consuldece.php" class="con">Consulter</a>
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
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consuldece.php" class="con">Consulter</a>
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
                  <td>Directeur</td>
                  <td>Directeur</td>
                  <td class="action">
                     <a href="" class="mod">Modifier</a>
                     <a href="consuldece.php" class="con">Consulter</a>
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