
<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'resappli';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
       $password = hash('sha256',$password);
        $requete = "SELECT count(*) FROM utilisateur where 
              nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
        $_SESSION['username'] = $username;
        $username=$_SESSION["username"]; 
        $connexion = mysqli_connect("localhost","root","","resappli");
        $requete = "SELECT Nom FROM utilisateur WHERE nom_utilisateur = '$username' ";
        $result = mysqli_query($connexion,$requete);
        $reponse = $result->fetch_assoc();
        $nom = $reponse["Nom"];//définission des variables

        $requete = "SELECT Prenom FROM utilisateur WHERE nom_utilisateur = '$username' ";
        $result = mysqli_query($connexion,$requete);
        $reponse = $result->fetch_assoc();
        $prenom = $reponse["Prenom"];//définission des variables
        mysqli_close($connexion);
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
           
           header('Location: ../planning.php?connected=1');
        }
        else
        {
           header('Location: ../connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../connexion.php');
}
mysqli_close($db); // fermer la connexion
?>
<form id="formconnexion" action="../accueil.php" method="POST">
   <input type="text" value="<?php echo $username ?>" name="username" hidden>
</form>