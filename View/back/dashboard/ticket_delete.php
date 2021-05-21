<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
  header('location:logout.php');
} else {
  $id = $_GET['id'];
  $sql = mysqli_query($con, "DELETE FROM produitscult WHERE idProd=$id");
  if ($sql) {
    header("location:ticket_list.php");
  }
}
