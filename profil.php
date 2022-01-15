<?php
session_start();
$sessionlogin =  $_SESSION["login"];
include('connect.php');
$requet = "SELECT * FROM utilisateurs WHERE login='$sessionlogin'";
$req2 = mysqli_query($sql, $requet);
$resultat = mysqli_fetch_all($req2);
$login = $resultat[0][1];
$prenom = $resultat[0][2];
$nom = $resultat[0][3];
$password = $resultat[0][4];
if (isset($_POST['Submit'])) {
    $login3 = $_POST['login'];
    $nom3 = $_POST['nom'];
    $prenom3  = $_POST['prenom'];
    $password3  = $_POST['password'];
    if ($login3 != 'admin') {
        $requete = mysqli_query($sql, "UPDATE utilisateurs SET login='$login3', nom='$nom3',prenom='$prenom3',password='$password3' WHERE login='$sessionlogin'");
        $_SESSION['login'] = $login3;
        header('location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>

<body>
    <header>

        <?php
        if (isset($_SESSION['login']) && $_SESSION['admin'] == TRUE) {
            echo "      
                <ul> 
                <button><li><a href='index.php'>Accueil</a></li></button>

                    <button><li><a href='admin.php'>Admin</a></li></button>
                    <button><li><a href='deconnexion.php'>Se déconnecter</a></li></button>
                   
                </ul>
       ";
        }
        if (isset($_SESSION['admin']) != TRUE) {
            echo " 
                <ul>
                <button><li><a href='index.php'>Acceuil</a></li></button>

                    <button><li><a href='inscription.php'>Inscription</a></li></button>
                    <button><li><a href='connexion.php'>Connexion</a></li></button>
                </ul>";
        }
        ?>
    </header>
    </header>
    <h1>Profil</h1>
    <div id="form">
        <form method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Login *</td>
                        <td><input type="text" name="login" value="<?php echo $login ?>"></td>
                    </tr>
                    <tr>
                        <td>Nom *</td>
                        <td><input type="text" name="nom" value="<?php echo $nom ?>"></td>
                    </tr>
                    <tr>
                        <td>Prénom *</td>
                        <td><input type="text" name="prenom" value="<?php echo $prenom ?>"></td>
                    </tr>
                    <tr>
                        <td>Password *</td>
                        <td><input type="password" name="password" value="<?php echo $password ?>"></td>
                    </tr>
                </tbody>
            </table>
            <button name="Submit">modifier</button>

        </form>
    </div>
    <footer>
        <p>Posted by: Meriem Djidel 2021</p>
        <p>Contact information: <a href="mailto:meriem.djidel@laplateforme.io">meriem.djidel@laplateforme.io</a>.</p>
    </footer>
</body>

</html>
