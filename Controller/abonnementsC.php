<?php
include "../../config.php";
require_once '../../Model/abonnements.php';

class abonneC{
    function ajouterAbonnements($abonne){
        $sql="INSERT INTO abonnements (email) 
        VALUES (:email)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':email' => $abonne->getEmail()            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}
?>