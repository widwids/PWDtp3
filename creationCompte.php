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
        <header>
           
        </header>

        <form action="" method="POST">
            <input type="text" name="nom" placeholder="nom">
            <input type="text" name="prenom" placeholder="prenom">
            <input type="password" name="motDePasse" placeholder="mot de passe">
            <input type="text" name="email" placeholder="addresse email">            
            <input type="submit" value="Enregistrer">           
        </form>
        
        <?php 
    if(isset($_POST['nom'],$_POST['prenom'],$_POST['motDePasse'],$_POST['email'])){
        ajoutUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'], $_POST['motDePasse']);  
    }
        ?>

    </main>


</body>




</html>
