<?php
echo '<p>Zwischenmeldung 1.1</p>';
$host = "db5012800611.hosting-data.io";
$name = "dbs10751987";
$user = "dbu3497646";
$passwort = "2RegEn15!";

try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}

echo '<p>Zwischenmeldung 1.2</p>';

?>