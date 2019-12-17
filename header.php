<h1>
    <a href="index.php">Page Principal</a>
    <a href="connexion.php">Connexion</a>
    <a href="panier.php">Panier</a>
    <?php 
      if ($_SESSION['email'] == "admin@admin.com"){
        /*ici pour afficher la session admin affin d'ajouter*/
        echo '<a href="panneauAdmin.php"> Panneau Administratif</a>';
    }
    ?>
</h1>

