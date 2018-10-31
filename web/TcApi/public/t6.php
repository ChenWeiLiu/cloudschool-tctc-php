<?php

require_once '../bootstrap.php';


//print DB_HOST;


$link = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_SELECT, DB_USER, DB_PASS);


$statement = $link->prepare('INSERT INTO semester (year, semester)
    VALUES (:year, :semester)');

$statement->execute([
    'year' => 107,
    'semester' => 1
    ]);
