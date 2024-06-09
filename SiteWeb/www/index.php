<!DOCTYPE html>
<html>
    <head>
        <?php include("general/head.php"); $fillInTheBlanks = "";?>
        <title>Accueil - Coworkers.net</title>
    </head>
    <body>
        <header>
            <?php include("general/nav.php"); $fillInTheBlanks = "";?>
        </header>
        <main>
            <section id="section1">
            <div class="boite1">
                <div id="Mtp">
                    <div class="effect">
                        <h2>Montpellier</h2>
                        <button><a href="index.php?idVille=Montpellier#section2">Voir plus</a></button>
                        <?php global $db;
                        include("general/connect.php");
                        $nbSallesBatiment = $db->query("SELECT COUNT(*) AS nbSalles FROM Salles WHERE idBatiment=1;")->fetch()["nbSalles"];
                        $nbPlacesBatiment = $db->query("SELECT SUM(capaciteSalle) AS nbPlaces FROM Salles WHERE idBatiment=1;")->fetch()["nbPlaces"];
                        ?>
                        <div>
                            <h4>Il y a <?= $nbPlacesBatiment ?> places libres dans <?= $nbSallesBatiment ?> salle(s)</h4>
                        </div>
                        
                    </div>

                </div>
                <div id="Sete">
                    <div class="effect">
                        <h2>Sète</h2>
                        <button><a href="index.php?idVille=Sete#section2">Voir plus</a></button>
                        <?php global $db;
                        include("general/connect.php");
                        $nbSallesBatiment = $db->query("SELECT COUNT(*) AS nbSalles FROM Salles WHERE idBatiment=2;")->fetch()["nbSalles"];
                        $nbPlacesBatiment = $db->query("SELECT SUM(capaciteSalle) AS nbPlaces FROM Salles WHERE idBatiment=2;")->fetch()["nbPlaces"];
                        ?>
                        <div>
                            <h4>Il y a <?= $nbPlacesBatiment ?> places libres dans <?= $nbSallesBatiment ?> salle(s)</h4>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <section id="section2">
                <div class="menu">
                    <?php
                        if(isset($_GET['idVille'])) {
                            global $db; include("general/connect.php");
                            $Salles = $db->query("SELECT * FROM Salles s JOIN Batiments b on s.idBatiment = b.idBatiment WHERE ville = '$_GET[idVille]'");
                            foreach($Salles as $Salle): ?>
                            <a class="menuF" href="menuF.php?idSalle=<?=$Salle['idSalle']?>">
                                <div class="donnees">
                                    <div class="image"> <img class="image" src="img/<?=$Salle['nomSalle']?>.jpg"> </div>
                                    <div class="text">
                                        <h2><?=$Salle['nomSalle']?></h2>
                                        <h3>Capacité : <?=$Salle['capaciteSalle']?></h3>
                                        <h3><?=$Salle['prixJournnee']?> €</h3>
                                        <p>
                                            Description :
                                            <br>
                                            <?=$Salle['descriptionSalleCourte']?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach;
                        }?>
                </div>
            </section>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>