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
            <section class="formule">
                <?php
                    include("general/connect.php");
                if(isset($_GET["idSalle"])) {
                    $id_Salle = $_GET["idSalle"];
                    $Salles = mysqli_query($connect, "SELECT * FROM Salles JOIN Batiments On salles.idBatiment = batiments.idBatiment WHERE idSalle = $id_Salle");
                    $Salle = mysqli_fetch_array($Salles);
                ?>
                <div class="formule-menu">
                    <h1>Salle : <?=$Salle['nomSalle']?></h1>
                    <div>
                        <div class="image"> <img class="image" src="../IMAGES/<?=$Salle['nomSalle']?>.jpg"> </div>

                        <div class="text">
                            <h2>Prix : <?=$Salle['prixJournnee']?> m²</h2>
                            <h2>Adresse : Batiment <?=$Salle['nomBatiment']?>, <?=$Salle['ville']?></h2>
                            <h2>Capacité : <?=$Salle['capaciteSalle']?></h2>
                            <h2>Superficie : <?=$Salle['superficieSalle']?> m²</h2>
                        </div>
                        <p>
                            Description :
                            <br>
                            <?=$Salle['descriptionSalle']?>
                        </p>
                    </div>
                </div>
                <?php }?>
            </section>

        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>