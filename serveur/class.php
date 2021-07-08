<?php
class Sql {
    private $bdd;
    private $user;
    private $pass;
    private $table;
    private $champ;

    public function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=meetic', $user, $pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function getChamp()
    {
        return $this->champ;
    }
    public function setChamp($champ)
    {
        $this->champ = $champ;
    }

    public function getTable()
    {
        return $this->table;
    }
    public function setTable($table)
    {
        $this->table = $table;
    }
}

class Post {
    private $nom;
    private $prenom;
    private $naissance;
    private $genre;
    private $ville;
    private $email;
    private $email2;
    private $mdp;
    private $mdp2;
    private $loisir;
    private $avatar;

    public function getEmail()
    {
        return $this->email;
    }
    public function EmailPost()
    {
        $this->email = $_POST['mail'];
    }

    public function getEmail2()
    {
        return $this->email2;
    }
    public function Email2Post()
    {
        $this->email2 = $_POST['mail2'];
    }

    public function getMdp()
    {
        return $this->mdp;
    }
    public function MdpPost()
    {
        $this->mdp = $_POST['password'];
    }

    public function getMdp2()
    {
        return $this->mdp2;
    }
    public function Mdp2Post()
    {
        $this->mdp2 = $_POST['password2'];
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function NomPost()
    {
        $this->nom = $_POST['nom'];
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function PrenomPost()
    {
        $this->prenom = $_POST['prenom'];
    }

    public function getGenre()
    {
        return $this->genre;
    }
    public function GenrePost()
    {
        $this->genre = $_POST['Genre'];
    }

    public function getLoisir()
    {
        return $this->loisir;
    }
    public function LoisirPost()
    {
        $this->loisir = $_POST['Loisir'];
    }

    public function getNaissance()
    {
        return $this->naissance;
    }
    public function NaissancePost()
    {
        $this->naissance = $_POST['naissance'];
    }

    public function getVille()
    {
        return $this->ville;
    }
    public function VillePost()
    {
        $this->ville = $_POST['Ville'];
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
    public function AvatarPost()
    {
        $this->avatar = $_POST['avatar'];
    }

    // Fonctions de vérifications des données.

    public function inscription() {
        $this->NomPost();
        $nom = $this->getNom();
        if(isset($nom) && !empty($nom) && preg_match("/^[a-zA-Z-' ]*$/", $nom)) {
            $this->PrenomPost();
            $prenom = $this->getPrenom();
            if(isset($prenom) && !empty($prenom) && preg_match("/^[a-zA-Zéèîïç]*$/", $prenom)) {
                $this->NaissancePost();
                $naissance = $this->getNaissance();
                $age = $this->age($naissance);
                if((isset($naissance) && !empty($naissance)) && $age >= '18') {
                    $this->GenrePost();
                    $genre = $this->getGenre();
                    if((isset($genre) && !empty($genre)) && ($genre == "Femme" || $genre == "Homme" || $genre == "Autre") && $genre != 1) {
                        $this->VillePost();
                        $ville = $this->getVille();
                        if(isset($ville) && !empty($ville) && preg_match("/^[a-zA-Zéèîïç]*$/", $ville)) {
                            $this->EMailPost();
                            $mail = $this->getEmail();
                            $this->EMail2Post();
                            $mail2 = $this->getEmail2();
                            if((isset($mail) && !empty($mail)) && (isset($mail2) && !empty($mail2)) && ($mail === $mail2) && (filter_var($mail, FILTER_VALIDATE_EMAIL) && filter_var($mail2, FILTER_VALIDATE_EMAIL))) {
                                $this->MdpPost();
                                $mdp = $this->getMdp();
                                $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
                                $this->Mdp2Post();
                                $mdp2 = $this->getMdp2();
                                if((isset($mdp) && !empty($mdp)) && (isset($mdp2) && !empty($mdp2)) && ($mdp === $mdp2)) {
                                    $this->LoisirPost();
                                    $loisir = $this->getLoisir();
                                    if ((isset($loisir) && !empty($loisir)) && ($loisir == "CodeLyoko" && $loisir != 1)) {
                                        $sql = new Sql("bryan", "Chopper-91100");
                                        $sql->setTable('info_membres');
                                        $age = $this->age($naissance);
                                        $sql->setChamp('nom, prenom, naissance, genre, ville, mail, mot_de_passe, loisirs, age');
                                        $doublon = $sql->getBdd()->query("SELECT mail FROM " . $sql->getTable() . " WHERE mail = '$mail'");
                                        $count = $doublon->rowCount();
                                        if($count == 0) {
                                            $prepare = $sql->getBdd()->prepare("INSERT INTO " . $sql->getTable() . "(" . $sql->getChamp() . ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                            $prepare->execute(array($nom, $prenom, $naissance, $genre, $ville, $mail, $mdpHash, $loisir, $age));
                                            header('Location:connexion.php');
                                            exit;
                                        } else {
                                            return false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        header('Location:inscription.php');
    }

    public function age($dateNaissance) { 
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
        return $diff->format('%y'); 
    }

    public function connexion() {
        $this->EmailPost();
        $mail = $this->getEmail();
        if (isset($mail) && !empty($mail)) {
            $this->MdpPost();
            $mdp = $this->getMdp();
            if (isset($mdp) && !empty($mdp)) {
                $sql = new Sql("bryan", "Chopper-91100");
                $sql->setChamp('*');
                $sql->setTable('info_membres');
                $prepare = $sql->getBdd()->query("SELECT " . $sql->getChamp() . " FROM " . $sql->getTable());
                foreach ($prepare as $row) {
                    if ($row['existes'] == 1) {
                        $mdpHash = password_verify($mdp, $row['mot_de_passe']);
                        if ($mail == $row['mail'] && $mdpHash == $row['mot_de_passe']) {
                            session_start();
                            $_SESSION['id'] = $row['id_membre'];
                            $_SESSION['nom'] = $row['nom'];
                            $_SESSION['prenom'] = $row['prenom'];
                            $_SESSION['age'] = $row['age'];
                            $_SESSION['genre'] = $row['genre'];
                            $_SESSION['ville'] = $row['ville'];
                            $_SESSION['mail'] = $row['mail'];
                            $_SESSION['avatar'] = $row['avatar'];
                            $_SESSION['password'] = $row['mot_de_passe'];
                            $_SESSION['loisir'] = $row['loisirs'];
                            header('Location:compte.php');
                            exit;
                        }
                    }
                }
            }
        }
        header('Location:connexion.php');
    }

    public function deconnexion() {
        $deco = $_POST['deconnexion'];
        if(isset($deco)) {
            session_start();
            session_destroy();
            header('Location:connexion.php');
        }
    }

    public function supp() {
        $supprime = $_POST['supp'];
        if(isset($supprime)) {
            session_start();
            $id = $_SESSION['id'];
            $supp = 0;
            $sql = new Sql("bryan", "Chopper-91100");
            $sql->setTable('info_membres');
            $sql->setChamp('existes = ?');
            $prepare = $sql->getBdd()->prepare("UPDATE " . $sql->getTable() . " SET " . $sql->getChamp() . " WHERE id_membre = " . $id);
            $prepare->execute(array($supp));
            session_destroy();
            header('Location:connexion.php');
        }
    }

    public function recherche() {
        if (isset($_POST['recherche'])) {
            $age = $_POST['age'];
            if((isset($age) && !empty($age)) && $age != 1) {
                $this->GenrePost();
                $genre = $this->getGenre();
                $ageMin = substr($age, 0, 2);
                $ageMax = substr($age, 3, 4);
                if((isset($genre) && !empty($genre)) && ($genre == "Femme" || $genre == "Homme" || $genre == "Autre") && $genre != 1) {
                    $this->VillePost();
                    $ville = $this->getVille();
                    if(isset($ville) && !empty($ville) && preg_match("/^[a-zA-Zéèîïç]*$/", $ville)) {
                        $this->LoisirPost();
                        $loisir = $this->getLoisir();
                        if ((isset($loisir) && !empty($loisir)) && ($loisir == "CodeLyoko" && $loisir != 1)) {
                            $i = 0;
                            $sql = new Sql("bryan", "Chopper-91100");
                            $sql->setTable('info_membres');
                            $sql->setChamp('nom, prenom, naissance, genre, ville, loisirs, avatar, age');
                            $prepare = $sql->getBdd()->query("SELECT " . $sql->getChamp() . " FROM " . $sql->getTable() . " WHERE existes = 1 AND genre = '$genre' AND ville = '$ville' AND loisirs = '$loisir' AND age >= $ageMin AND age <= $ageMax");
                            $count = $prepare->rowCount();
                            if ($count >= 1) {
                                echo "<section class='section caroussel'>";
                                foreach ($prepare as $row) {
                                    $avatar = htmlspecialchars($row['avatar']);
                                    $prenom = htmlspecialchars($row['prenom']);
                                    $nom = htmlspecialchars($row['nom']);
                                    $naissance = htmlspecialchars($row['naissance']);
                                    $genre = htmlspecialchars($row['genre']);
                                    $ville = htmlspecialchars($row['ville']);
                                    $loisir = htmlspecialchars($row['loisirs']);
                                    $age = $this->age($naissance);
                                    if ($i == 0) $div = "<div class='defile'>";
                                    else $div = "<div class='none defile'>";
                                    echo "$div
                                        <img class='image' src='$avatar'>
                                        <ul class='paddingInfo'>
                                            <li class='info infoNom'><h4>NAME</h4></li>
                                            <li class='info name'>$prenom $nom</li>
                                            <br>
                                            <li class='info infoNom'><h4>AGE</h4></li>
                                            <li class='info age'>$age years</li>
                                            <br>
                                            <li class='info infoNom'><h4>GENRE</h4></li>
                                            <li class='info genre'>$genre</li>
                                            <br>
                                            <li class='info infoNom'><h4>LOCATION</h4></li>
                                            <li class='info location'>$ville</li>
                                            <br>
                                            <li class='info infoNom'><h4>LOISIR</h4></li>
                                            <li class='info genre'>$loisir</li>
                                        </ul>
                                    </div>";
                                    $i++;
                                }
                                echo "</section>
                                    <span class='img'>
                                        <img src='../assets/gauche.png' width='100px' class='espace'>
                                        <img src='../assets/droite.png' width='100px'>
                                    </span>";
                                echo "<script>
                                    let img = document.getElementsByTagName('img');
                                    let div = document.getElementsByTagName('div');
                                    let i = 0;
                                    img[img.length - 2].onclick = () => {
                                        if (i !== 0) {
                                            div[i].style.display = 'none';
                                            div[i - 1].style.display = 'block';
                                            i--;
                                        }
                                    }
                                    img[img.length - 1].onclick = () => {
                                        if (i !== div.length - 1) {
                                            div[i].style.display = 'none';
                                            div[i + 1].style.display = 'block';
                                            i++;
                                        }
                                    }
                                </script>";
                                return true;
                            }
                        }
                    }
                }
            }
        } 
        echo "<section class='section caroussel'><h5 class='aucune'>AUCUNE RECHERCHE N'EST EFFECTUER</h5></section>";
    }

    public function edit() {
        $this->NomPost();
        $nom = $this->getNom();
        if(isset($nom) && !empty($nom) && preg_match("/^[a-zA-Z-' ]*$/", $nom)) {
            $this->PrenomPost();
            $prenom = $this->getPrenom();
            if(isset($prenom) && !empty($prenom) && preg_match("/^[a-zA-Zéèîïç]*$/", $prenom)) {
                $this->VillePost();
                $ville = $this->getVille();
                if(isset($ville) && !empty($ville) && preg_match("/^[a-zA-Zéèîïç]*$/", $ville)) {
                    $this->AvatarPost();
                    $avatar = $this->getAvatar();
                    if(isset($avatar) && !empty($avatar)) {
                        $this->EMailPost();
                        $mail = $this->getEmail();
                        if((isset($mail) && !empty($mail)) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $this->MdpPost();
                            $mdp1 = $this->getMdp();
                            session_start();
                            $password = $_SESSION['password'];
                            $mdpVerify = password_verify($mdp1, $password);
                            $this->Mdp2Post();
                            $mdp2 = $this->getMdp2();
                            $mdpHash2 = password_hash($mdp2, PASSWORD_DEFAULT);
                            if((isset($mdp1) && !empty($mdp1)) && (isset($mdp2)) && $mdpVerify == true) {
                                $id = $_SESSION['id'];
                                $sql = new Sql("bryan", "Chopper-91100");
                                $sql->setTable('info_membres');
                                $sql->setChamp('nom = ?, prenom = ?, ville = ?, mail = ?, mot_de_passe = ?, avatar = ?');
                                $prepare = $sql->getBdd()->prepare("UPDATE " . $sql->getTable() . " SET " . $sql->getChamp() . " WHERE id_membre = " . $id);
                                $prepare->execute(array($nom, $prenom, $ville, $mail, $mdpHash2, $avatar));
                                session_destroy();
                                header('Location:connexion.php');
                                exit;
                            }
                        }
                    }
                }
            }
        } 
        header('Location:compte.php');
    }
}

if (isset($_POST['valider'])) {
    $valid = new Post;
    $valid->inscription();
} else if (isset($_POST['connect'])) {
    $connect = new Post;
    $connect->connexion();
} else if (isset($_POST['edit'])) {
    $edit = new Post;
    $edit->edit();
} else if (isset($_POST['supp'])) {
    $supp = new Post;
    $supp->supp();
} else if (isset($_POST['deconnexion'])) {
    $deco = new Post;
    $deco->deconnexion();
} else {
    if ($_SERVER['PHP_SELF'] == "/meetic/W-PHP-501-PAR-1-1-mymeetic-bryan1.da-silva/class.php") header('Location:error.php');
}
?>