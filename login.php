<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="style/login.css">
   <title>Se Connexion</title>
</head>

<body>

   <div class="login-container">
      <h2>Se connecter</h2>
      <form method="post" onsubmit="return validatePassword()">
         <div class="input-group">
            <input type="text" id="username" name="username" placeholder="Entre votre email ou numéro de téléphone" required>
         </div>
         <div class="input-group">
            <input type="text" id="password" name="password" placeholder="Entrer votre matricule" required>
         </div>
         <div class="input-group">
            <button type="submit">Connexion</button>
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