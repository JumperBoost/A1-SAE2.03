<?php require_once 'general/database.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'general/head.php' ?>
    <title>Offres - Coworkers.net</title>
</head>
<body>
<header>
    <?php require 'general/nav.php' ?>
</header>
<main>
    <section>
        <h2>
            Nos salles de Coworking
        </h2>
    </section>
    <section class="section2" id="offre">
        <div class = "menu">
            <?php
            $Salles = Database::execute("SELECT * FROM Salles ORDER BY prixJournee DESC");
                foreach($Salles as $Salle): ?>
                <a class="menuF" href="menuF.php?idSalle=<?=$Salle['idSalle']?>">
                    <div class="donnees">
                        <div class="image"> <img class="image" src="img/<?=$Salle['nomSalle']?>.jpg"> </div>
                        <div class="text">
                            <h2><?=$Salle['nomSalle']?></h2>
                            <h3><?=$Salle['superficieSalle']?> m² • <?=$Salle['prixJournee']?> €</h3>
                            <h3>Capacité : <?=$Salle['capaciteSalle']?></h3>
                            <p>
                                Description :
                                <br>
                                <?=$Salle['descriptionSalleCourte']?> </p>
                        </div>
                    </div>
                </a>
                <?php endforeach ;?>
        </div>
    </section>
</main>
<footer>
    <?php require 'general/footer.php' ?>
</footer>
</body>
</html>