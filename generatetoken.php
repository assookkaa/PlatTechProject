<?php
require_once 'autoload.php';

$simpletoken = new SimpleToken();
$csrftoken = new CSRFtoken();

$simpletokengen = $simpletoken->generate();

$csrfgen = $csrftoken->generate();

echo "Simple Token: $simpletokengen" . PHP_EOL;
echo "CSRF Token: $csrfgen" . PHP_EOL;

?>