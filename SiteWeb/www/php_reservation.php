<html>
<head>
    <?php include("general/head.php");
    $fillInTheBlanks = ""; ?>
    <title>Réservation - Coworkers.net</title>
</head>
<body>
<header>
    <?php include("general/nav.php");
    $fillInTheBlanks = ""; ?>
</header>
<main>
    <section>
        <?php
        if(isset($_POST['envoi'])) {
            if (!empty($_POST['idSalle']) and !empty($_POST['idWorker']) and !empty($_POST['code']) and !empty($_POST['date'])) {
                global $db; include("general/connect.php");
                $idSalle = htmlspecialchars($_POST['idSalle']);
                $idWorker = htmlspecialchars($_POST['idWorker']);
                $codeSecret = htmlspecialchars($_POST['code']);
                $date = htmlspecialchars($_POST['date']);

                if($db->query("SELECT * FROM Coworkers WHERE idCoworker='$idWorker' AND codeSecret='$codeSecret';")->rowCount() == 1) {
                    if ($db->query("SELECT * FROM Reservations WHERE idSalle='$idSalle' AND dateReservation='$date';")->rowCount() == 0) {
                        $db->query("INSERT INTO Reservations VALUES ('$idWorker', '$idSalle', '$date');");
                        $nomSalle = $db->query("SELECT nomSalle FROM Salles WHERE idSalle='$idSalle';")->fetch()["nomSalle"];
                        $worker = $db->query("SELECT * FROM Coworkers WHERE idCoworker='$idWorker';")->fetch();
                        $nomWorker = $worker["nomCoworker"];
                        $prenomWorker = $worker["prenomCoworker"];
                        echo "<h1>Réservation de la salle $nomSalle pour le $date effectuée pour $nomWorker $prenomWorker.</h1>";
                    } else echo "<h1>Une erreur est survenue lors de la réservation de la salle id $idSalle.</h1>";
                } else echo "<h1>L'identifiant ou le code secret de l'utilisateur est invalide. Veuillez réessayer avec des informations correctes.</h1>";
            } else {
                echo "<h1>Toutes les informations n'ont pas été completés</h1>";
            }
        } ?>
        <meta http-equiv="refresh" content="5;index.php"
    </section>
</main>
<footer>
    <?php include("general/footer.php");
    $fillInTheBlanks = ""; ?>
</footer>
</body>
</html>