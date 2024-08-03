<?php global $idSalle, $Salles, $Salle;
require_once 'general/database.php';
if (isset($_GET["idSalle"])) {
    $id_Salle = $_GET["idSalle"];
    $Salles = Database::safe_execute("SELECT * FROM Salles s JOIN Batiments b On s.idBatiment = b.idBatiment WHERE idSalle = :idSalleTag", ['idSalleTag' => $id_Salle]);
    $Salle = $Salles->fetch();
}?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'general/head.php' ?>
    <title><?= $Salle['nomSalle'] ?> - Coworkers.net</title>
</head>
<body>
<header>
    <?php require 'general/nav.php'; ?>
</header>
<main>
    <section class="formule">
        <?php
        if (isset($_GET["idSalle"])) {?>
            <div class="formule-menu">
                <h1>⇒ <?= $Salle['nomSalle'] ?></h1>
                <div class="donnees">
                    <div class="image"><img class="image" src="img/<?= $Salle['nomSalle'] ?>.jpg"></div>

                    <div class="text">
                        <h2><?= $Salle['superficieSalle'] ?> m² • <?= $Salle['prixJournee'] ?> €</h2>
                        <h2 class="no-margin">Adresse :</h2>
                        <p>Batiment <?= $Salle['nomBatiment'] ?>, <?= $Salle['ville'] ?></p>
                        <h2>Capacité : <?= $Salle['capaciteSalle'] ?></h2>
                    </div>
                </div>

                <p>
                    Description :
                    <br>
                    <?=$Salle['descriptionSalle']?>
                </p>

                <form action="php_reservation.php" method="post">
                    <fieldset>
                        <h2>Réservation</h2>
                        <label for="id">Identifiant :</label>
                        <input id="id" name="idWorker" required type="text">
                        <label for="code">Code Secret :</label>
                        <input id="code" name="code" required type="password">
                        <label for="ladate">Date de réservation :</label>
                        <select id="ladate" name="date" required>
                            <option value="">--Veuillez choisir une date--</option>
                            <?php
                            $sel = Database::safe_execute("
                            SELECT * FROM 
                            (SELECT adddate(CURDATE(),t4*10000 + t3*1000 + t2*100 + t1*10 + t0) selected_date FROM
                            (SELECT 0 t0 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
                            (SELECT 0 t1 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
                            (SELECT 0 t2 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
                            (SELECT 0 t3 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
                            (SELECT 0 t4 UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4) v
                            WHERE selected_date BETWEEN CURDATE() AND (CURDATE() + INTERVAL 7 DAY) AND selected_date NOT IN (
                                SELECT dateReservation FROM Reservations WHERE idSalle=:idSalleTag
                            );", ['idSalleTag' => $id_Salle])->fetchAll();
                            foreach ($sel as $date): ?>
                                <option value="<?= $date["selected_date"] ?>"><?= $date["selected_date"] ?></option>
                            <?php endforeach ;?>
                        </select>
                        <br>
                        <input id="idSalle" name="idSalle" type="hidden" value="<?= $id_Salle ?>">
                        <input id="envoie" name="envoi" type="submit">
                    </fieldset>
                </form>
            </div>
        <?php } ?>
    </section>

</main>
<footer>
    <?php require 'general/footer.php' ?>
</footer>
</body>
</html>