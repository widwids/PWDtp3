<?php
    require_once("session.php");
    require_once("connectDB.php");
    require_once("include/sql.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Panneau Administratif</title>

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
    <h1>Ajouter une marque</h1>

        <header>
        </header>

        <form action="" method="get">
            <input type="text" name="marque_nom" placeholder="marque nom">
            <input type="submit" name="enregistrerMarque" value="enregistrer">
        </form>




        <h1>Ajouter une categorie</h1>

        <form action="" method="get">
            <input type="text" name="categorie_nom" placeholder="categorie nom">
            <input type="submit" name="enregistrerCategorie" value="enregistrer">
        </form>





        <h1>Ajouter un produit</h1>

        <form action="" method="get">
            <input type="text" name="produit_nom" placeholder="produit nom">
            <input type="text" name="produit_description" placeholder="produit description">
            <input type="text" name="produit_prix" placeholder="produit prix">
            <select name="categorie" id="">

                <?php 
                $liste = listeCategorie();
                         foreach($liste as $row){
                            echo "<option value = ".$row["categorie_id"].">";
                            echo $row["categorie_nom"];                                
                            echo "</option>";
                         }                            
                    ?>
            </select>

            <select name="marque" id="">
                <?php 
                $listeMarque = listeMarque();
                         foreach($listeMarque as $row){
                            echo "<option value=".$row["marque_id"].">";
                            echo $row["marque_nom"];
                            echo "</option>";
                         }
                ?>
            </select>

            <input type="submit" name="enregistrerProduit" value="enregistrer">
        </form>

        



        <h1>Modifier un produit</h1>

        <form action="" method="get">
            <input type="text" name="produit_id_mod" placeholder="id produit">
            <input type="submit" value="Aller modifier le produit">
        </form>

        <?php
        if(isset($_GET['produit_id_mod']) && strlen($_GET['produit_id_mod']) > 0){
            $idProduit = $_GET['produit_id_mod'];
            $location = 'modifierProduit.php?produit_id_mod=' . $idProduit;
            header("location: $location");
        }
        ?>




        <h1>Supprimer un Produit</h1>

        <form action="" method="get">
            <input type="text" name="supprimerProduit" placeholder="id produit">
            <input type="submit" value="Supprimer le produit">
        </form>
        
        <?php
        if(isset($_GET['supprimerProduit']) && strlen($_GET['supprimerProduit']) > 0){
            if (isset($_GET["supprimerProduit"])){          
                supprimerProduit($_GET['supprimerProduit']);    
            };
        }
        ?>
      
      <h1>Afficher une commande</h1>










    </main>


</body>

</html>


<?php   
    if (isset($_GET["enregistrerMarque"])){          
        ajoutMarque($_GET['marque_nom']);    
    };
        
      if (isset($_GET["enregistrerCategorie"])){  
        ajoutCategorie($_GET['categorie_nom']);    
    };

    if (isset($_GET["enregistrerProduit"])){    
    ajoutProduit($_GET['produit_nom'],$_GET['produit_description'],$_GET['produit_prix'],$_GET['categorie'],$_GET['marque']);
    }    
        
        
?>
