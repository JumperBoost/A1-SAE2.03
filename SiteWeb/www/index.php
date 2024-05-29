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
                        $SallesM = mysqli_query($connect, "SELECT * FROM Salles NATURAL JOIN Batiments ORDER BY ville");
                        $i = 0;
                    if(!count($SallesM)){
                    } else {

                    foreach($SallesM as $SalleM):
                    ?>
                    <a class="menuF" href="menuF.php?idFormule=<?=$SalleM['idSalle']?>">
                        <div>
                            <div class="image"> <img class="image" src="../IMAGES/<?=$SalleM['nomSalle']?>.jpg"> </div>
                            <div class="text">
                                <h2><?=$SalleM['nomSalle']?></h2>
                                <h3>Capacité : <?=$SalleM['capaciteSalle']?></h3>
                                <h3><?=$SalleM['prixJournnee']?> €</h3>
                                <p>
                                    Description :
                                    <br>
                                    <?=$SalleM['descriptionSalleCourte']?> </p>
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