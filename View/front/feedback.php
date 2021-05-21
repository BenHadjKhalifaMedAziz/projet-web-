<?php
// Session Required

include_once '../../Model/avis.php';
include_once '../../Controller/avisC.php';
$error="";
$date=date("Y/m/d");

$avisC = new avisC();
if (
	isset($_GET["nomUt"]) &&
	isset($_GET["emailUt"]) &&
	isset($_GET["message"]) &&
	isset($_GET["etoiles"])
){
	if (
		!empty($_GET["nomUt"]) &&
		!empty($_GET["emailUt"]) &&
		!empty($_GET["message"]) &&
		!empty($_GET["etoiles"])
	){
		$avis = new avis(
			$_GET["idUsr"],
			$_GET["idProd"],
			$_GET["nomUt"],
			$_GET["emailUt"],
			$_GET["message"],
			$_GET["etoiles"],
			"https://34yigttpdc638c2g11fbif92-wpengine.netdna-ssl.com/wp-content/uploads/2016/09/default-user-img.jpg",
			$date
		); 
		$avisC->ajouterAvis($avis);
		$error="Message envoyer!";
	}
	else
		$error = "Probleme.";
}

echo $error;
echo "<script>
window.location.href = 'home.php';
</script>"; 
?>