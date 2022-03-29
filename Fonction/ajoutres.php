<?php
$motif = $_POST['moti'];
$date = $_POST['date'];
$nb_personne = $_POST['nb_personne'];
$raison_sociale = $_POST['raison_sociale'];
$adresse = $_POST['adresse'];
$tel_fix = $_POST['tel_fix'];
$tel_mob = $_POST['tel_mob'];
$mail = $_POST['mail'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$heuredebut = $_POST['heure_debut'];
$heurefin = $_POST['heure_fin'];
$formateur = $_POST['formateur'];
$x = " ";

$datedebut = $date." ".$heuredebut;
$datefin = $date." ".$heurefin;

$servername = "localhost";
$database = "resappli";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
if ($motif == "Réunioninterne"){
      $motif = "Réunion interne";
      $formateur = "";
}
elseif ($motif == "Réunionexterne"){
      $motif = "Réunion externe";
      $formateur = "";
}
echo "Connected successfully";

$sql= "SELECT ID FROM reservation ORDER BY ID DESC;";
$reponse= $conn->query($sql);
$i = $reponse->fetch_assoc();
$id = $i['ID'];
$id = $id+1;

 
$sql = "INSERT INTO reservation (ID, Date, Heuredebut, Heurefin, Datedebut, Datefin, Nbpersonne, Raisonsociale, Adresse, Telfixe, Telmobile, Mail, Nom, Prenom, Motif, Formateur, URL) VALUES ('$id', '$date','$heuredebut', '$heurefin', '$datedebut', '$datefin', '$nb_personne', '$raison_sociale', '$adresse', '$tel_fix', '$tel_mob','$mail', '$nom', '$prenom', '$motif', '$formateur', 'http://localhost/Projet%20Prixy/planningedit.php?connected=1&id=$id&motif=$motif')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location: ../planning.php?connected=1');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>