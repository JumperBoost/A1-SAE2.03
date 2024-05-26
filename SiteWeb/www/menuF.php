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

                if(isset($_GET["idFormule"])) {
                    $id_formule= $_GET["idFormule"];
                    $formules = mysqli_query($connect, "SELECT * FROM Formules WHERE idFormule = $id_formule ");
                    $formule = mysqli_fetch_array($formules);
                }
                ?>
                <div class="formule-menu">
                    <h1><?=$formule['nomFormule']?></h1>
                    <div class="info">
                        <div class="image-f">
                            <img src="../IMAGES/<?=$formule['imageFormule']?>.jpg">
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