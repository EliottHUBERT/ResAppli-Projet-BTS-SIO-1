<?php 
if (isset($_GET['moti'])){
    $motif = $_GET['moti'];
    header("location: ../reservation.php?connected=1&motif=$motif");
}
?>