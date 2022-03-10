<?php

declare(strict_types=1);
require("Animal.php");
require("AnimauxManager.php");
require("VueAnimal.php");

$db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81');
$manager = new AnimauxManager($db);
$animaux = $manager->ListAnimal();
$tableau = new VueAnimal;
$tableau->hydrate($animaux);

echo $tableau->__toString();    
?>