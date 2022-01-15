<?php
session_start();
include('connect.php');
if (isset($_POST['login']) && isset($_POST["password"])) {
  $login = ($_POST['login']);
  $password = ($_POST['password']);

  $requete = "SELECT * FROM utilisateurs WHERE login='$login' && password='$password'";
  $query = mysqli_query($sql, $requete); // excute une requête sur la base de données par rapport à la variable "query";
  $resultat = mysqli_fetch_all($query);
  if (count($resultat) == 1) {
    $_SESSION['admin'] = TRUE;
    $_SESSION['login'] = $login;
    header('location:index.php');
  } elseif (isset($resultat['login']) != $login && isset($resultat['password']) != $password) {
    echo "<p style='color:red;'>utilisateur ou mot de passe incorrect</p>";
  }
}
?>
<!DOCTYPE html>
<html class="Capture">

<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <?php
    if (isset($_SESSION['login']) && $_SESSION['admin'] == TRUE) {
      echo "   Vous êtes connecter " . $_SESSION['login'];
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
                    <button><li><a href='index.php'>Accueil</a></li></button>
                </ul>";
    }
    ?>

  </header>
  <h1>Connexion</h1>
  <div id="form">
    <form method="post">
      <table class="tab">
        <thead>

          <tr>
            <td>Login * </td>
            <td><input type="text" name="login" placeholder="Ex: Rochas57" required></td>
          </tr>
          <tr>
            <td>Password *</td>
            <td><input type="password" name="password" placeholder="*****" required></td>
          </tr>
      </table>
      <button type="Submit">Connexion</button>
    </form>
  </div>
  <footer>
    <p>Posted by: Meriem Djidel 2021</p>
    <p>Contact information: <a href="mailto:meriem.djidel@laplateforme.io">meriem.djidel@laplateforme.io</a>.</p>
  </footer>
</body>

</html>
