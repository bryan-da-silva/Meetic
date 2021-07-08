<?php
    session_start();
    if(isset($_SESSION['id'])) {
        header('Location:compte.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetic | Connexion</title>
    <link href="../style.css" rel="stylesheet">
    <script src="../connexion.js" rel="text/javascript"></script>
</head>
<body>
    <?php require('header.php');?>
    <main class="imageMain paddingMain">
        <img src="../assets/titreMeetic.png" alt="logoMeetic" class="titreMeetic">
        <div class="connexion">
            <form action="class.php" method="post" id="connexion">
                <label for="mail" class="noDisplay margin"><h3>Adresse email</h3></label>
                <input type="text" name="mail" id="mail" class="padding input_width" required>
                <br>
                <label for="password" class="noDisplay margin"><h3>Mot De Passe</h3></label>
                <input type="password" name="password" id="password" class="input_width padding" required>
                <br>
                <input class="button" type="submit" value="Connexion" name="connect">
            </form>
            <span class="spanInscription"><strong>Pas encore membre ? <a href="inscription.php" class="outline">Inscrivez-vous gratuitement</a></strong></span>
        </div>
    </main>
    <?php require('footer.php');?>
</body>
</html>