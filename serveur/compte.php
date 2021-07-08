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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meetic | Mon compte</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../compte.js" rel="text/javascript"></script>
</head>
<body>
    <?php require('header.php');?>
    <main>
        <article class="grey article">
            <h2 class="right">COMPTE<button class="paddingButton pointeur" type="button">EDIT COMPTE</button></h2>
            <section class='section info'>
                <h2>INFORMATIONS</h2>
                <?php
                    $avatar = htmlspecialchars($_SESSION['avatar']);
                    echo "<img class='image' src='$avatar'>";
                ?>
                <ul class="paddingInfo">
                    <li class="info infoNom"><h4>NAME</h4></li>
                    <li class="info name"><?php echo htmlspecialchars($_SESSION['prenom']) . " " . htmlspecialchars($_SESSION['nom']);?></li>
                    <br>
                    <li class="info infoNom"><h4>AGE</h4></li>
                    <li class="info age"><?php echo htmlspecialchars($_SESSION['age']);?></li>
                    <br>
                    <li class="info infoNom"><h4>GENRE</h4></li>
                    <li class="info genre"><?php echo htmlspecialchars($_SESSION['genre']);?></li>
                    <br>
                    <li class="info infoNom"><h4>LOCATION</h4></li>
                    <li class="info location"><?php echo htmlspecialchars($_SESSION['ville']);?></li>
                    <br>
                    <li class="info infoNom"><h4>MAIL</h4></li>
                    <li class="info mail"><?php echo htmlspecialchars($_SESSION['mail']);?></li>
                    <br>
                    <li class="info infoNom"><h4>LOISIR</h4></li>
                    <li class="info genre"><?php echo htmlspecialchars($_SESSION['loisir']);?></li>
                    <li class="info">
                        <form action="class.php" method="post">
                            <input type="submit" value="Déconnexion" name="deconnexion" class="supp deco pointeur">
                        </form>
                    </li>
                    <li class="info">
                        <form action="class.php" method="post">
                            <input type="submit" value="Supprimer le compte" name="supp" class="supp pointeur">
                        </form>
                    </li>
                </ul>
            </section>
            <section class="info sectionDeux">
                <h2 class="paddingDeux">EDIT COMPTE</h2>
                <p class="ligne"></p>
                <form action="class.php" method="post" class="paddingDeux">
                    <label for="nom"><h4 class="info">LAST NAME</h4></label>
                    <input class="nom" type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_SESSION['nom']);?>" disabled required>
                    <br>
                    <label for="prename"><h4 class="info">FIRST NAME</h4></label>
                    <input class="prenom" type="text" id="prename" name="prenom" value="<?php echo htmlspecialchars($_SESSION['prenom']);?>" disabled required>
                    <br>
                    <label for="lieu"><h4 class="info">VILLE</h4></label>
                    <input class="ville" type="text" name="Ville" id="lieu" value="<?php echo htmlspecialchars($_SESSION['ville']);?>" disabled required>
                    <br>
                    <label for="e-mail"><h4 class="info">MAIL</h4></label>
                    <input class="email" type="email" name="mail" id="e-mail" value="<?php echo htmlspecialchars($_SESSION['mail']);?>" disabled required>
                    <br>
                    <label for="avatar"><h4 class="info">AVATAR</h4></label>
                    <input class="avatar" type="text" name="avatar" id="avatar" value="<?php echo htmlspecialchars($_SESSION['avatar']);?>" disabled required>
                    <br>
                    <h4>MOT DE PASSE</h4>
                    <label for="mot_de_passe">Ancien mot de passe :</label>
                    <input class="mdp" type="password" name="password" id="mot_de_passe" disabled required>
                    <br>
                    <br>
                    <label for="mot_de_passe">Nouveau mot de passe :</label>
                    <input class="mdpDeux" type="password" name="password2" id="mot_de_passe" disabled required>
                    <br>
                    <br>
                    <input type="submit" value="edit" name="edit" disabled class="supp edit">
                </form>
            </section>
        </article>
    </main>
    <?php require('footer.php');?>
</body>
</html>
