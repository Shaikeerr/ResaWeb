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


if (isset($_GET["id"])) {
    $destinationId = $_GET["id"];
    $destinationQuery = "SELECT nom_destination, prix_destination FROM destinations WHERE id_destination = $destinationId";
    $result = mysqli_query($conn, $destinationQuery);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nomDestination = $row['nom_destination'];
            $prixDestination = $row['prix_destination'];
            echo '<h2>(' . $row['nom_destination'] . ')</h2>';
        }
    }
}

if (isset($_POST['submit'])) {
    // Récupérer les valeurs soumises du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $dateArrivee = $_POST['date_arrivee'];
    $dateDepart = $_POST['date_depart'];
    $nombrePersonnes = $_POST['nombre_personnes'];
    $Destination = $nomDestination;
    $prix = $prixDestination * $nombrePersonnes;

    // Requête SQL pour insérer les données dans la table appropriée
    $sql = "INSERT INTO reservations (id_reservation, id_destination, nom, mail, telephone, date_arrivee, date_depart, nb_personnes)
            VALUES (NULL , '$destinationId','$nom', '$email', '$telephone', '$dateArrivee', '$dateDepart', '$nombrePersonnes')";

    if (mysqli_query($conn, $sql)) {
        echo "<p class=recu>Réservation enregistrée avec succès.</p>";
    } else {
        echo "Erreur lors de l'enregistrement de la réservation : " . mysqli_error($conn);
    }

            $to = $email; // Adresse e-mail de destination
            $subject = "Confirmation de réservation";
            $message = "
            <html>
                <head>
                <style>
                body {
                background-color: #282828;
                color: #C6B38E;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                }

                .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                }

                h1 {
                font-size: 24px;
                margin-bottom: 20px;
                }

                p {
                margin-bottom: 10px;
                }

                .button {
                display: inline-block;
                background-color: #C6B38E;
                color: #282828;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 4px;
                }

                .button:hover {
                background-color: #E5D7B7;
                }
                </style>
                </head>
                <body>
                <div class='container'>
                <h1>Voyage en Terre Hylienne vous confirme votre réservation pour $Destination !</h1>
                <p>Merci d'avoir réservé votre voyage sur Voyage en Terre Hylienne $nom ! Vous avez réservé un voyage à $Destination, du $dateArrivee au $dateDepart pour $nombrePersonnes personnes. Le montant à régler le jour de votre arrivée sera de $prix Rubis. Nous vous souhaitons un agréable voyage! </p>
                <a href='http://resaweb.calmette.butmmi.o2switch.site/index.php' class='button'>Visiter le site</a>
                </div>
                </body>
                </html>
            ";
            
            // En-têtes de l'e-mail
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: voyage_en_terre_hylienne@calmette.butmmi.o2switch.site" . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
                echo "<p class=confirm_mail>Un e-mail de confirmation a été envoyé à " . $email. "</p>";
            } else {
                echo "Erreur lors de l'envoi de l'e-mail de confirmation.";
            }
        } else {
            echo "Erreur lors de l'enregistrement de la réservation : " . mysqli_error($conn);
    }


// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Réservation</title>
    <link rel="stylesheet" href="formulaire_reservation.css">
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

<h1>Réservation</h1>

<div class="formulaire">
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
    
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    
        <label for="telephone">Téléphone :</label>
        <input type="tel" name="telephone" id="telephone" required>
    
        <label for="date_arrivee">Date d'arrivée :</label>
        <input type="date" name="date_arrivee" id="date_arrivee" required>
    
        <label for="date_depart">Date de départ :</label>
        <input type="date" name="date_depart" id="date_depart" required>
    
        <label for="nombre_personnes">Nombre de personnes :</label>
        <input type="number" name="nombre_personnes" id="nombre_personnes" required>
    
        <input type="submit" name="submit" value="Réserver">
    </form>
</div>


<footer>
      <div class="colonne"> 
        <h3> Nos Réseaux </h3> 
        <a class=link_reseau href="https://fr-fr.facebook.com"><img class=reseau src="SVG/Facebook.svg" alt="Page Facebook"><p> Facebook </p></a>
        <a class=link_reseau href="https://www.instagram.com"><img class=reseau src="SVG/Instagram.svg" alt="Page Instagram"><p> Instagram</p></a>
        <a class=link_reseau href="https://www.reddit.com"><img class=reseau src="SVG/Reddit.svg" alt="Communauté Reddit"><p> Reddit</p></a>
        <a class=link_reseau href="https://twitter.com/home"><img class=reseau src="SVG/Twitter.svg" alt="Page Twitter"> <p> Twitter</p></a>
        <a class=link_reseau href="https://www.youtube.com"><img class=reseau src="SVG/Youtube.svg" alt="Chaîne Youtube"><p>Youtube</p></a>
      </div>
      <div class="colonne"> 
        <h3> A Propos </h3>
        <a href="infos.html"><p> Qui sommes nous ? </p></a>
        <a href="mentions.html"><p> Mentions Légales</p></a>
      </div>
      <div class="colonne"> 
        <a href="index.php" class="exclude"><img class="logo_footer" src="img/logo.png" alt="Retour en haut"></a>
      </div>
      
    </footer>
</body>
</html>