<?php

require_once '../bootstrap.php';

$sql = "SELECT * FROM student where name LIKE :name";

$statement = $mysqlPdo->prepare($sql);

$statement->execute([
    'name'=>'黃%',
]);

$arr = $statement->fetchAll(\PDO::FETCH_ASSOC);

print("<pre>");
print_r ($arr);
//echo $twig->render('t11/semester_class.twig', ['data' => $arr] );
