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
                <div class = "formulaire">
                    <h1>Inscription</h1>
                    <form action="php_inscription.php" method="post">
                        <div>
                            <p> Nom </p>
                            <input type="text" name="nom" required autocomplete="off">
                        </div>

                        <div>
                            <p> Prenom </p>
                            <input type="text" name="prenom" required autocomplete="off">
                        </div>

                        <div>
                            <p> Téléphone </p>
                            <input type="tel" name="tel" required autocomplete="off">
                        </div>

                        <div>
                            <p> codeSecret </p>
                            <input name="code" type="password" required="required" autocomplete="off">
                        </div>
                        <input type="submit" value="Inscription" name='envoi'>
                    </form>
                </div>
            </section>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>