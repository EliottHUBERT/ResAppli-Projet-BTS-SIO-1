<?php
session_set_cookie_params(0);
session_start();
?>
<?php
    if(isset($_GET['connected'])){
    }
    else{
        header('Location: connexion.php');
    }
    if ($_SESSION['nom'] ==""){
        header('Location: connexion.php'); 
    }

?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-type" context="text/html :charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Style/styles.css" rel="stylesheet" type="text/css">
        <title>Accueil</title>
        <link rel="icon" href="image/logoPrixy.png" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>
    <body>
    <div id="navbar">
        <nav>
            <ul>
                
                    <?php 
                        ///connexion à mysql et selection de la base de données//
                        $connexion = mysqli_connect("localhost","root","","resappli");
                        if ($connexion) { 
                            echo '<li><p><ion-icon name="analytics-outline"></ion-icon>Connexion au serveur réussie</p></li>';
                            $BDD = mysqli_select_db($connexion,'formulaires');
                            if ($BDD) 
                                echo '<li><p><ion-icon name="server"></ion-icon>Base de données sélectionnée</p></li>';
                            else 
                                echo '<li><p>Echec de la sélection de la base</p></li>'; 
                                } 
                        else 
                            echo '<li><p><div id="srv">Erreur lors de la connexion</div></p></li>';

                        $requete = "SELECT nom_utilisateur FROM utilisateur; ";
                        $result = mysqli_query($connexion,$requete);
                        if ($result == FALSE)
                            echo '<li><p>Echec de l\'exécution de la requête</p></li>';
                        else
                            echo '<li><p><ion-icon name="checkmark-circle"></ion-icon>Exécution réussie</p></li>';
                    ?>
                <li>
                    <p>|</p>
                </li>
                
                <li>
                    <a class="active" id="one">Accueil</a>
                </li>
                <li>
                    <a href="reservation.php?connected=1" id="two">Réservation</a>
                </li>
                <li>
                    <a href="planning.php?connected=1" id="three">Planning</a>
                </li>
                <li>
                    <a href="connexion.php?deconnexion=true" id="four" style="background-image:url(image/tabler-icon-logout.png);background-position:95%;background-repeat:no-repeat;padding-right:30px;width:100px;background-size: 20px;">Déconnexion </a>
                </li>
                                
            
    
    <li>
        <?php
        $prenom = $_SESSION["prenom"];
        $nom = $_SESSION["nom"]
        ?>
        <p id="nomprenom"><?php echo $prenom ?> <?php echo $nom ?></p>
    </li>
        </ul>                
    </nav>
</div>

<div id="contaccueil">
    <div id="resproch">
            <p>Prochaine réservation :</p>
    </div>
    <div id="derajout">
        <p>Dernière modification :</p>
        <a href="https://www.youtube.com/watch?v=r9ay2FMfbJw&ab_channel=NouvelleTechno"> tuto fullcalendar</a>
        faire des mots de passe secu
    </div>
    <div id="notemj">
        <p>Notes de mise à jour :</p>
        <ul>
            <li>V0.8 | Ajout de la fonctionalité de renvois automatique à la page de connexion si le moteur de recherche est fermé.</li>
            <li>V0.7 | Création d'une clé d'administration unique à chaque entreprise pour l'inscription de nouveau utilisateur</li>
            <li>V0.6 | Sécurisation des mots de passe dans la base de données grâce à MD5</li>
            <li>V0.5 | Création de la page planning.</li>
            <li>V0.6 | Création de la page accueil.</li>
            <li>V0.3 | Création de la page réservation.</li>
            <li>V0.2 | Création du bandeau de navigation.</li>
            <li>V0.1 | Création de la page de connexion et d'inscription.</li>
            <li>V0.0 | Création du projet.</li>
        </ul>
    </div>
</div>
</body>
<?php session_reset() ?>