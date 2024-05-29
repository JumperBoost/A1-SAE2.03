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
                        $id_Salle= $_GET["idSalle"];
                        $Salles = mysqli_query($connect, "SELECT * FROM Salles JOIN Batiments WHERE idSalle=$id_Salle");
                        $Salle = mysqli_fetch_array($Salles);
                    }
                ?>
                <div class="formule-menu">
                    <h1><?=$Salle['idSalle']?></h1>
                </div>

            </section>

        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>