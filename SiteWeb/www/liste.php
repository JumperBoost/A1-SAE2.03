<?php require_once 'general/database.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'general/head.php' ?>
    <title>Utilisateurs - Coworkers.net</title>
</head>
<body>
<header>
    <?php require 'general/nav.php' ?>
</header>
<main id="main-utilisateurs">
    <section class="utilisateurs">
        <?php
            $Coworkers = Database::execute("SELECT c.idCoworker, nomCoworker, prenomCoworker, COUNT(r.idSalle) AS nbReservations
            FROM Coworkers c LEFT JOIN Reservations r ON c.idCoworker = r.idCoworker GROUP BY c.idCoworker;");
            foreach($Coworkers as $Coworker): ?>
               <div class="donnees">
                    <h1> <?=$Coworker['nomCoworker'] ?> <?=$Coworker['prenomCoworker'] ?> a  réservé <?=$Coworker['nbReservations'] ?> salle(s)</h1>
               </div>
            <?php endforeach;?>
    </section>
</main>
<footer>
    <?php require 'general/footer.php' ?>
</footer>
</body>
</html>