<?php

declare(strict_types=1);

include 'menu.php';

require("Form.php");
require("Champ.php");
require("AnimauxManager.php");
require("Animal.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajout</title>
    <link rel="stylesheet" href="recherchecss.css">
</head>
<body>
    <?php
    $form = new Form('#');
    $nom = new Champ('nom','nom','text');
    $espece = new Champ('espece','espece','text');
    $cri = new Champ('cri','cri','text');
    $proprietaire = new Champ('proprietaire','proprietaire','text');
    $age = new Champ('age','age','text');
    $rechercher = new Champ('','rechercher','submit','rechercher');
    $form->add($nom);
    $form->add($espece);
    $form->add($cri);
    $form->add($proprietaire);
    $form->add($age);
    $form->add($rechercher);
    echo $form->__toString();
    
    if(isset($_POST['rechercher'])){
        if(isset($_POST['nom'])){
            $db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81');
            $manager = new AnimauxManager($db);
            $a = new Animal();
            $a->setNom($_POST['nom']);
            $a->setEspece($_POST['espece']);
            $a->setCri($_POST['cri']);
            $a->setProprietaire($_POST['proprietaire']);
            $a->setAge($_POST['age']);
            $result = $manager->rechercheFiltre($a);
            if(empty($result)){
                echo '<h2>aucun résultat</h2>';
            }
            echo '<div class="container">';
            foreach($result as $animal){
                echo '<div class="card">';
                echo $animal->__toString();
                echo '</div>';
            }
            echo '</div>';
        }
    }
    
    ?>
</body>
</html>