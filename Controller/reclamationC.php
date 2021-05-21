<?php
include "../../Config.php";
require_once '../../Model/reclamation.php';

class reclamationC{
    /* ajouter reclamation */
    function ajouterReclamation($reclamations){
        $sql="INSERT INTO reclamations (idUsr, titreRec, descRec, dateRec) 
        VALUES (:idUsr,:titreRec,:descRec,:dateRec)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idUsr' => $reclamations->getIdUsr(),
                ':titreRec' => $reclamations->getTitreRec(),
                ':descRec' => $reclamations->getDescRec(),
                ':dateRec' => $reclamations->getDateRec()
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }  
    
}

?>