<?php

// Initialiser la session
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion

	if($_SESSION["login"] != "admin")
	{

		header("location:index.php");
	}
	$connect = mysqli_connect("localhost","root","","moduleconnexion");  //chaine de connexion
	$request = "SELECT * FROM utilisateurs;";
	$query = mysqli_query($connect,$request);
	$result = mysqli_fetch_all($query);




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>admin</title>
</head>
<body>
    <header>
        <h1>Connectez-Vous ici </h1>
        <a href="index.php"> Retour </a>
        
         </header>
        <main id="admin">
            <h2>Admin</h2>
            <table>
                <thead>
                    <tr>
                    <?php
                        foreach ($users[0] as $key => $value) {
                            ?>
                                <th><?= $key ?></th>
                            <?php
                        }
                    ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($users as $id => $row) {
                        ?>
                        <tr>
                        <?php
                            foreach ($row as $value) {
                                ?>
                                <td><?= $value ?></td>
                                <?php
                            }
                        ?>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
        </main>
        <footer id="footer">
        <span class="copyright">Copyright &copy; 2020 <a href=""> By MATAZOHR</a></span>
    </footer>
</body>
</html>