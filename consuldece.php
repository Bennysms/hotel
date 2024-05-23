<?php
session_start();
include 'db.php';
if (!$_SESSION['auth']) {
    header('Location:login.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $pdo->prepare('SELECT * FROM deces WHERE id = ?');
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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter un acte de décès</title>
    <link rel="stylesheet" href="style/consuldece.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="" class="logo">
                <img src="images/Logo.png" alt="">
            </a>
            <nav>
                <a href="deces.php">Retour</a>
                <a href="logout.php" class="logout">Déconnexion</a>
            </nav>
        </div>
    </header>
    <div class="text">
        <marquee>Bienvenue, <?php echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom']; ?></marquee>
    </div>
    <main>
        <h1>Acte de décès numéro <span class="id"><?php echo $data['id'] ?></span></h1>
        <div class="container">
            <div class="acte">
                <div class="identite">
                    <h2>Nom :</h2>
                    <p><?php echo $data['nom'] ?></p>
                </div>
                <div class="identite">
                    <h2>Prénom :</h2>
                    <p><?php echo $data['prenom'] ?></p>
                </div>
                <div class="identite">
                    <h2>Nationalité :</h2>
                    <p><?php echo $data['nationalite'] ?></p>
                </div>
                <div class="identite">
                    <h2>Cause du décès :</h2>
                    <p><?php echo $data['cause'] ?></p>
                </div>
                <div class="identite">
                    <h2>Date de naissance :</h2>
                    <p><?php echo $data['naissance'] ?></p>
                </div>
                <div class="identite">
                    <h2>Date du décès :</h2>
                    <p><?php echo $data['deces'] ?></p>
                </div>
                <div class="identite">
                    <h2>Adresse :</h2>
                    <p><?php echo $data['adresse'] ?></p>
                </div>
            </div>
            <div class="btn-group">
                <a href="decesPDF.php?id=<?php echo $data['id']; ?>">Télécharger</a>
                <a href="">Envoyez par email</a>
            </div>
        </div>
    </main>

    <footer>
        <p>2024 Tous droits resérvés.</p>
    </footer>
</body>

</html>