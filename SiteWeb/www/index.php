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
                    <a>
                        <div>
                            <div class="image"> <img src="../IMAGES/<?=$formule['imageFormule']?>.jpg"> </div>
                            <h2><?=$formule['nomFormule']?></h2>
                            <h3><?=$formule['prixFormule']?></h3>
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