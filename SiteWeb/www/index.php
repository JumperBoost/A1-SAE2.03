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
                    Nos salles de Coworking
                </h2>
            </section>
            <section>
                <div class = "menu">
                    <?php
                        include("general/connect.php");
                        $Salles = mysqli_query($connect, "SELECT * FROM sae.salles LEFT JOIN sae.batiments on salles.idBatiment = batiments.idBatiment ORDER BY ville, idSalle");
                        if(count($Salles)){
                        $ville = "";
                        foreach($Salles as $Salle):
                            ?>
                            <?php if ($ville != $Salle['ville']){
                                $ville =  $Salle['ville'];
                                echo "</br><h1>$ville</h1></br>";
                        }?>
                            <a class="menuF" href="menuF.php?idSalle=<?=$Salle['idSalle']?>">
                                <div>
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
                </div>
            </section>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>