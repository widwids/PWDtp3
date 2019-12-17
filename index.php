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
        <?php         
        require_once("header.php");          
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
                $liste = afficherProduit();
                foreach($liste as $row){
                    
                    echo"<tr>";
                    echo "<td>".$row["produit_nom"]."</td>";
                    echo "<td>".$row["produit_description"]."</td>";
                    echo "<td>".$row["produit_prix"]."</td>";                    
                    echo "<td>".$row["marque_nom"]."</td>";
                    echo "<td>".$row["categorie_nom"]."</td>";
                    echo "<td>".$row["produit_id"]."ajout"."</td>";
                    
                    /*ici pour afficher la session admin affin de suprimer*/
                    if ($_SESSION['email'] == "admin@admin.com" && $_SESSION['mdp'] == "admin"){                        
                    echo "<td>"."<a href ='modifierProduit.php?produit_id_mod=".$row["produit_id"]."'>modifier</a>"."</td>";   
                    echo "<td>"."<a href ='?produit_id=".$row["produit_id"]."'>suprimer</a>"."</td>";   
                    }
                    echo "</tr>";
                }
            
            ?>

            <?php 
               
                if(isset($_GET["produit_id"])){
                    suprimeProduit($_GET["produit_id"]);
                    header('Location: index.php');
                    
                }
            
                    if(isset($_GET["produit_id_mod"])){
                    afficherProduitModifier($_GET["produit_id_mod"]);
                    header('Location: index.php');
                    
                }
            
                
               
                
                
            
            ?>
        </table>

    </main>


</body>




</html>
