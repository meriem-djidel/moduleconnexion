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
if (isset($_SESSION['login']) && $_SESSION['login'] =='admin')
{
    echo "<nav> 
                <ul>
                    <li><a href='profil.php'>Profil</a></li>
                    <li><a href='admin.php'>Admin</a></li>
                </ul>
         </nav>";
}elseif(isset($_SESSION['login']) && $_SESSION['login'] !='admin') 
{
    echo "<nav>
            
                <ul>
                    <li><a href='profil.php'>Profil</a></li>
                </ul> 
                       
        </nav>";
}
else{
    echo "<nav>
            <ul>
                <button><li><a href='inscription.php'>Inscription</a></li></button>
               <button><li><a href='connexion.php'>Connexion</a></li></button>
            </ul>
        </nav>";
}
?>
</header>
</html>
