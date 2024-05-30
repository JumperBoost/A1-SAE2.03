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
                    <div class="donnees">
                        <div class="image"> <img class="image" src="../IMAGES/<?=$Salle['nomSalle']?>.jpg"> </div>

                        <div class="text">
                            <h2>Prix : <?=$Salle['prixJournnee']?> €</h2>
                            <h2>Adresse : Batiment <?=$Salle['nomBatiment']?>, <?=$Salle['ville']?></h2>
                            <h2>Capacité : <?=$Salle['capaciteSalle']?></h2>
                            <h2>Superficie : <?=$Salle['superficieSalle']?> m²</h2>
                        </div>

                    </div>
                    <p>
                        Description :
                        <br>
                        <?=$Salle['descriptionSalle']?>
                    </p>
                    <form action="php_reservation.php" method="post">
                        <fieldset>
                            <label for="id">Identifiant :</label>
                            <input id="id" name="uid" type="text">
                            <label for="psw">Mot de passe :</label>
                            <input id="psw" name="upsw" type="password">
                            <label for="ladate">Date de réservation :</label>
                            <input id="ladate" name="thedate" type="date">
                            <br>
                            <label for="envoie">Envoie</label>
                            <input id="envoie" type="submit">
                        </fieldset>
                    </form>
                </div>
                <?php }?>
            </section>

        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>