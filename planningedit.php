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

    if(isset($_GET['id'])){
        $id = $_GET['id'];   
    
    $connexion = mysqli_connect("localhost","root","","resappli");
    $requete = "SELECT Date FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $date = $reponse["Date"];
    
    $requete = "SELECT Heuredebut FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $heuredebut = $reponse["Heuredebut"];
    
    $requete = "SELECT Heurefin FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $heurefin = $reponse["Heurefin"];
    
    $requete = "SELECT Formateur FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $formateur = $reponse["Formateur"];

    $requete = "SELECT Nbpersonne FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $nbpersonne = $reponse["Nbpersonne"];

    $requete = "SELECT Raisonsociale FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $raisonsociale = $reponse["Raisonsociale"];

    $requete = "SELECT Adresse FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $adresse = $reponse["Adresse"];

    $requete = "SELECT Telfixe FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $telfixe = $reponse["Telfixe"];

    $requete = "SELECT Telmobile FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $telmobile = $reponse["Telmobile"];

    $requete = "SELECT Mail FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $mail = $reponse["Mail"];

    $requete = "SELECT Nom FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $nomcli = $reponse["Nom"];

    $requete = "SELECT Prenom FROM reservation WHERE ID = '$id' ";
    $result = mysqli_query($connexion,$requete);
    $reponse = $result->fetch_assoc();
    $prenomcli = $reponse["Prenom"];

    $motif = $_GET['motif'];
    }
    if ($motif = "Formation"){
        $FOR = "selected";
        $RE ="";
        $RI ="";
    }
    elseif($motif = "Réunion interne"){
        $FOR ="";
        $RE ="";
        $RI ="selected";
    }
    else{
        $FOR ="";
        $RE ="selected";
        $RI ="";
    }
?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-type" context="text/html :charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Style/styles.css" rel="stylesheet" type="text/css">
        <title>Modification</title>
        <link rel="icon" href="image/logoEllaSIO.png" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>
    <body>
    <div id="navbar">
        <nav>
            <ul>
                
                    <?php 
                     ini_set('display_errors', 'off');
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
        $nom = $_SESSION["nom"];
        ?>
        <p id="nomprenom"><?php echo $prenom ?> <?php echo $nom ?></p>
    </li>
        </ul>                
    </nav>
</div>



<div id="edit">
    <br>
    <form action='Fonction/modres.php' method='POST'>
            <input type="hidden" name="moti" value="<?php echo $motif ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <p>Détails de la réservation n° <?php echo $id ?></p>
            
            <p>Date :<br><input type="date" name="date" value="<?php echo $date ?>" style="background-image:url(image/tabler-icon-calendar.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p>Heure début :<br><input type="time" name="heure_debut" value="<?php echo $heuredebut ?>" style="background-image:url(image/tabler-icon-clock.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p>Heure fin :<br><input type="time" name="heure_fin" value="<?php echo $heurefin ?>" style="background-image:url(image/tabler-icon-clock.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <?php
                if ($formateur == "Aucun" and $motif == "Formation"){
                    echo"
                    <p>Formateur :</p><select name='formateur' id='formateur'>
                    <option value='aucun' selected>Aucun</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                </select>
                ";}

                elseif ($formateur == "1" and $motif == "Formation"){
                    echo"
                    <p>Formateur :</p><select name='formateur' id='formateur'>
                    <option value='aucun'>Aucun</option>
                    <option value='1' selected>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                </select>
                ";}

                elseif ($formateur == "2" and $motif == "Formation"){
                    echo"
                    <p>Formateur :</p><select name='formateur' id='formateur'>
                    <option value='aucun'>Aucun</option>
                    <option value='1'>1</option>
                    <option value='2' selected>2</option>
                    <option value='3'>3</option>
                </select>
                ";}

                elseif ($formateur == "3" and $motif == "Formation"){
                    echo"
                    <p>Formateur :</p><select name='formateur' id='formateur'>
                    <option value='aucun'>Aucun</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3' selected>3</option>
                </select>
                ";}
            ?>
            <p>Nombre de personne:<br><input type="number" name="nb_personne" min="1" max="30" value="<?php echo $nbpersonne ?>" style="background-image:url(image/tabler-icon-users.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p>Nom de l'entreprise :<br><input type="text" name="raison_sociale" value="<?php echo $raisonsociale ?>" style="background-image:url(image/tabler-icon-building.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p>Adresse :<br><input type="text" name="adresse" value="<?php echo $adresse ?>" style="background-image:url(image/tabler-icon-mailbox.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p>Téléphone Fixe :<br><input type="tel" name="tel_fix" minlength="10" maxlength="10" value="<?php echo $telfixe ?>" style="background-image:url(image/tabler-icon-phone.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;"  required></p>
            <p>Téléphone Mobile :<br><input type="tel" name="tel_mob" minlength="10" maxlength="10" value="<?php echo $telmobile ?>" style="background-image:url(image/tabler-icon-device-mobile.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" ></p>
            <p>E-mail :<br><input type="email" name="mail" value="<?php echo $mail ?>" style="background-image:url(image/tabler-icon-at.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;"  required></p>
            <p>Nom :<br><input type="text" name="nom" value="<?php echo $nomcli ?>" style="background-image:url(image/tabler-icon-id.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p>Prénom :<br><input type="text" name="prenom" value="<?php echo $prenomcli ?>" style="background-image:url(image/tabler-icon-id.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" required></p>
            <p><input type="submit" name="ajoutres" value="Modifier" id="submit" style="background-image:url(image/tabler-icon-circle-plus.png);background-position:5%;background-repeat:no-repeat;padding-left:50px;width:400px;background-size: 22px;" ></p>
    </form> 
    <a href="Fonction/delevent.php?id=<?php echo $id?>" style="background-image:url(image/tabler-icon-trash.png);background-position:5%;background-repeat:no-repeat;padding-left:35px;width:400px;background-size: 22px;">Supprimer</a>
    |
    <a href="planning.php?connected=1" style="background-image:url(image/tabler-icon-arrow-back-up.png);background-position:95%;background-repeat:no-repeat;padding-right:35px;width:400px;background-size: 30px;">Retour</a>
</div>
</body>
<?php session_reset() ?>