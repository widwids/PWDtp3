<?php
    require_once("include/sql.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title> exercice 4</title>

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
            <input type="text" name="email" placeholder="Adresse e-mail">
            <input type="text" name="mdp" placeholder="Mot de passe">
            <input type="submit" value="connexion">
        </form>
        <a href="creationCompte.php"> creation Compte</a>
        <?php 
        
        if(isset($_POST['email'],$_POST['mdp'])){
            autentification($_POST['email'],$_POST['mdp']);
            $_SESSION['email']= $_POST['email'];
            $_SESSION['mdp'] = $_POST['mdp'];
            echo $_SESSION['email'];
        }            
        
        ?>



    </main>


</body>




</html>
