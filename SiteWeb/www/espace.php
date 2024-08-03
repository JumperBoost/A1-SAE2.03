<?php require_once 'general/database.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'general/head.php' ?>
    <title>Espaces de Coworking - Coworkers.net</title>
</head>
<body>
<header>
    <?php require 'general/nav.php' ?>
</header>
<main>
    <section>
        <h2>Nos espaces de Coworking</h2>
    </section>
    <section>
        <div class = "menu">
            <?php
            $Batiments = Database::execute("SELECT idBatiment, nomBatiment, ville, descriptionBatiment FROM Batiments;");
            foreach($Batiments as $Batiment):
                $Salles = Database::execute("SELECT * FROM Salles WHERE idBatiment = $Batiment[idBatiment]");
                $nbSalles = Database::execute("SELECT COUNT(*) AS nbSalles FROM Salles WHERE idBatiment=$Batiment[idBatiment];")->fetch()["nbSalles"]; ?>
            <a class="menuF">
                <div class="donnees">
                    <div class="image"> <img class="image" src="img/<?=$Batiment['nomBatiment']?>.jpg"> </div>
                    <div class="text">
                        <h1>Batiment : <?=$Batiment['nomBatiment']?></h1>
                        <h3><?=$Batiment['ville']?></h3>
                        <h3>Nombres de Salles : <?=$nbSalles?></h3>
                        <p>
                            Description :
                            <br>
                            <?=$Batiment['descriptionBatiment']?> </p>
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