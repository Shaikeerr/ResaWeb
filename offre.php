<?php

$idAnnonce = $_GET['id']; // ID de l'annonce à afficher
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calmette_resaweb";
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}
 
mysqli_set_charset($conn, "utf8");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Annonces </title>
    <link rel="stylesheet" href="offre.css"> 
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
</html>

<?php
// Vérification si l'ID de la destination est spécifié dans les paramètres d'URL
if (isset($_GET["id"])) {
    $destinationId = $_GET["id"];

    // Récupération des informations de la destination depuis la base de données
    $sql = "SELECT * FROM destinations WHERE id_destination = '$destinationId'";
    $result = mysqli_query($conn, $sql);

    // Vérification si la destination existe dans la base de données
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Génération des informations de la page en utilisant les données récupérées
        echo "<div class='annonce'>";
        echo "<h1>" . $row["nom_destination"] . "</h1>";
        echo "<p class=desc>Description : " . $row["description_destination"] . "</p>";
        echo '<a class="btn_reservation" href="formulaire_reservation.php?id=' . $idAnnonce . '">Réserver ➔</a>';
        echo "<p class=price>Prix : " . $row["prix_destination"] . " Rubis </p>";
        echo '<img src="' . $row['image_destination'] . '">';
        echo "</div>";

    } else {
        echo "Destination non trouvée.";
    }
} else {
    echo "Aucune destination sélectionnée.";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

