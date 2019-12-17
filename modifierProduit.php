<?php
    require_once("session.php");
    require_once("connectDB.php");
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
        <?php require_once("header.php");
            if ($_SESSION['email'] == "admin@admin.com" &&$_SESSION['mdp'] == "admin"){
                /*ici pour afficher la session admin affin d'ajouter*/
            echo '<a href="ajoutProduit.php"> Ajout Produit</a>';
            }
        ?>
    </header>

    <main>
        <table>
            <tr>
                <th>nom</th>
                <th>description</th>
                <th>prix</th>
                <th>categorie</th>
                <th>marque</th>
            </tr>
            <?php 
            
            $liste = afficherProduitModifier($_GET['produit_id_mod']);
            if($rangee = mysqli_fetch_assoc($liste))
				
				{  
                    
                    echo "<tr>";
                    echo "<td><input type='text' size=50 name='modifier' value='" . $rangee["produit_nom"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier' value='" . $rangee["produit_description"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier' value='" . $rangee["produit_prix"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier' value='" . $rangee["marque_nom"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier' value='" . $rangee["categorie_nom"] . "'></td>";
                
                    echo "</tr>";					
					}
            
            ?>
        </table>

    </main>


</body>




</html>
