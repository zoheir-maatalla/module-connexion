<?php
    session_start();

    if (isset($_SESSION["user"])) {
        extract($_SESSION["user"]);
    }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>index</title>
</head>
<body>
    <header class="header">

	   <h1> Connectez-Vous ici  </h1>
    </header>
    <main>
         <?= isset($prenom) ? ($prenom . ' ') : ' ' ?>      
        <div class="buttons">
            <?php
                if (!isset($_SESSION["user"])) {
                    echo '<a href="inscription.php"> <h2>Inscription</2> </a>';
                    echo '<a href="connexion.php"> <h2>Connexion </h2></a>';
                } else {
                    echo '<a href="profil.php">Profil</a>';
                    echo '<a href="deconnection.php">Déconnexion</a>';
                    if ($_SESSION["user"]["login"] == "admin") {
                        echo '<a href="admin.php">Admin</a>';
                    }
                }
            ?>
        </div>
    </main>
    <footer id="footer">
        <span class="copyright">Copyright &copy; 2020 <a href=""> By MATAZOHR</a></span>
    </footer>
</body>
</html>