<?php

// Configuratie Database
define('DB_HOST','localhost'); // Host
define('DB_USER','root'); // Database gebruikersnaam
define('DB_PASS',''); // Wachtwoord
define('DB_NAME','pdo_toets'); // Database-naam
// Opstellen van database connectie
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
die($e);
}

?>
