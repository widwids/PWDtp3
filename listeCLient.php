<?php
    require_once("include/sql.php");
    $liste = afficherClient();
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
        <table>
        <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>mot de passe</th>
        <th>email</th>
        </tr>
            <?php 
                foreach($liste as $row){
                    
                    echo"<tr>";
                    echo "<td>".$row["client_nom"]."</td>";
                    echo "<td>".$row["client_prenom"]."</td>";
                    echo "<td>".$row["client_mot_de_passe"]."</td>";
                    echo "<td>".$row["courriel"]."</td>";   
                    echo "</tr>";
                }
            
            ?>

        </table>

    </main>


</body>

<!--<script>
  alert("Hello! I am an alert box!");
</script>-->


</html>
