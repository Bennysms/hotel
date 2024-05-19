<!-- Page d'accueil de l'utilisateur -->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accueil Utilisateur</title>
<!-- Le même style CSS peut être utilisé pour cette page -->
<script>
function validateMatricule() {
  var matricule = document.getElementById('matricule').value;
  var errors = [];
  
  if (matricule.length < 8) {
    errors.push("Votre matricule doit contenir au moins 7 caractères.");
  }
  if (!password.match(/[0-9]/)) {
    errors.push("Votre mmatricule doit contenir des chiffres.");
  }
  
  if (errors.length > 0) {
    alert(errors.join("\\n"));
    return false;
  }
  return true;
}
</script>
</head>
<body>
<div class="container">
  <marquee>Bienvenue, Utilisateur</marquee>
  <!-- Contenu spécifique à l'utilisateur -->
  <section id="ajout">
        <form action="/ma_route_d_ajout" method="post">
          <label for="nom">Nom:</label>
          <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
          <label for="prenom">Prénom:</label>
          <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="Votre email" required>
          <form action="matricule" method="get">
            <label for="matricule">Matricule:</label>
            <select id="matricule" name="matricule">
                <option value="OP">Op</option>
            <select>
          <input type="text" id="num_matricule" name="num_matricule" placeholder="Votre numéro de matricule" required>
</form>
  <form action="fonction" method="get">
            <label for="Fonction">Fonction:</label>
            <select id="Fonction" name="Fonction">
                <option value="Analyste">Analyste</option>
                <option value="Analyste">Architecte</option>
                <option value="Bibliothécaire">Bibliothécaire</option>
                <option value="Bibliothécaire">Biologiste</option>
                <option value="Comptable">Comptable</option>
                <option value="Comptable">Chef de projet</option>
                <option value="Développeur">Développeur</option>
                <option value="Développeur">Directeur artistique</option>
                <option value="Educateur">Educateur</option>
                <option value="Educateur">Economiste</option>
                <option value="Floriste">Floriste</option>
                <option value="Floriste">Fiscaliste</option>
                <option value="Géologue">Géologue</option>
                <option value="Géologue">Graphiste</option>
                <option value="Historien">Historien</option>
                <option value="Historien">Hydrologue</option>
                <option value="Infirmier">Infirmier</option>
                <option value="Infirmier">Illustrateur</option>
                <option value="Journaliste">Journaliste</option>
                <option value="Journaliste">Juge</option>
                <option value="Kinésithérapeute">Kinésithérapeute</option>
                <option value="Kinésithérapeute">Kinésiologue</option>
                <option value="Logisticien">Logisticien</option>
                <option value="Logisticien">Linguiste</option>
                <option value="Mécanicien">Mécanicien</option>
                <option value="Mécanicien">Météorologue</option>
                <option value="Nutritionniste">Nutritionniste</option>
                <option value="Nutritionniste">Notaire</option>
                <option value="Opticien">Opticien</option>
                <option value="Opticien">Orthophoniste</option>
                <option value="Psychologue">Psychologue</option>
                <option value="Psychologue">Pilote</option>
                <option value="Qualiticien">Qualiticien</option>
                <option value="Qualiticien">Quant</option>
                <option value="Réceptionniste">Réceptionniste</option>
                <option value="Réceptionniste">Restaurateur</option>
                <option value="Statisticien">Statisticien</option>
                <option value="Statisticien">Sommelier</option>
                <option value="Traducteur">Traducteur</option>
                <option value="Traducteur">Technicien</option>
                <option value="Urologue">Urologue</option>
                <option value="Urologue">Urbaniste</option>
                <option value="Vétérinaire">Vétérinaire</option>
                <option value="Vétérinaire">Visagiste</option>
                <option value="Web designer">Web designer</option>
                <option value="Web designer">Webmaster</option>
                <option value="Xénobiologiste">Xénobiologiste</option>
                <option value="Xénobiologiste">Xylographe</option>
                <option value="Yogiste">Yogiste</option>
                <option value="Yogiste">Yachtman</option>
                <option value="Zoologiste">Zoologiste</option>
                <option value="Zoologiste">Zythologue</option>
                <option value="Autres">Autres</option>
            </select>
            <input type="submit" value="Ajouter">
        </form>
        <form action="type_de_documents" method="get">
                        <label for="type_de_documents">Type de donnée:</label>
                        <select id="type_de_documents" name="type_de_documents">
                            <option value="Acte">Acte de décès</option>
                            <option value="Acte">Acte de mariage</option>
                            <option value="Acte">Acte de naissance</option>
                            <option value="Autres">Autres</option>
                        </select>
                        <input type="submit" value="Consulter">
</form>
        <button type="submit">Connexionr</button>
</select>
</div>
</body>
</html>
