<?php
    include_once '../../Model/abonnements.php';
    include_once '../../Controller/abonnementsC.php';

    $abon = null;
    $abonneC = new abonneC();
    $error = "";

    if (
        isset($_GET["email"])
    ) {
        if (
            !empty($_GET["email"])
        ) {
            $abonne = new abonne(
                $_GET["email"]
            );
            $abonneC->ajouterAbonnements($abonne);
           header('Location:../front/home.php');
            $error="ajout avec succes!";
            echo "ajout avec succes!";
        }
        else
            $error = "Missing information";
            echo "Missing information";
    }

?>