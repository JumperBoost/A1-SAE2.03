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
$conn = new mysqli("localhost", "root", "root", "sae");
if ($conn -> connect_error) {
    die("Erreur :" . $conn -> connect_error);
}
if(isset($_POST['envoi'])){
    if (!empty($_POST['Nom']) and !empty($_POST['Prenom']) and !empty($_POST['Tel']) and !empty($_POST['Mdp'])){
        $nomCoworker = htmlspecialchars($_POST['Nom']);
        $prenomCoworker = htmlspecialchars($_POST['Prenom']);
        $tel = htmlspecialchars($_POST['Tel']);
        $codeSecret = htmlspecialchars($_POST['Mdp']);
        $sql = "INSERT INTO Coworkers (`nomCoworker`, `prenomCoworker`, `tel`, `codeSecret`) VALUES('$nomCoworker', '$prenomCoworker', '$tel', '$codeSecret')";

        if (mysqli_query($conn, $sql)){
            echo "<h1>toutes les informations ont été completer <br>Bienvenue $nomCoworker</h1>";
        } else {
            echo $sql;
        }
        $conn -> close();
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