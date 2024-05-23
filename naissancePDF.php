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
        $stmt = $pdo->prepare('SELECT * FROM naissance WHERE id = ?');
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
$css = file_get_contents('style/consulnaiss.css');

// Créer le contenu HTML pour le PDF
$html = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Acte de naissance numéro ' . $data['id'] . '</title>
    <style>' . $css . '</style>
</head>
<body>
    <main>
        <h1>Acte de naissance numéro ' . $data['id'] . '</h1>
        <div class="container">
            <div class="acte">
                <div class="identite">
                    <h2>Nom :</h2>
                    <p>' . $data['nom'] . '</p>
                </div>
                <div class="identite">
                    <h2>Prénom :</h2>
                    <p>' . $data['prenom'] . '</p>
                </div>
                <div class="identite">
                    <h2>Nom du père :</h2>
                    <p>' . $data['pere'] . '</p>
                </div>
                <div class="identite">
                    <h2>Nom de la mère :</h2>
                    <p>' . $data['mere'] . '</p>
                </div>
                <div class="identite">
                    <h2>Nationalité :</h2>
                    <p>' . $data['nationalite'] . '</p>
                </div>
                <div class="identite">
                    <h2>Date de naissance :</h2>
                    <p>' . $data['date_naissance'] . '</p>
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
$dompdf->stream('acte_naissance_' . $data['id'] . '.pdf', array("Attachment" => 1));
