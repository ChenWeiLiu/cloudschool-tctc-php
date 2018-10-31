<?php

require_once '../bootstrap.php';

$sql = "SELECT * FROM semester_class ORDER BY grade, class_no";

$arr = $mysqlPdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

//print("<pre>");
//print_r ($arr);
echo $twig->render('t10/semester_class.twig', ['data' => $arr] );
