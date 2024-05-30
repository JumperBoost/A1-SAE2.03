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
                            <input type="Nom" name="Nom"  required="required" autocomplete="off">
                        </div>

                        <div>
                            <p> Prenom </p>
                            <input type="Prenom" name="Prenom" required="required" autocomplete="off">
                        </div>

                        <div>
                            <p> Tel </p>
                            <input type="Tel" name="Tel" required="required" autocomplete="off">
                        </div>

                        <div>
                            <p> codeSecret </p>
                            <input type="Mdp" name="Mdp" required="required" autocomplete="off">
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