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

                <div>
                    <div class="text">Réservation
                        <h1>Nom de la salle : </h1>
                        <h2>Prix : </h2>
                        <h2>Superficie : </h2>
                    </div>
                </div>
            </section>
            <form method="post">
                <fieldset>
                    <label for="ident">Identifiant :</label>
                    <input id="ident" name="uid" type="text">
                    <label for="password">Mot de passe :</label>
                    <input id="password" name="uid" type="text">
                </fieldset>
            </form>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
    </body>
</html>