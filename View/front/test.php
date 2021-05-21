<?php 

include('../../database.php');
$ret3=mysqli_query($con,"select * from avisproduits where idProd=4");
$count=0;
$count=mysqli_num_rows($ret3);
echo $count;
$ret4=mysqli_query($con,"select * from avisproduits where idProd=");
?>