<?php
$user = $_POST['username'];
$pwd = $_POST['password'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$key = $_POST['key'];

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
 
echo "Connected successfully";
$pwd = hash('sha256',$pwd);
$requete = "SELECT cleadmin FROM entreprise WHERE nom_entreprise = 'Prixy' ";
$result = mysqli_query($conn,$requete);
$reponse = $result->fetch_assoc();
$keybdd = $reponse["cleadmin"];//définission des variables
if (hash('sha256',$key) == $keybdd){
      $sql = "INSERT INTO utilisateur (nom_utilisateur, mot_de_passe, Nom, Prenom) VALUES ('$user', '$pwd', '$lastname', '$name')";
      if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      } 
      else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      header('Location: ../connexion.php');
      }
else{
      header('location: ../inscription.php?erreur=1');
}
mysqli_close($conn);
?>