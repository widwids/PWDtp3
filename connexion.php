<?php
    require_once("include/sql.php");
    require_once("connectDB.php");
    require_once("session.php");

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Connexion</title>

    <style>
        body {
            padding-left: 20px;
        }

        body>main>header>h2 {
            padding-left: 20px;
        }

        body>main>h2 {
            padding-left: 20px;
        }

    </style>
</head>
<body>
    <header>
        <?php require_once("header.php")?>
    </header>
    <main>
        <form action="" method="POST">
            <input type="text" name="email" placeholder="Adresse courriel">
            <input type="text" name="mdp" placeholder="Mot de passe">
            <input type="submit" value="connexion">
        </form>
        <a href="creationCompte.php"> Créer votre compte</a>
        <?php 
        
        if(isset($_POST['email'],$_POST['mdp'])){
            autentification($_POST['email'],$_POST['mdp']);
        }            
        
        ?>
    </main>
</body>
</html>
