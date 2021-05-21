<?php
include "../../config.php";
require_once '../../Model/avis.php';

class avisC{
    function ajouterAvis($avis){
        $sql="INSERT INTO avisproduits (idUsr, idProd,nomUt,email, message, etoiles,imgUsr,dateAv) 
        VALUES (:idUsr,:idProd,:nomUt,:email,:message,:etoiles,:imgUsr,:dateAv)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idUsr' => $avis->getIdusr(),
                ':idProd' => $avis->getIdprod(),
                ':nomUt' => $avis->getNomUt(),
                ':email' => $avis->getEmail(),
                ':message' => $avis->getMessage(),
                ':etoiles' => $avis->getEtoiles(),
                ':imgUsr' => $avis->getImgUsr(),
                ':dateAv' => $avis->getDateAv()      
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}
?>