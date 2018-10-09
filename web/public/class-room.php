<?php
require_once '../bootstrap.php';

$api = new \TcApi\SemesterData();

$data = $api->getData();

echo  '<PRE>';
echo $twig->render('class-room.twig', ['data' => $data] );

