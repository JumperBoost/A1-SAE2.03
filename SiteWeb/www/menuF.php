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
                    $idSalle= $_GET["idSalle"];
                    $Salles = mysqli_query($connect, "SELECT * FROM Salle WHERE idSalle = $idSalle ");
                    $Salle = mysqli_fetch_array($Salles);
                }
                ?>
                <div class="formule-menu">
                    <h1><?=$Salle['nomSalle']?></h1>
                    <div class="info">
                        <div class="image-f">
                            <img src="../IMAGES/<?=$Salle['nomSalle']?>.jpg">
                        </div>
                    </div>
                </div>

            </section>

        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>