<!DOCTYPE html>
<html>
<head>
    <?php include("general/head.php");
    $fillInTheBlanks = ""; ?>
</head>
<body>
<header>
    <?php include("general/nav.php");
    $fillInTheBlanks = ""; ?>
</header>
<main>
    <section>
        <?php
        if(isset($_POST['envoi'])) {
            if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['tel']) and !empty($_POST['code'])) {
                global $db; include("general/connect.php");
                $nomCoworker = htmlspecialchars($_POST['nom']);
                $prenomCoworker = htmlspecialchars($_POST['prenom']);
                $tel = htmlspecialchars($_POST['tel']);
                $codeSecret = htmlspecialchars($_POST['code']);
                if($db->query("SELECT * FROM Coworkers WHERE nomCoworker='$nomCoworker' AND prenomCoworker='$prenomCoworker';")->rowCount() == 0) {
                    $sql = "INSERT INTO Coworkers (`nomCoworker`, `prenomCoworker`, `tel`, `codeSecret`) VALUES('$nomCoworker', '$prenomCoworker', '$tel', '$codeSecret')";

                    if ($db->query($sql)) {
                        $id =  $db->query("SELECT idCoworker From Coworkers ORDER BY idCoworker DESC LIMIT 0, 1");
                        $i = $id ->fetch();
                        echo "<h1>Toutes les informations ont été completés. <br>Bienvenue $nomCoworker $prenomCoworker. <br> Votre identifient est $i[idCoworker]</h1>";
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
    <?php include("general/footer.php");
    $fillInTheBlanks = ""; ?>
</footer>
</body>
</html>