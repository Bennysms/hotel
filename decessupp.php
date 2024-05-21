<?php
// inclure la base de données
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer la requête SQL pour supprimer l'entrée
    $sql = "DELETE FROM deces WHERE id = :id";
    // Préparer l'instruction
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':id', $id);
        // Tenter d'exécuter l'instruction préparée
        if ($stmt->execute()) {
            header('Location:deces.php');
        } else {
            echo "Erreur de suppression";
        }
    }
}
