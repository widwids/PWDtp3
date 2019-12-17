<?php
function connectDb(){
        
        $connexion = mysqli_connect("localhost","root","","magasin_de_sport");
        
        if(!$connexion){
            
            trigger_error("erreur de connection : ".mysqli_connect_error());
        }
        
        mysqli_query($connexion, "SET NAMES 'utf8'");
		return $connexion;
    }

$connexion = connectDb();

?>