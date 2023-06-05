        <?php

        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "calmette_resaweb";


        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Définir l'encodage des caractères en UTF-8
        mysqli_set_charset($conn, "utf8");

        // Récupération des noms de mondes à partir de la base de données
        $sql_mondes = "SELECT nom_monde FROM mondes";
        $result_mondes = mysqli_query($conn, $sql_mondes);
        ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Réservations</title>
            <link rel="stylesheet" href="reservations.css"> 
        </head>

        <nav id='menu'>
            <input type='checkbox' id='responsive-menu'>
            <ul>
            <li class="accueil"><a href="index.php"><img class="logo_nav" src="img/Logo-nav.png" alt="Retour à l'accueil"></a></li>
                <li><a href='reservations.php?monde=Tous&submit=Rechercher'>Réservations</a></li>
                <li><a href='infos.html'>A propos</a></li>
            </ul>
            </nav>

        <body>
            <div class="filtres">
            <?php
                // Affichage de la liste déroulante avec les noms de mondes
                echo '<form method="GET">';
                echo '<label class=nom_filtre for="monde">Monde : <br></label>';
                echo '<select name="monde" id="monde">';
                echo '<option value="Tous">Tous</option>';
                while ($row = mysqli_fetch_assoc($result_mondes)) {
                    echo '<option value="'.$row['nom_monde'].'">'.$row['nom_monde'].'</option>';
                }
                echo '</select>';
                echo '<br><br>';
                echo '<h3> Prix</h3>';
                echo '<input class=ipt_prix type="radio" name="prix" id="<300" value="Moins de 300 Rubis">';
                echo '<label for="<300" class=Prix>Moins de 300 Rubis</label>';
                echo '<input class=ipt_prix type="radio" name="prix" id="300-500" value="Entre 300 et 500 Rubis">';
                echo '<label for="300-500" class=Prix >Entre 300 et 500 Rubis</label>';
                echo '<input class=ipt_prix type="radio" name="prix" id=">500" value="Plus de 500 Rubis">';
                echo '<label for=">500" class=Prix >Plus de 500 Rubis</label><br>';

                echo '<br><br>';

                echo '<input type="submit" name="submit" class="recherche_annonce" value="Rechercher">';
                echo '</form>';
                ?>
            </div>

            <main>
            <?php

            if (isset($_GET["search_bar"])) {
                $recherche = $_GET["search_bar"];
            

                $sql = "SELECT * FROM destinations WHERE nom_destination LIKE '%$recherche%'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 
                echo '<div class=box_destination>';
                echo '<img class=Rubis src=img/Rubis.png>';
                echo '<h4>' . $row['prix_destination'] . '<h4>';
                echo '<h3 class=titre_annonce>' . $row['nom_destination'] . '</h3>';
                echo '<img src="' . $row['image_destination'] . '">';
                echo "<a class='offre' href='offre.php?id=" . $row['id_destination'] . "'>Voir l'annonce ➔</a>";
                echo '<p>' . $row['description_destination'] . '</p>';
                echo '</div>';
                    }
                } else {
                    echo "Aucun résultat trouvé.";
                }
            }
            
        // Traitement du formulaire soumis
        if (isset($_GET['submit'])) {
            // Récupération du monde sélectionné
            if (isset($_GET['monde'])) {
                $monde = $_GET['monde'];
            }

            if (isset($_GET['prix'])) {
                $prix = $_GET['prix'];
            }

            // Récupération des destinations pour ce monde à partir de la base de données
            if ($monde == 'Tous') {
                $sql_destinations = "SELECT id_destination, nom_destination, image_destination, description_destination, prix_destination FROM destinations";
            } else {
                $sql_destinations = "SELECT id_destination, nom_destination, image_destination, description_destination, prix_destination FROM destinations
                    JOIN mondes ON destinations.id_monde = mondes.id_monde
                    WHERE mondes.nom_monde = '$monde'";
            }

            if (isset($_GET['prix'])) {
                $prix = $_GET['prix'];
                if ($prix == 'Moins de 300 Rubis') {
                    if (strpos($sql_destinations, 'WHERE') !== false) {
                        $sql_destinations .= " AND prix_destination < 300";
                    } else {
                        $sql_destinations .= " WHERE prix_destination < 300";
                    }
                } elseif ($prix == 'Entre 300 et 500 Rubis') {
                    if (strpos($sql_destinations, 'WHERE') !== false) {
                        $sql_destinations .= " AND prix_destination >= 300 AND prix_destination <= 500";
                    } else {
                        $sql_destinations .= " WHERE prix_destination >= 300 AND prix_destination <= 500";
                    }
                } elseif ($prix == 'Plus de 500 Rubis') {
                    if (strpos($sql_destinations, 'WHERE') !== false) {
                        $sql_destinations .= " AND prix_destination > 500";
                    } else {
                        $sql_destinations .= " WHERE prix_destination > 500";
                    }
                }
            }

            $result_destinations = mysqli_query($conn, $sql_destinations);
            $nb_resultats = mysqli_num_rows($result_destinations);

            // Affichage des destinations pour ce monde
            echo '<h3 class=resultats_recherche>' . $nb_resultats . ' Offres correspondent à vos critères (' . $monde . ' /)</h3>';
            while ($row = mysqli_fetch_assoc($result_destinations)) {
                echo '<div class=box_destination>';
                echo '<img class="Rubis" src="img/Rubis.png" alt="">';
                echo '<h4>' . $row['prix_destination'] .  '</h4>';
                echo '<h3 class=titre_annonce>' . $row['nom_destination'] . '</h3>';
                echo '<img src="' . $row['image_destination'] . '">';
                echo "<a class='offre' href='offre.php?id=" . $row['id_destination'] . "'>Voir l'annonce ➔</a>";
                echo '<p>' . $row['description_destination'] . '</p>';
                echo '</div>';
            }
        }
                // Fermeture de la connexion à la base de données
                mysqli_close($conn);
                ?>
            </main>
   
</body>
</html>
