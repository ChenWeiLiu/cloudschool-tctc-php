<?php
require_once '../bootstrap.php';

$api = new \TcApi\SemesterData();

$data = $api->getData();

echo  '<PRE>';
print_r($data);

