<?php require_once 'general/database.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'general/head.php'  ?>
    <title>Inscription - Coworkers.net</title>
</head>
<body>
<header>
    <?php require 'general/nav.php' ?>
</header>
<main>
    <section>
        <?php
        if(isset($_POST['envoi'])) {
            if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['tel']) and !empty($_POST['code'])) {
                $nomCoworker = htmlspecialchars($_POST['nom']);
                $prenomCoworker = htmlspecialchars($_POST['prenom']);
                $tel = htmlspecialchars($_POST['tel']);
                $codeSecret = htmlspecialchars($_POST['code']);
                $values = ['nomCoworkerTag' => $nomCoworker, 'prenomCoworkerTag' => $prenomCoworker];
                if(Database::safe_execute("SELECT * FROM Coworkers WHERE nomCoworker=:nomCoworkerTag AND prenomCoworker=:prenomCoworkerTag", $values)->rowCount() == 0) {
                    $sql = "INSERT INTO Coworkers (`nomCoworker`, `prenomCoworker`, `tel`, `codeSecret`) VALUES(:nomCoworkerTag, :prenomCoworkerTag, :telTag, :codeSecretTag)";
                    $values += ['telTag' => $tel, 'codeSecretTag' => $codeSecret];

                    if (Database::attempt_safe_execute($sql, $values)) {
                        $id = Database::execute("SELECT idCoworker From Coworkers ORDER BY idCoworker DESC LIMIT 0, 1")->fetch();
                        echo "<h1>Toutes les informations ont été completés. <br>Bienvenue $nomCoworker $prenomCoworker. <br> Votre identifiant est $id[idCoworker]</h1>";
                    } else {
                        echo $sql;
                    }
                } else echo "<h1>Ce compte existe déjà, veuillez créer un compte avec d'autres informations.</h1>";
            } else {
                echo "<h1>Toutes les informations n'ont pas été completés</h1>";
            }
        } ?>
        <meta http-equiv="refresh" content="5;index.php"
    </section>
</main>
<footer>
    <?php require 'general/footer.php' ?>
</footer>
</body>
</html>