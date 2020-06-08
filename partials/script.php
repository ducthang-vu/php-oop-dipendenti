<?php
include_once __DIR__ . '/data.php';
include_once __DIR__ . '/classes.php';

echo 'script.php is working';

$myCompany = new Company('PincoPallino Spa', 'IT123456789', 'Via Mario Rossi 1/A', '0123-456789', $people);

var_dump($myCompany);
var_dump($myCompany->getHrStock());