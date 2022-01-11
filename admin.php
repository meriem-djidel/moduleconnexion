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
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </header>
    <h1>Admin</h1>
    <?php
    if ($_SESSION['login'] == 'admin') {
        $req = "SELECT * FROM utilisateurs ";
        $query = mysqli_query($sql, $req);
    }
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>login</th>
                <th>prénom</th>
                <th>nom</th>
                <th>password</th>
            </tr>
        </thead>
        <?php
        while ($result = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <td><?php echo $result['login']; ?></td>
                <td><?php echo $result['prenom']; ?></td>
                <td><?php echo $result['nom']; ?></td>
                <td><?php echo $result['password']; ?></td>
            </tbody>
        <?php
        }
        ?>
    </table>
</body>

</html>