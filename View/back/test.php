<?php
/*session_start();
error_reporting(0);
if (strlen($_SESSION['idlogin']==0)) {
    header("location:../front/logout.php");
    }
    else{
        $msg="true";

    }*/

    
    include_once '../../Controller/utilisateurC.php';
    $utilisateurC = new utilisateurC();
    $list=$utilisateurC->NomUtilisateur(5);
    foreach ($list as $ls)
    {
        echo $ls["nomPrenom"];
    }

?>

<!--
<html>
<head>
</head>
<body>
    <h1> <?php echo $msg; echo $_SESSION['idlogin']; ?></h1>
</body>
</html>

-->