<?php global $db;
$host = "localhost";
$port = 3306;
$user = "root";
$password = "root";
$database = "sae";

try {
    $db = new PDO("mysql:host=$host:$port;dbname=$database", $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die("Erreur : Connexion impossible à la base de données");
}

class Database {
    public static function execute(string $request) : false|PDOStatement {
        global $db;
        return $db->query($request);
    }

    public static function safe_execute(string $request, array $values) : PDOStatement {
        global $db;
        $pdoStatement = $db->prepare($request);
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);

        // Garder uniquement les valeurs utiles à la requête
        $valid_values = [];
        foreach ($values as $key => $value) {
            if(str_contains($request, ":$key"))
                $valid_values[$key] = $value;
        }

        $pdoStatement->execute($valid_values);
        return $pdoStatement;
    }

    public static function attempt_safe_execute(string $request, array $values) : bool {
        global $db;
        $pdoStatement = $db->prepare($request);

        // Garder uniquement les valeurs utiles à la requête
        $valid_values = [];
        foreach ($values as $key => $value) {
            if(str_contains($request, ":$key"))
                $valid_values[$key] = $value;
        }

        return $pdoStatement->execute($valid_values);
    }
}
?>