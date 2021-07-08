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
    <title>Meetic | Inscription</title>
    <link href="../style.css" rel="stylesheet">
    <script src="../inscription.js" rel="text/javascript"></script>
</head>
<body>
    <?php require('header.php');?>
    <main class="imageMain">
        <img src="../assets/titreMeetic.png" alt="logoMeetic" class="titreMeetic">
        <form action="class.php" method="post" id="form">
            <label for="name" class="none">Nom :</label>
            <input class="FormTransfo" type="text" id="name" name="nom" placeholder="last name" required>
            <br>
            <label for="prename" class="none">Prenom :</label>
            <input class="FormTransfo" type="text" id="prename" name="prenom" placeholder="first name" required>
            <br>
            <label for="date" class="none">Date de naissance :</label>
            <input class="FormTransfo" type="date" id="date" name="naissance" required>
            <br>
            <label for="genre" class="genre none">Genre :</label>
                <select name="Genre" id="genre">
                    <option name="genre">Genre</option>
                    <option name="Femme">Femme</option>
                    <option name="Homme">Homme</option>
                    <option name="Autre">Autre</option>
                </select>
            <br>
            <label for="lieu" class="none">Ville :</label>
            <input class="FormTransfo" type="text" name="Ville" id="lieu" placeholder="City where you live" required>
            <br>
            <label for="e-mail" class="none">Mail :</label>
            <input class="FormTransfo" type="email" name="mail" id="e-mail"  placeholder="e-mail" required>
            <br>
            <input class="FormTransfo" type="email" name="mail2" id="e-mail"  placeholder="confirm your email" required>
            <br>
            <label for="mot_de_passe" class="none">Mot De Passe :</label>
            <input class="FormTransfo" type="password" name="password" id="mot_de_passe" placeholder="Password" required>
            <br>
            <input class="FormTransfo" type="password" name="password2" id="mot_de_passe" placeholder="confirm your password" required>
            <br>
            <label for="loisir" class="none">Loisir :</label>
                <select name="Loisir" id="Loisir">
                    <option name="genre">Loisir</option>
                    <option name="CodeLyoko">CodeLyoko</option>
                </select>
            <br>
            <input type="submit" value="s'inscrire" name="valider">
        </form>
    </main>
    <?php require('footer.php');?>
</body>
</html>