<?php
require_once('library/D3ProfileFactory.php');

$factory = new D3ProfileFactory();

$profile = $factory->getProfile('atenhara-1797');

echo $profile;

?>