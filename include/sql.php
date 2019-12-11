<?php 
session_start();

    function connectDb(){
        
        $connexion = mysqli_connect("localhost","root","","magasin_de_sport");
        
        if(!$connexion){
            
            trigger_error("erreur de connection : ".mysqli_connect_error());
        }
        
        mysqli_query($connexion, "SET NAMES 'utf8'");
		return $connexion;
    }

$connexion = connectDb();

function autentification($email,$motDePasse){
    global $connexion;
    $requete = "SELECT courriel,client_mot_de_passe from client WHERE courriel = ? AND client_mot_de_passe = ?";
    $stmt = mysqli_prepare($connexion, $requete);
    $hash = hash("md5", $motDePasse);    
    mysqli_stmt_bind_param($stmt, "ss", $email, $hash);    
    if (mysqli_stmt_execute($stmt)) {
            $resultat = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($resultat) == 1) {
                    header("location: index.php");
            }
}

    }
    
    
/*         $resultat = mysqli_query($connexion,$requete);
        $row = mysqli_num_rows($resultat);
        $row = mysqli_fetch_assoc($resultat);
        $_SESSION['email'] = $row["courriel"];
        $_SESSION['mdp'] = $row['client_mot_de_passe'];
    header("location: index.php"); 
    
    */
        


function afficherProduit(){
    
    global $connexion;
    
    
    $requete = "SELECT produit_id,produit_nom,produit_description,produit_prix,categorie_nom,marque_nom from produit
                join categorie
                on produit.categorie_categorie_id = categorie_id
                join marque
                on produit.marque_marque_id = marque_id";    
    $resultat = mysqli_query($connexion,$requete);
    return $resultat;
        

}



function ajoutCategorie($categorie_nom){
    global $connexion;
    
    $requete = "INSERT INTO categorie (categorie_nom) VALUES('$categorie_nom')";    
    $resultat = mysqli_query($connexion,$requete); 
    
}


function ajoutMarque($marque_nom){
    global $connexion;
    
    $requete = "INSERT INTO marque (marque_nom) VALUE ('$marque_nom')";
    $resultat = mysqli_query($connexion,$requete);
    
}



function ajoutProduit($produit_nom,$produit_description,$produit_prix,$produit_categorie,$produit_marque){
    global $connexion;
    
    $requete = "INSERT INTO produit (produit_nom,produit_description,produit_prix,categorie_categorie_id,marque_marque_id) VALUES ('$produit_nom','$produit_description','$produit_prix','$produit_categorie','$produit_marque')";
    $resultat = mysqli_query($connexion,$requete);
    
}

function suprimeProduit($produit_id){
    global $connexion;
    
    $requete = "DELETE FROM produit WHERE produit_id =".$produit_id."";
    $resultat = mysqli_query($connexion,$requete);
    
}

function listeCategorie(){
    global $connexion;
    $requete = "SELECT * FROM categorie";
    $resultat = mysqli_query($connexion,$requete);
    
    return $resultat;
    
}

function listeMarque(){
    global $connexion;
    $requete = "SELECT * FROM marque";
    $resultat = mysqli_query($connexion,$requete);
    
    return $resultat;
    
}


function ajoutUtilisateur($nom,$prenom,$email,$motDePasse){
    global $connexion;
    $hash = hash("md5", $motDePasse);    
    $requete = "INSERT INTO client (client_nom,client_prenom,client_mot_de_passe,courriel)
                VALUES(?,?,?,?)";
  $stmt = mysqli_prepare($connexion, $requete);
    mysqli_stmt_bind_param($stmt, "ssss", $nom,$prenom,$hash,$email);
    
    if (mysqli_stmt_execute($stmt)) {
        $resultat = mysqli_stmt_get_result($stmt);
    }
    
}
function afficherClient(){
    global $connexion;
    
    $requete = "SELECT * FROM client";
    $resultat = mysqli_query($connexion,$requete);
    return $resultat;
}

?>
