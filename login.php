<?php
session_start();
include 'db.php';
if ($_SESSION['auth']) {
   if ($_SESSION['user']['fonction'] == 'Directeur') {
      header('Location:directeur.php');
   } else {
      header('Location:agent.php');
   }
} else {
   if (isset($_POST['valider'])) {
      if (!empty($_POST['username']) && !empty($_POST['mat'])) {
         $username = $_POST['username'];
         $matricule = $_POST['mat'];
         try {
            $stmt = $pdo->prepare('SELECT * FROM user WHERE matricule = ? AND email = ? OR telephone = ?');
            $stmt->execute([$matricule, $username, $username]);
            if ($stmt->rowCount() > 0) {
               $user = $stmt->fetch(PDO::FETCH_ASSOC);
               // verifier si c'est le même mot de passe
               $_SESSION['user'] = $user;
               $_SESSION['auth'] = true;
               if ($_SESSION['user']['fonction'] == 'Directeur') {
                  header('Location:directeur.php');
               } else {
                  header('Location:agent.php');
               }
            } else {
               $error = 'Compte inexistant';
            }
         } catch (PDOException $e) {
            echo $e->getMessage();
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="style/login.css">
   <title>Connexion</title>
</head>

<body>

   <div class="login-container">
      <h2>Se connecter</h2>
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
      <form method="post" onsubmit="return validatePassword()">
         <div class="input-group">
            <input type="text" id="username" name="username" placeholder="Entre votre email ou numéro de téléphone" required>
         </div>
         <div class="input-group">
            <input type="text" name="mat" placeholder="Entrer votre matricule" required>
         </div>
         <div class="input-group">
            <button type="submit" name="valider">Connexion</button>
         </div>
      </form>
      <div class="create-account">
         <a href="index.php">Page d'acceuil</a>
      </div>
   </div>

   <script>
      function validatePassword() {
         var password = document.getElementById('password').value;
         var errors = [];

         if (password.length < 8) {
            errors.push("Votre mot de passe doit contenir au moins 8 ou 12 caractères.");
         }
         if (!password.match(/[A-Z]/)) {
            errors.push("Votre mot de passe doit contenir au moins une lettre majuscule.");
         }
         if (!password.match(/[a-z]/)) {
            errors.push("Votre mot de passe doit contenir au moins une lettre minuscule.");
         }
         if (!password.match(/[0-9]/)) {
            errors.push("Votre mot de passe doit contenir au moins un chiffre.");
         }

         if (errors.length > 0) {
            alert(errors.join("\\n"));
            return false;
         }
         return true;
      }
   </script>
</body>

</html>