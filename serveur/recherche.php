<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('Location:connexion.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <script src="../recherche.js" type="text/javascript"></script>
    <title>Meetic | Recherche</title>
</head>
<body>
    <?php require('header.php');?>
    <main>
        <article class="article grey">
            <h3 class="inline">RECHERCHE :</h3>
            <form action="#" method="post">
                <label for="genre" class="genre none">Genre :</label>
                <select name="Genre" id="genre">
                    <option name="genre">Genre</option>
                    <option name="Femme">Femme</option>
                    <option name="Homme">Homme</option>
                    <option name="Autre">Autre</option>
                </select>
                <label for="genre" class="genre none">Tranche d'âge :</label>
                <select name="age" id="genre">
                    <option name="Tranche">Tranche d'âge</option>
                    <option name="Femme">18/25</option>
                    <option name="Homme">25/35</option>
                    <option name="Autre">35/45</option>
                    <option name="Autre">45+</option>
                </select>
                <label for="lieu" class="none">Ville :</label>
                <input class="FormTransfo" type="text" name="Ville" id="lieu" placeholder="City where you live" required>
                <label for="loisir" class="none">Loisir :</label>
                <select name="Loisir" id="Loisir">
                    <option name="genre">Loisir</option>
                    <option name="CodeLyoko">CodeLyoko</option>
                </select>
                <input type="submit" value="rechercher" name="recherche">
            </form>
            <?php
                include_once('./class.php');
                $caroussel = new Post();
                $caroussel->recherche();
            ?>
        </article>
    </main>
    <?php require('footer.php');?>
</body>
</html>