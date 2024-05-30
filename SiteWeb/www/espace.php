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
        <h2>
            Nos espaces de Coworking
        </h2>
    </section>
    <section>
        <div class = "menu">
            <?php
            include("general/connect.php");
            $Batiments = mysqli_query($connect, "SELECT idBatiment, nomBatiment, ville, descriptionBatiment FROM batiments");
            if(count($Batiments)){
                foreach($Batiments as $Batiment):
                    $Salles = mysqli_query($connect, "Select * From salles WHERE idBatiment = $Batiment[idBatiment]");
                    $nbBatiment = 0;
                    foreach($Salles as $Salle):
                        $nbBatiment = $nbBatiment+1;
                    endforeach;
                    ?>
            <div class="donnees">
                <h1>Batiment : <?=$Batiment['nomBatiment']?></h1>
                <div class="image"> <img class="image" src="../IMAGES/<?=$Batiment['nomBatiment']?>.jpg"> </div>
                <div class="text">
                    <h3><?=$Batiment['ville']?></h3>
                    <h3>nombres de Salles : <?=$nbBatiment?></h3>
                    <p>
                        Description :
                        <br>
                        <?=$Batiment['descriptionBatiment']?> </p>
                </div>
            </div>
                <?php endforeach ;}?>
        </div>
    </section>
</main>
<footer>
    <?php include("general/footer.php"); $fillInTheBlanks = "";?>
</footer>
</body>
</html>