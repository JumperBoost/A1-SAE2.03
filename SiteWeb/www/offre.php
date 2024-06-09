<!DOCTYPE html>
<html>
<head>
    <?php include("general/head.php"); $fillInTheBlanks = "";?>
    <title>Offres - Coworkers.net</title>
</head>
<body>
<header>
    <?php include("general/nav.php"); $fillInTheBlanks = "";?>
</header>
<main>
    <section>
        <h2>
            Nos salles de Coworking
        </h2>
    </section>
    <section class="section2" id="offre">
        <div class = "menu">
            <?php global $db;
            include("general/connect.php");
            $Salles = $db->query("SELECT * FROM Salles ORDER BY prixJournnee DESC");
                foreach($Salles as $Salle): ?>
                <a class="menuF" href="menuF.php?idSalle=<?=$Salle['idSalle']?>">
                    <div class="donnees">
                        <div class="image"> <img class="image" src="img/<?=$Salle['nomSalle']?>.jpg"> </div>
                        <div class="text">
                            <h2><?=$Salle['nomSalle']?></h2>
                            <h3><?=$Salle['superficieSalle']?> m² • <?=$Salle['prixJournnee']?> €</h3>
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
    <?php include("general/footer.php"); $fillInTheBlanks = "";?>
</footer>
</body>
</html>