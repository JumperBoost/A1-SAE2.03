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
                <div class = "menu">
                    <?php
                        include("general/connect.php");
                        $formules = mysqli_query($connect, "SELECT * FROM Formules");
                    if(!count($formules)){
                    } else {
                    foreach($formules as $formule):
                    ?>
                    <a class="menuF" href="menuF.php?idFormule=<?=$formule['idFormule']?>">
                        <div>
                            <div class="image"> <img class="image" src="../IMAGES/<?=$formule['imageFormule']?>.jpg"> </div>
                            <div class="text">
                                <h2><?=$formule['nomFormule']?></h2>
                                <h3><?=$formule['prixFormule']?> €</h3>
                                <p>
                                    Description :
                                    <br>
                                    <?=$formule['description']?> </p>
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