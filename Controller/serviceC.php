<?php
include "../../config.php";
require_once '../../Model/service.php';

class serviceC{
    function ajouterServiceArt($service){
        $sql="INSERT INTO produitsart (idUsr,titreProd,descProd,prixProd,quantProd,img1,img2,img3) 
        VALUES (:idusr,:titre,:desc,:prix,:quant,:img1,:img2,:img3)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idusr' => $service->getIdUsr(),                
                ':titre' => $service->getTitreProd(),
                ':desc' => $service->getDescProd(),
                ':prix' => $service->getPrixProd(),
                ':quant' => $service->getQuantProd(),
                ':img1' => $service->getImg1(),
                ':img2' => $service->getImg2(),
                ':img3' => $service->getImg3()            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function ajouterServiceCult($service){
        $sql="INSERT INTO produitscult (idUsr,titreProd,descProd,prixProd,quantProd,img1,img2,img3) 
        VALUES (:idusr,:titre,:desc,:prix,:quant,:img1,:img2,:img3)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idusr' => $service->getIdUsr(),                
                ':titre' => $service->getTitreProd(),
                ':desc' => $service->getDescProd(),
                ':prix' => $service->getPrixProd(),
                ':quant' => $service->getQuantProd(),
                ':img1' => $service->getImg1(),
                ':img2' => $service->getImg2(),
                ':img3' => $service->getImg3()            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}
?>