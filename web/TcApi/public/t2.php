<?php
require_once '../bootstrap.php';

$api = new \TcApi\SchoolNews();

$data = $api->getListAll(2);
echo  '<PRE>';
print_r($data);

print_r('-------------------------------------');
$api2 = new \TcApi\SchoolNews();

$data2 = $api2->getID(1);

echo  '<PRE>';
print_r($data2);

