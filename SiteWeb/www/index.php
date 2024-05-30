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
            <section class="section1">
            <div class="boite1">
                <div id="Mtp">
                    <div class="effect">
                        <h2> Montpellier </h2>
                        <a href="index.php?idVille=<?="Montpellier"?>"><button>Voir plus</button></a>
                    </div>

                </div>
                <div id="Sete">
                    <div class="effect">
                        <h2> Sète </h2>
                        <button><a href="index.php?idVille=<?="Sete"?>">Voir plus</a></button>
                    </div>
                </div>
            </div>
            </section>
            <section class="section2">
                <div class = "menu">
                    <?php
                        include("general/connect.php");
                        if(isset($_GET["idVille"])) {
                            $Salles = mysqli_query($connect, "SELECT * FROM salles JOIN batiments on salles.idBatiment = batiments.idBatiment");
                            if(count($Salles)){
                                foreach($Salles as $Salle):
                                ?>
                                <a class="menuF" href="menuF.php?idSalle=<?=$Salle['idSalle']?>">
                                    <div class="donnees">
                                        <div class="image"> <img class="image" src="../IMAGES/<?=$Salle['nomSalle']?>.jpg"> </div>
                                        <div class="text">
                                            <h2><?=$Salle['nomSalle']?></h2>
                                            <h3>Capacité : <?=$Salle['capaciteSalle']?></h3>
                                            <h3><?=$Salle['prixJournnee']?> €</h3>
                                            <p>
                                                Description :
                                                <br>
                                                <?=$Salle['descriptionSalleCourte']?> </p>
                                        </div>
                                    </div>
                                </a>
                        <?php endforeach ;}?>
                    <?php }?>
                </div>
            </section>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>