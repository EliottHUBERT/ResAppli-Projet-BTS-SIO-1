<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-type" context="text/html :charset=UTF-8"/>
        <link href="Style/styles.css" rel="stylesheet" type="text/css">
        <title>Connexion</title>
        <link rel="icon" href="image/logoEllaSIO.png" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>
    <body style="overflow-y: hidden;">
    <?php 
    session_start();
    session_destroy();
    ini_set('display_errors', 'off');
        ///connexion à mysql et selection de la base de données//
        $connexion = mysqli_connect("localhost","root","","resappli");
        if ($connexion) { 
            echo '<ion-icon name="analytics-outline"></ion-icon>Connexion au serveur réussie';
            $BDD = mysqli_select_db($connexion,'formulaires');
            if ($BDD) 
                echo '<div id="bdd"><ion-icon name="server"></ion-icon>Base de données sélectionnée</div>';
            else 
                echo '<div id="bdd">Echec de la sélection de la base</div>'; 
                } 
        else 
            echo '<div id="srv">Erreur lors de la connexion</div>';

            $requete = "SELECT nom_utilisateur FROM utilisateur; ";
        $result = mysqli_query($connexion,$requete);
        if ($result == FALSE)
            echo 'Echec de l\'exécution de la requête';
        else
            echo '<ion-icon name="checkmark-circle"></ion-icon>Exécution réussie'; 
    ?>
    <div id="container">
                <img src="image/logoEllaSIO.png" alt="Logo de EllaSIO" id="logo">
            
            <form id="formconnexion" action="Fonction/verification.php" method="POST">
                <h1>Connexion à ResAppli :</h1>
                
                <label><b>Nom d'utilisateur :</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="connexion" autocomplete="off" style="background-image:url(image/tabler-icon-user.png);background-position:95%;background-repeat:no-repeat;padding-right:100px;width:400px;background-size: 30px;" required>

                    <label><b>Mot de passe :</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" id="connexion" autocomplete="off" style="background-image:url(image/tabler-icon-lock.png);background-position:95%;background-repeat:no-repeat;padding-right:100px;width:400px;background-size: 30px;" required>

                <input type="submit" id='connexion' value='Connexion' style=" background-image:url(image/tabler-icon-login.png);background-position:95%;background-repeat:no-repeat;padding-right:100px;width:400px;background-size: 30px;" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:#17375e'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                <a href="inscription.php" style="background-image:url(image/tabler-icon-user-plus.png);background-position:95%;background-repeat:no-repeat;padding-right:35px;width:400px;background-size: 22px;">S'inscrire</a>
            </form>
        </div>
    </body>