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

    $connexion = mysqli_connect("localhost","root","","resappli");
    $requete = "SELECT Motif as title, Datedebut as start, Datefin as end, URL as url, ID as id From reservation ;";
    $result = mysqli_query($connexion,$requete);
    $myArray = array();
    if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
        }

?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-type" context="text/html :charset=UTF-8"/>
        <link href="Style/styles.css" rel="stylesheet" type="text/css">
        <title>Planning</title>
        <link rel="icon" href="image/logoEllaSIO.png" />
        <link href='fullcalendar/main.css' rel='stylesheet' />
        <script src='fullcalendar/main.js'></script>
        <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                weekends: true,
                firstDay: 1,
                navLinks: true,
                weekNumbers: true,
                initialView: 'dayGridMonth',
                titleFormat: { month: 'long', year: 'numeric' },
                initialDate: '2022-03-17',
                headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,timeGridDay,listWeek'
                },
                events:<?php echo json_encode($myArray); ?>
            });

            calendar.render();
            });

        </script>
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
                    <a href="reservation.php?connected=1">Réservation</a>
                </li>
                <li>
                    <a class="active">Planning</a>
                </li>
                <li>
                    <a href="connexion.php?deconnexion=true" style="background-image:url(image/tabler-icon-logout.png);background-position:95%;background-repeat:no-repeat;padding-right:30px;width:100px;background-size: 20px;">Déconnexion</a>
                </li>
            
    <li>
        <?php
            $prenom = $_SESSION["prenom"];
            $nom = $_SESSION["nom"];
        ?>
        <p><?php echo $prenom ?> <?php echo $nom ?></p>
    </li>
        </ul>                
    </nav>
</div>
<div id="calendar">
    
</div>
</body>
