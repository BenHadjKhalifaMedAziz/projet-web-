<?php
    include_once '../../Model/utilisateur.php';
    include_once '../../Controller/utilisateurC.php';

    $utilisateur = null;
    $utilisateurC = new utilisateurC();
    $error = "";

    if (
        isset($_POST["nomUt"]) && 
        isset($_POST["pass"]) &&
        isset($_POST["email"]) && 
        isset($_POST["nomPrenom"]) &&
        isset($_POST["pays"]) && 
        isset($_POST["adresse"]) &&
        isset($_POST["tel"]) && 
        isset($_POST["sexe"])
    ) {
        if (
            !empty($_POST["nomUt"]) && 
            !empty($_POST["pass"]) &&
            !empty($_POST["email"]) && 
            !empty($_POST["nomPrenom"]) &&
            !empty($_POST["pays"]) && 
            !empty($_POST["adresse"]) &&
            !empty($_POST["tel"]) && 
            !empty($_POST["sexe"])
        ) {
            $utilisateur = new utilisateur(
                $_POST["nomUt"],
                $_POST["pass"], 
                $_POST["email"],
                $_POST["nomPrenom"],
                $_POST["pays"],
                $_POST["adresse"],
                $_POST["tel"],
                $_POST["sexe"]
            );
            $utilisateurC->ajouterUtilisateur($utilisateur);
           header('Location:../front/index.php');
            $error="ajout avec succes!";
        }
        else
            $error = "Missing information";
    }

?>