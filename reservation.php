<?php
session_set_cookie_params(0);
session_start();
ini_set('display_errors', 'off');
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
        <link href="Style/style.css" rel="stylesheet" type="text/css">
        <title>Réservation</title>
        <link rel="icon" href="image/logoEllaSIO.png" />
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
                    <a class="active">Réservation</a>
                </li>
                <li>
                    <a href="planning.php?connected=1">Planning</a>
                </li>
                <li>
                    <a href="connexion.php?deconnexion=true" style="background-image:url(image/tabler-icon-logout.png);background-position:95%;background-repeat:no-repeat;padding-right:30px;width:100px;background-size: 20px;">Déconnexion</a>
                </li>
            
    
    <li>
        <?php
            $prenom = $_SESSION["prenom"];
            $nom = $_SESSION["nom"]
        ?>
        <p><?php echo $prenom ?> <?php echo $nom ?></p>
    </li>
        </ul>                
    </nav>
</div>
<div id="res">
    <?php if (isset($_GET['motif'])){
        $motif = $_GET['motif'];
            if ($motif == 'Formation'){
                echo "
                <form id='ajoutres' action='Fonction/ajoutres.php' method='POST'>
                <input type='hidden' name='moti' value=",$motif,">
                <p>Date :<br><input type='date' name='date' style='background-image:url(image/tabler-icon-calendar.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Heure de début :<br><input type='time' name='heure_debut' style='background-image:url(image/tabler-icon-clock.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Heure de fin :<br><input type='time' name='heure_fin' style='background-image:url(image/tabler-icon-clock.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Nombre de personne:<br><input type='number' name='nb_personne' min='1' max='30' value='1' style='background-image:url(image/tabler-icon-users.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Formateur :</p><select name='formateur' id='formateur'>
                    <option value=''>--Choisir un formateur--</option>
                    <option value='aucun'>Aucun</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                </select>
                <p>Nom de l'entreprise :<br><input type='text' name='raison_sociale' style='background-image:url(image/tabler-icon-building.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Adresse :<br><input type='text' name='adresse' style='background-image:url(image/tabler-icon-mailbox.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Téléphone Fixe :<br><input type='tel' name='tel_fix' minlength='10' maxlength='10' style='background-image:url(image/tabler-icon-phone.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;'  required></p>
                <p>Téléphone Mobile :<br><input type='tel' name='tel_mob' minlength='10' maxlength='10' style='background-image:url(image/tabler-icon-device-mobile.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' ></p>
                <p>E-mail :<br><input type='email' name='mail' style='background-image:url(image/tabler-icon-at.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;'  required></p>
                <p>Nom :<br><input type='text' name='nom' style='background-image:url(image/tabler-icon-id.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Prénom :<br><input type='text' name='prenom' style='background-image:url(image/tabler-icon-id.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p><input type='submit' name='ajoutres' value='Ajouter' id='submit' style='background-image:url(image/tabler-icon-circle-plus.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' ></p>
                </form>
                <a href='reservation.php?connected=1' style='background-image:url(image/tabler-icon-arrow-back-up.png);background-position:95%;background-repeat:no-repeat;padding-right:35px;width:400px;background-size: 30px;'>Retour</a>"
                ;}
            else if ($motif == 'Réunion externe' or 'Réunion interne'){
                echo "
                <form id='ajoutres' action='Fonction/ajoutres.php' method='POST'>
                <input type='hidden' name='moti' value=",$motif,">
                <input type='hidden' name='formateur' value='Aucun'>
                <p>Date :<br><input type='date' name='date' style='background-image:url(image/tabler-icon-calendar.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Heure de début :<br><input type='time' name='heure_debut' style='background-image:url(image/tabler-icon-clock.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Heure de fin :<br><input type='time' name='heure_fin' style='background-image:url(image/tabler-icon-clock.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Nombre de personne:<br><input type='number' name='nb_personne' min='1' max='30' value='1' style='background-image:url(image/tabler-icon-users.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Nom de l'entreprise :<br><input type='text' name='raison_sociale' style='background-image:url(image/tabler-icon-building.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Adresse :<br><input type='text' name='adresse' style='background-image:url(image/tabler-icon-mailbox.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Téléphone Fixe :<br><input type='tel' name='tel_fix' minlength='10' maxlength='10' style='background-image:url(image/tabler-icon-phone.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;'  required></p>
                <p>Téléphone Mobile :<br><input type='tel' name='tel_mob' minlength='10' maxlength='10' style='background-image:url(image/tabler-icon-device-mobile.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' ></p>
                <p>E-mail :<br><input type='email' name='mail' style='background-image:url(image/tabler-icon-at.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;'  required></p>
                <p>Nom :<br><input type='text' name='nom' style='background-image:url(image/tabler-icon-id.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p>Prénom :<br><input type='text' name='prenom' style='background-image:url(image/tabler-icon-id.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' required></p>
                <p><input type='submit' name='ajoutres' value='Ajouter' id='submit' style='background-image:url(image/tabler-icon-circle-plus.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' ></p>
                </form>
                <a href='reservation.php?connected=1' style='background-image:url(image/tabler-icon-arrow-back-up.png);background-position:95%;background-repeat:no-repeat;padding-right:35px;width:400px;background-size: 30px;'>Retour</a>"
            ;}
    }
        
        else {
        echo "<form id='ajoutres' action='Fonction/red.php' method='GET'>

        <p>Motif :<br><div id='motif'>
                            <input type='radio' id='FOR' name='moti' onclick='motifclick1' value='Formation' checked>
                            <label for='Formation'>Formation</label>
                        </div>

                        <div id='motif'>
                            <input type='radio' id='RI' name='moti' onclick='motifclick2' value='Réunioninterne'>
                            <label for='Reuint'>Réunion interne</label>
                        </div>

                        <div id='motif'>
                            <input type='radio' id='RE' name='moti' onclick='motifclick3' value='Réunionexterne'>
                            <label for='Reuex'>Réunion externe</label>
                        </div>

        </p>
        <p><input type='submit' name='ajoutres' value='Ajouter' id='submit' style='background-image:url(image/tabler-icon-circle-plus.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;' ></p>
        </form>"; 
        }
        
    
    
    ?>
</div>
</body>