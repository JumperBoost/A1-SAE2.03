<!DOCTYPE html>
<html>
<head>
    <?php include("general/head.php");
    $fillInTheBlanks = ""; ?>
    <title>Utilisateurs - Coworkers.net</title>
</head>
<body>
<header>
    <?php include("general/nav.php");
    $fillInTheBlanks = ""; ?>
</header>
<main id="main-utilisateurs">
    <section class="utilisateurs">
        <?php global $db;
        include("general/connect.php");
        ?>
        <?php
            $Coworkers = $db->query("SELECT c.idCoworker, nomCoworker, prenomCoworker, COUNT(r.idSalle) AS nbReservations FROM Coworkers c LEFT JOIN Reservations r 
            ON c.idCoworker  = r.idCoworker 
            GROUP BY c.idCoworker;");
            foreach($Coworkers as $Coworker): ?>
               <div class="donnees">
                    <h1> <?=$Coworker['nomCoworker'] ?> <?=$Coworker['prenomCoworker'] ?> a  réservé <?=$Coworker['nbReservations'] ?> salle(s)</h1>
               </div>
            <?php endforeach;?>
    </section>
</main>
<footer>
    <?php include("general/footer.php"); $fillInTheBlanks = "";?>
</footer>
</body>
</html>