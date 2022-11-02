<?php

require_once 'DatabaseConfig.php';

try {
    $dbContext = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
} catch(PDOException $error) {
    print "Error: ".$error->getMessage();
    die();
}
