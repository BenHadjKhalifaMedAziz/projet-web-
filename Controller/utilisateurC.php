<?php

include "../../config.php";
require_once '../../Model/utilisateur.php';

class utilisateurC {

    /* Ajouter un utilisateur */
    function ajouterUtilisateur($utilisateur){
        $sql="INSERT INTO utilisateurs (nomUt, pass, email, nomPrenom, pays, adresse, tel, sexe, verifier) 
        VALUES (:nomUt,:pass,:email,:nomPrenom,:pays,:adresse,:tel,:sexe,:verifier)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                ':nomUt' => $utilisateur->getNomUt(),
                ':pass' => $utilisateur->getPass(),
                ':email' => $utilisateur->getEmail(),
                ':nomPrenom' => $utilisateur->getNomPrenom(),
                ':pays' => $utilisateur->getPays(),
                ':adresse' => $utilisateur->getAdresse(),
                ':tel' => $utilisateur->getTel(),
                ':sexe' => $utilisateur->getSexe(),
                ':verifier' => $utilisateur->getVerifier()                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    /* afficher un utilisateur */
    function afficherUtilisateurs(){
			
        $sql="SELECT * FROM utilisateurs";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function NomUtilisateur($sessionId){
        $sql="SELECT nomPrenom FROM utilisateurs where id=$sessionId";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    
}

?>