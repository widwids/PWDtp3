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
    
            <!-- <tr>
                <th>nom</th>
                <th>description</th>
                <th>prix</th>
                <th>marque</th>
                <th>categorie</th>
            </tr> -->
            <?php
            
            $liste = getProductWithId($_GET['produit_id_mod']);
            if($rangee = mysqli_fetch_assoc($liste))    
            {  
                    //echo "<tr>";
                    echo "<form action=\"\" method=\"post\">";

                    echo "<label> Nom</label>";                 
                    echo "<input type='text' size=30 name='produit_nom' value='" . $rangee["produit_nom"] . "'></<input>";
                    
                    echo "<label> Description</label>";                  
                    echo "<input type='text' size=30 name='produit_description' value='" . $rangee["produit_description"] . "'></<input>";
                    
                    echo "<label> Prix</label>";
                    echo "<input type='text' size=30 name='produit_prix' value='" . $rangee["produit_prix"] . "'></<input>";

                    echo "<label> Categorie</label>";
                    echo "<select name='categorie_nom' id=''>";
                    $liste = listeCategorie();
                    foreach($liste as $row) {
                        echo "<option value =".$row["categorie_id"].">";
                        echo $row["categorie_nom"];
                        echo "</option>";
                    }
                    echo "</select>";

                    echo "<label> Marque</label>";
                    $listeMarque = listeMarque();
                    echo "<select name='marque_nom' id=''>";
                    foreach($listeMarque as $row){
                        echo "<option value=".$row["marque_id"].">";
                        echo $row["marque_nom"];
                        echo "</option>";
                    }
                    echo "</select>";
                    
                    echo "<input type='submit' name='enregistrer_produit' value='Modifier'></<input>";  
                    echo "</form><br>";
            }
            
            ?>
    
    
    </main>


</body>




</html>
<?php
    if(isset($_POST['produit_nom'], $_POST['produit_description'], $_POST['produit_prix'], $_POST['categorie_nom'], $_POST['marque_nom'])){
        $idProduit = $_GET['produit_id_mod'];
        modifierProduit($idProduit, $_POST['produit_nom'], $_POST['produit_description'], $_POST['produit_prix'], $_POST['categorie_nom'], $_POST['marque_nom']);
    }
?>
