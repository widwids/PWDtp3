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
                    echo "<form action=\"\" method=\"post\">";
                    echo "<td><input type='text' size=50 name='modifier_nom' value='" . $rangee["produit_nom"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier_description' value='" . $rangee["produit_description"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier_prix' value='" . $rangee["produit_prix"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier_marque' value='" . $rangee["marque_nom"] . "'></td>";
                    echo "<td><input type='text' size=50 name='modifier_categorie' value='" . $rangee["categorie_nom"] . "'></td>";
                    echo "<td><input type='submit' name='enregistrer_produit' value='Enregistrer'></td>";
                    echo "</form>";
                    echo "</tr>";                    
            }
            
            ?>
    </table>
    
    </main>


</body>




</html>
<?php
    if(isset($_POST['modifier_nom'], $_POST['modifier_description'], $_POST['modifier_prix'], $_POST['modifier_marque'], $_POST['modifier_categorie'])){
        $idProduit = $_GET['produit_id_mod'];
        modifierProduit($idProduit, $_POST['modifier_nom'], $_POST['modifier_description'], $_POST['modifier_prix'], $_POST['modifier_marque'], $_POST['modifier_categorie']);
    }
?>
