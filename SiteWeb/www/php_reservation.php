<?php require_once 'general/database.php' ?>

<html lang="fr">
<head>
    <?php require 'general/head.php' ?>
    <title>Réservation - Coworkers.net</title>
</head>
<body>
<header>
    <?php require 'general/nav.php' ?>
</header>
<main>
    <section>
        <?php
        if(isset($_POST['envoi'])) {
            if (!empty($_POST['idSalle']) and !empty($_POST['idWorker']) and !empty($_POST['code']) and !empty($_POST['date'])) {
                $idSalle = htmlspecialchars($_POST['idSalle']);
                $idWorker = htmlspecialchars($_POST['idWorker']);
                $codeSecret = htmlspecialchars($_POST['code']);
                $date = htmlspecialchars($_POST['date']);

                $values = ['idWorkerTag' => $idWorker, 'codeSecretTag' => $codeSecret];
                if(Database::safe_execute("SELECT * FROM Coworkers WHERE idCoworker=:idWorkerTag AND codeSecret=:codeSecretTag", $values)->rowCount() == 1) {
                    $values += ['idSalleTag' => $idSalle, 'dateTag' => $date];
                    if (Database::safe_execute("SELECT * FROM Reservations WHERE idSalle=:idSalleTag AND dateReservation=:dateTag", $values)->rowCount() == 0) {
                        Database::safe_execute("INSERT INTO Reservations VALUES (:idWorkerTag, :idSalleTag, :dateTag)", $values);
                        $nomSalle = Database::safe_execute("SELECT nomSalle FROM Salles WHERE idSalle=:idSalleTag", $values)->fetch()["nomSalle"];
                        $worker = Database::safe_execute("SELECT * FROM Coworkers WHERE idCoworker=:idWorkerTag", $values)->fetch();
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
    <?php require 'general/footer.php' ?>
</footer>
</body>
</html>