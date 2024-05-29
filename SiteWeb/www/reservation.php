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
                <?php
                    include("general/connect.php");

                    if(isset($_GET["idSalle"])) {
                        $nom_Salle= $_GET["nomSalle"];
                        $prix_Salle= $_GET["prixJournnee"];
                        $superficie_Salle= $_GET["superficieSalle"];
                        $Salles = mysqli_query($connect, "SELECT * FROM Salles JOIN Batiments WHERE idSalle=$id_Salle");
                        $Salle = mysqli_fetch_array($Salles);
                    }
                ?>

                <div>
                    <div class="text">Réservation
                        <h1>Nom de la salle : <?=$nom_Salle?> </h1>
                        <h2>Prix : <?=$prix_Salle?></h2>
                        <h2>Superficie : <?=$superficie_Salle?></h2>
                    </div>
                </div>
            </section>
            <form method="post">
                <fieldset>
                    <label for="ident">Identifiant :</label>
                    <input id="ident" name="uid" type="text">
                    <label for="password">Mot de passe :</label>
                    <input id="password" name="upassword" type="password">
                    <label for="ladate">Date de réservation :</label>
                    <input id="ladate" name="thedate" type="date">
                    <br>
                    <label for="envoie">Envoie</label>
                    <input id="envoie" type="submit">
                </fieldset>
            </form>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>