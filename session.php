<?php
  
session_start();

if (!isset($_SESSION['email'])) {
	echo "tamere";
    header('Location: connexion.php'); 
}

?>