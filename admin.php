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
    <title>Admin</title>
</head>

<body>
    <header>

        <?php
        if (isset($_SESSION['login']) && $_SESSION['admin'] == TRUE) {
            echo "      
                <ul> 
                    <button><li><a href='index.php'>Accueil</a></li></button>
                    <button><li><a href='profil.php'>Profil</a></li></button>
                    <button><li><a href='deconnexion.php'>Se déconnecter</a></li></button>
                </ul>";
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
    <h1>Admin</h1>
    <?php
    if ($_SESSION['login'] == TRUE) {
        $req = "SELECT * FROM utilisateurs ";
        $query = mysqli_query($sql, $req);
    }
    ?>

    <table border="9" id="admin">
        <thead>
            <tr>
                <th>Login</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Password</th>
            </tr>
        </thead>
        <?php
        while ($result = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <td><?php echo $result['login']; ?> </td>
                <td><?php echo $result['prenom']; ?> </td>
                <td><?php echo $result['nom']; ?> </td>
                <td><?php echo $result['password']; ?></td>
            </tbody>
        <?php
        }
        ?>
    </table>
    </div>
</body>

</html>
