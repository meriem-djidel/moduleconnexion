<?php
session_start();

include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mon Site</title>
</head>
<header>
    <?php
    if (isset($_SESSION['login']) && $_SESSION['admin'] == TRUE) {
        echo "      
                <ul>
                    <button><li><a href='deconnexion.php'>Se déconnecter</a></li></button>
                    <button><li><a href='profil.php'>Profil</a></li></button>
                    <button><li><a href='admin.php'>Admin</a></li></button>
                </ul>
       ";
    }
    if (isset($_SESSION['admin']) != TRUE) {
        echo " 
                <ul>
                    <button><li><a href='inscription.php'>Inscription</a></li></button>
                    <button><li><a href='connexion.php'>Connexion</a></li></button>
                </ul>";
    }
    ?>

</header>
<div id="titre"> <?php if (isset($_SESSION['login']) && $_SESSION['login'] == TRUE) {
                        echo "<p> Bienvenue " . $_SESSION['login'] . "</p>";
                    } else {
                        echo "<h3>Bienvenue</h3>";
                    }; ?></div>

<footer class="footerIndex">
</footer>
<footer>
    <br>
    <a href=" https://www.w3schools.com/"> w3schools</a>| |<a href="https://www.udemy.com/">Formation Udemy</a>| |<a href="https://github.com/meriem-djidel">Github</a>| |<a href="https://intra.laplateforme.io/">La Plateforme</a><br>
    <a href="mailto:meriem.djidel@laplateforme.io">Contact information:meriem.djidel@laplateforme.io</a>
    <h6>Posted by: Meriem Djidel 2021</h6>
</footer>
</body>

</html>
