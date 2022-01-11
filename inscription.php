<?php
session_start();
include('connect.php');
if (isset($_POST["Submit"])) {
    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $prenom  = $_POST['prenom'];
    $password  = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    $req1 = "SELECT * FROM utilisateurs WHERE login='$login'";
    $query1 = mysqli_query($sql, $req1);
    $resultat = mysqli_fetch_all($query1);
    if ($password != $passwordConfirm) {
        echo "<p style='color : red;'>Les mots de passe ne sont pas identique </p>";
    } elseif (count($resultat) != 0) {
        echo "<p style='color : red;'>Login déjà existant </p>";
    } else {
        $req2 = "INSERT INTO utilisateurs (login,prenom,nom,password) VALUES ('$login','$prenom','$nom','$password')";
        $query2 = mysqli_query($sql, $req2);
        header('location:connexion.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <div id="form">
        <form method="post">
            <table>
                <thead>
                    <tr>
                        <td>Login * </td>
                        <td><input type="text" name="login" placeholder="Ex: Rochas57" required></td>
                    </tr>
                    <tr>
                        <td>Nom *</td>
                        <td><input type="text" name="nom" placeholder="Ex: Rochas" required></td>
                    </tr>
                    <tr>
                        <td>Prénom *</td>
                        <td><input type="text" name="prenom" placeholder="Ex: David" required></td>
                    </tr>
                    <tr>
                        <td>Password *</td>
                        <td><input type="password" name="password" placeholder="*****" required></td>
                    </tr>
                    <tr>
                        <td>Password *</td>
                        <td><input type="password" name="passwordConfirm" placeholder="*****" required></td>
                    </tr>
                </thead>
            </table>
            <button name="Submit">Inscription</button>
        </form>
    </div>
    <footer>
        <p>Posted by: Meriem Djidel 2021</p>
        <p>Contact information: <a href="mailto:meriem.djidel@laplateforme.io">meriem.djidel@laplateforme.io</a>.</p>
    </footer>
</body>

</html>