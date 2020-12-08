<?php
    session_start();

    if (count($_POST) > 0) {
        extract($_POST);

        $db = new mysqli("localhost", "root", "", "moduleconnexion");  //chaine de connexion
    

        $request = "SELECT * FROM utilisateurs WHERE (login = ? AND password = ?);";
        $stmt = $db->prepare($request);
        $stmt->bind_param("ss", $login, $password);
        $stmt->execute();
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($results) > 0) {
            $_SESSION["user"] = $results[0];
            header('location: index.php');
            die;
        } else {
            $error = "Mot de passe incorrect !";
        }
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Connexion</title>
    </head>

    <body>
        <header>
            <h1>Module Connexion</h1>
            <a href="index.php">Retour</a>
            
        </header>
        <main id="connexion">
            <h2>Connexion</h2>
            <?php
            if (isset($error)) {
                echo "<h4 style='color: red; font-weight: bold;'>$error</h4>";
            }
            ?>
            <form method="post">
                <div class="columns">
                    <div class="column">
                        <label for="login">Login</label>
                        <input type="text" name="login" required minlength="3" maxlength="255" value="<?= $login ?? '' ?>">
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" required minlength="3" maxlength="255" value="<?= $password ?? '' ?>">
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <input type="submit" value="Se connecter">
                    </div>
                </div>
            </form>
        </main>
       <footer id="footer">
        <span class="copyright">Copyright &copy; 2020 <a href=""> By MATAZOHR</a></span>
    </footer>
    </body>
</html>

