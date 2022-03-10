<?php

declare(strict_types=1);
require("Animal.php");
require("AnimauxManager.php");
require("VueAnimal.php");

$db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81');
$manager = new AnimauxManager($db);
$animaux = $manager->ListAnimal();   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tableau</title>
</head>
<body>
<table border : 1>
    <tr>
    <th>id</th>
    <th>nom</th>
    <th>espece</th>
    <th>cri</th>
    <th>proprietaire</th>
    <th>age</th>
    </tr>
    <?php 
    foreach($animaux as $animal){
        $a = new VueAnimal($animal);
        echo $a->__toString();
    }
    ?>
    </table>
</body>
</html>