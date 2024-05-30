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
<?php
$bdd = new PDO('mysql:host=localhost;dbname=sae;charset=utf8;', 'root', 'root');
include("general/connect.php");
if(isset($_POST['envoi'])){
    if (!empty($_POST['Nom']) and !empty($_POST['Prenom']) and !empty($_POST['Tel']) and !empty($_POST['Mdp'])){
        $nomCoworker = htmlspecialchars($_POST['Nom']);
        $prenomCoworker= htmlspecialchars($_POST['Prenom']);
        $tel = htmlspecialchars($_POST['Tel']);
        $codeSecret = sha1($_POST['Mdp']);
        $insertUser = $bdd->prepare('INSERT INTO coworkers(nomCoworker, prenomCoworker, tel, codeSecret)VALUES( ?, ?, ?, ?)');
        $insertUser -> execute(array($nomCoworker, $prenomCoworker, $tel, $codeSecret));

    }else {
        echo "<h1>toutes les informations n'ont pas été completer</h1>";
    }
}?>
</section>
        </main>
        <footer>
            <?php include("general/footer.php"); $fillInTheBlanks = "";?>
        </footer>
</body>
</html>