<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require 'general/head.php' ?>
        <title>Inscription - Coworkers.net</title>
    </head>
    <body>
    <header>
        <?php require 'general/nav.php' ?>
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
                            <p> Code Secret </p>
                            <input type="password" name="code" required autocomplete="off">
                        </div>
                        <input type="submit" value="Inscription" name='envoi'>
                    </form>
                </div>
            </section>
        </main>
        <footer>
            <?php require 'general/footer.php' ?>
        </footer>
    </body>
</html>