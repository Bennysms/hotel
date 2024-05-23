<?php
session_start();
include 'db.php';
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
    header('Location: login.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $pdo->prepare('SELECT * FROM mariage WHERE id = ?');
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
}

// Configurer Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);  // Pour activer le chargement des images distantes
$dompdf = new Dompdf($options);

// Chemin absolu vers le fichier CSS
$css = file_get_contents('style/consulmariage.css');

// Créer le contenu HTML pour le PDF
$html = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Acte de mariage numéro ' . $data['id'] . '</title>
    <style>' . $css . '</style>
</head>
<body>
<main>
    <h1>Acte de mariage numéro ' . $data['id'] . '</h1>
    <div class="container">
        <div class="acte">
            <div class="identite">
                <h2>Nom du marié :</h2>
                <p>' . $data['marie'] . '</p>
            </div>
            <div class="identite">
                <h2>Nom de la mariée :</h2>
                <p>' . $data['mariee'] . '</p>
            </div>
            <div class="identite">
                <h2>Date du mariage :</h2>
                <p>' . $data['date_mariage'] . '</p>
            </div>
            <div class="identite">
                <h2>Nombre d\'enfants :</h2>
                <p>' . $data['enfants'] . '</p>
            </div>
            <div class="identite">
                <h2>Adresse :</h2>
                <p>' . $data['adresse'] . '</p>
            </div>
        </div>
    </div>
</main>
</body>
</html>';

// Charger le HTML dans Dompdf
$dompdf->loadHtml($html);

// (Optionnel) Définir la taille et l'orientation du papier
$dompdf->setPaper('A4', 'portrait');

// Rendre le HTML en PDF
$dompdf->render();

// Envoyer le PDF au navigateur pour téléchargement
$dompdf->stream('acte_mariage_' . $data['id'] . '.pdf', array("Attachment" => 1));
