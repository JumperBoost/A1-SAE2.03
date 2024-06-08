<!DOCTYPE html>
<html>
<head>
    <?php include("general/head.php"); $fillInTheBlanks = "";?>
</head>
<body>
<header>
    <?php include("general/nav.php"); $fillInTheBlanks = "";?>
</header>
<main>
    <section>
        <h2>Nos espaces de Coworking</h2>
    </section>
    <section>
        <div class = "menu">
            <?php global $db;
            include("general/connect.php");
            $Batiments = $db->query("SELECT idBatiment, nomBatiment, ville, descriptionBatiment FROM Batiments;");
            foreach($Batiments as $Batiment):
                $Salles = $db->query("SELECT * FROM Salles WHERE idBatiment = $Batiment[idBatiment]");
                $nbSalles = $db->query("SELECT COUNT(*) AS nbSalles FROM Salles WHERE idBatiment='$Batiment[idBatiment]';")->fetch()["nbSalles"]; ?>
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
    <?php include("general/footer.php"); $fillInTheBlanks = "";?>
</footer>
</body>
</html>