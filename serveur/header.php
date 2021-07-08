<header>
    <img src="../assets/logoMeetic.png" alt="logo meetic" class="logoMeetic">
    <?php
        if (!isset($_SESSION['id'])) {
            echo "<nav>
                    <ul class='headerList'>
                        <li class='pointeur click'><a href='connexion.php'>Connexion</a></li>
                        <li class='pointeur click'><a href='inscription.php'>Inscription</a></li>
                    </ul>
                </nav>";
        } elseif (isset($_SESSION['id'])) {
            echo "<nav>
                    <ul class='headerList'>
                        <li class='pointeur click'><a href='compte.php'>Mon Compte</a></li>
                        <li class='pointeur click'><a href='recherche.php'>Recherche</a></li>
                    </ul>
                </nav>";
        }
    ?>
</header>