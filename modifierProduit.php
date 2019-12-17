<?php
    require_once("session.php");
    require_once("connectDB.php");
    require_once("include/sql.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Modification de Produit</title>

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
           
        ?>
    </header>

    <main>
    <table>
            <tr>
                <th>nom</th>
                <th>description</th>
                <th>prix</th>
                <th>marque</th>
                <th>categorie</th>
            </tr>
            <?php
            
            $liste = afficherProduitModifier($_GET['produit_id_mod']);
            if($rangee = mysqli_fetch_assoc($liste))    
            {  
                    echo "<tr>";
                    echo "<form action=\"\" method=\"post\">";                    

                    
                    echo "<td><input type='text' size=50 name='produit_nom' value='" . $rangee["produit_nom"] . "'></td>";
                    echo "<td><input type='text' size=50 name='produit_description' value='" . $rangee["produit_description"] . "'></td>";
                    echo "<td><input type='text' size=50 name='produit_prix' value='" . $rangee["produit_prix"] . "'></td>";
                    echo "<td><input type='text' size=50 name='categorie_nom' value='" . $rangee["categorie_nom"] . "'></td>";
                    echo "<td><input type='text' size=50 name='marque_nom' value='" . $rangee["marque_nom"] . "'></td>";
                    
                    echo "<td><input type='submit' name='enregistrer_produit' value='Enregistrer'></td>";

                    echo "</form></tr>";
            }
            
            ?>
    </table>
    
    </main>


</body>




</html>
<?php
    if(isset($_POST['produit_nom'], $_POST['produit_description'], $_POST['produit_prix'], $_POST['categorie_nom'], $_POST['marque_nom'])){
        $idProduit = $_GET['produit_id_mod'];
        modifierProduit($idProduit, $_POST['produit_nom'], $_POST['produit_description'], $_POST['produit_prix'], $_POST['categorie_nom'], $_POST['marque_nom']);
    }
?>
