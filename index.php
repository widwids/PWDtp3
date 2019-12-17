<?php
    require_once("session.php");
    require_once("connectDB.php");
    require_once("include/sql.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>TP3</title>

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


    <h1>Catalogue complet</h1>

        <table>
            <tr>
                <th>Ajouter au panier</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Marque</th>
                <th>Categorie</th>
                <th>Numero de serie</th>


            </tr>
            <?php 
                $liste = afficherProduit();

                foreach($liste as $row["categorie_nom"]){
                    foreach($liste as $row){
                    
                        echo"<tr>";

                        echo "<td><input type='checkbox' name='commanderProduit' </td>";

                        echo "<td>".$row["produit_nom"]."</td>";
                        echo "<td>".$row["produit_description"]."</td>";
                        echo "<td>".$row["produit_prix"]."</td>";                    
                        echo "<td>".$row["marque_nom"]."</td>";
                        echo "<td>".$row["categorie_nom"]."</td>";
                        echo "<td>".$row["produit_id"]."</td>";
    
                } 
                
                    
                    
                    /*ici pour afficher la session admin affin de suprimer*/

                    /* if ($_SESSION['email'] == "admin@admin.com" && $_SESSION['mdp'] == "admin"){                        
                    echo "<td>"."<a href ='modifierProduit.php?produit_id_mod=".$row["produit_id"]."'>modifier</a>"."</td>";   
                    echo "<td>"."<a href ='?produit_id=".$row["produit_id"]."'>suprimer</a>"."</td>";   
                    }
                    echo "</tr>"; */
                }
            
            ?>

            <?php 
               
               /*  if(isset($_GET["produit_id"])){
                    suprimeProduit($_GET["produit_id"]);
                    header('Location: index.php');
                    
                }
            
                    if(isset($_GET["produit_id_mod"])){
                    afficherProduitModifier($_GET["produit_id_mod"]);
                    header('Location: index.php');
                    
                } */
                   
                
            
            ?>
        </table>
        <form action="" method="get">
            <input type="submit" name="commander" value="Enregistrer la commande">
        </form>
    </main>


</body>




</html>
<?php



?>