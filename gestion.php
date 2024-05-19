<!DOCTYPE html>
<html lang="en">

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
      <marquee>Bienvenue, Utilisateur</marquee>
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
                  <tr>
                     <td>12HUU89</td>
                     <td>Simisi</td>
                     <td>benny</td>
                     <td>simisibenny@gmail.com</td>
                     <td>23563788</td>
                     <td>Directeur</td>
                     <td class="supprimer">
                        <a href="">Supprimer</a>
                     </td>

                  </tr>
                  <tr>
                     <td>12HUU89</td>
                     <td>Simisi</td>
                     <td>benny</td>
                     <td>simisibenny@gmail.com</td>
                     <td>23563788</td>
                     <td>Directeur</td>
                     <td class="supprimer">
                        <a href="">Supprimer</a>
                     </td>

                  </tr>
                  <tr>
                     <td>12HUU89</td>
                     <td>Simisi</td>
                     <td>benny</td>
                     <td>simisibenny@gmail.com</td>
                     <td>23563788</td>
                     <td>Directeur</td>
                     <td class="supprimer">
                        <a href="">Supprimer</a>
                     </td>

                  </tr>
               </tbody>
            </table>
         </div>
         <div class="droite">
            <h2>Ajouter un agent</h2>
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
                     <select name="" id="fonction" class="fonction">
                        <option value="">Selectionner une fonction</option>
                        <option value="">Directeur</option>
                        <option value="">Agent</option>
                     </select>
                  </div>
               </div>
               <button type="submit" class="btn">Valider</button>
            </form>
         </div>
      </div>
   </main>

   <footer>
      <p>2024 Tous droits resérvés.</p>
   </footer>
</body>

</html>