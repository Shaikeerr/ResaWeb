<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage en Terre Hylienne</title>
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <nav id='menu'>
      <input type='checkbox' id='responsive-menu'>
      <ul>
        <li class="accueil"><a href="index.php"><img class="logo_nav" src="img/Logo-nav.png" alt="Retour à l'accueil"></a></li>
        <li><a href='reservations.php?monde=Tous&submit=Rechercher'>Réservations</a></li>
        <li><a href='infos.html'>A propos</a></li>
      </ul>
    </nav>

    <header> 
      <h1> Voyage en Terre Hylienne </h1>
      <img class="logo" src="img/logo.png" alt="">
      <a class="Begin" href="#debut"> Commencer </a>
    </header>
    <div id="debut" class="container where">
      <h1 class="titre">Où souhaitez vous aller ? </h1>
      <form class="filters" action="reservations.php" method="GET">
        <input class="tags" name="search_bar" type="text" placeholder="Rechercher"> <br>
        <button class="tags valider"> Valider </button>
      </form>
    </div>
    <div class="container">
      <h1 class="titre" id="New"> Nouveautés </h1>
      <img class="left" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Feather-arrows-arrow-left.svg/2048px-Feather-arrows-arrow-left.svg.png" alt="Flèche Gauche">
      <img class="right" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Feather-arrows-arrow-left.svg/2048px-Feather-arrows-arrow-left.svg.png" alt="Flèche Droite"> 
        <div class="js-slider">
          <div class="js-boxes">
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

            mysqli_set_charset($conn, "utf8");


            // Récupération des trois dernières annonces
            $sql = "SELECT * FROM destinations ORDER BY id_destination DESC LIMIT  6";
            $result = mysqli_query($conn, $sql);

            // Affichage des annonces dans le slider
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo '<img src="' . $row['image_destination'] . '">';
                echo '<div class=div_prix><h1 class="Prix">' . $row['prix_destination'] . '</h1>' . '<img class="Rubis" src="img/Rubis.png" alt=""></div>"';
                echo "<a href='offre.php?id=" . $row['id_destination'] . "' class='Bouton'><p class=titre_bouton> Voir l'annonce ➔ </p></a>";
                echo "<h2>" . $row['nom_destination'] . "</h2>";
                echo "<p>" . $row['description_destination'] . "</p>";
                echo '</div>';
            }

            // Fermeture de la connexion à la base de données
            mysqli_close($conn);
            ?>
          </div>
        </div>
    </div>
    <div class="container"> 
      <h1 class="titre"> Series populaires</h1>
      <div class="covers">

        <!--Cover Zelda Breath of the Wild-->
        <a href="reservations.php?monde=Breath+of+the+Wild&submit=Rechercher">
          <div class="box_cover">
            <div class="background_img" id="bg1"> </div>
            <p class="tag"> BOTW </p>
            <p class="license">Breath of the Wild</p>
          </div>
        </a>

        <!--Cover Ocarina of Time-->
        <a href="reservations.php?monde=Ocarina+of+Time&submit=Rechercher">
          <div class="box_cover">
            <div class="background_img" id="bg2"> </div>
            <p class="tag"> OOT </p>
            <p class="license">Ocarina of Time</p>
          </div>
        </a>

        <!--Cover Twilight Princess-->
        <a href="reservations.php?monde=Twilight+Princess&submit=Rechercher">
          <div class="box_cover">
            <div class="background_img" id="bg3"> </div>
            <p class="tag"> TP </p>
            <p class="license">Twilight Princess</p>
          </div>
        </a>

      </div>
      </div>
      </div>
    </div>
    <footer>
      <div class="colonne"> 
        <h3> Nos Réseaux </h3> 
        <a href="https://fr-fr.facebook.com"><img class=reseau src="SVG/Facebook.svg" alt="Page Facebook"><p> Facebook </p></a>
        <a href="https://www.instagram.com"><img class=reseau src="SVG/Instagram.svg" alt="Page Instagram"><p> Instagram</p></a>
        <a href="https://www.reddit.com"><img class=reseau src="SVG/Reddit.svg" alt="Communauté Reddit"><p> Reddit</p></a>
        <a href="https://twitter.com/home"><img class=reseau src="SVG/Twitter.svg" alt="Page Twitter"> <p> Twitter</p></a>
        <a href="https://www.youtube.com"><img class=reseau src="SVG/Youtube.svg" alt="Chaîne Youtube"><p>Youtube</p></a>
      </div>
      <div class="colonne"> 
        <h3> A Propos </h3>
        <a href="infos.html"><p> Qui sommes nous ? </p></a>
        <a href="mentions.html"><p> Mentions Légales</p></a>
      </div>
      <div class="colonne"> 
        <a href="index.php" class="exclude"><img class="logo_footer" src="img/logo.png" alt="Retour en haut"></a>
        <input type="email" placeholder="S'abonner à la newsletter">
      </div>
      
    </footer>
  </body>
  <script src="script.js"></script>
</html>