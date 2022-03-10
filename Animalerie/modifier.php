<?php

declare(strict_types=1);

include 'menu.php';

require("Form.php");
require("Champ.php");
require("Animal.php");
require("AnimauxManager.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tableau</title>
    <link rel="stylesheet" href="ajoutcss.css">
</head>
<body>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81');
    $manager = new AnimauxManager($db);
    $animal = $manager->getAnimal((int)$id);

    if(isset($_POST['modifier'])){
        if(isset($_POST['nom']) && isset($_POST['espece']) && isset($_POST['cri']) && isset($_POST['proprietaire']) && isset($_POST['age'])){
            $a = new Animal;
            $a->setId($id);
            $a->setNom($_POST['nom']);
            $a->setEspece($_POST['espece']);
            $a->setCri($_POST['cri']);
            $a->setProprietaire($_POST['proprietaire']);
            $a->setAge($_POST['age']);
            $db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81');
            $manager = new AnimauxManager($db);
            $manager->update($a);
            $animal = $a;
        }
    }

    $form = new Form('modifier.php?id=' . $id . '');
    $nom = new Champ('nom','nom','text', $animal->getNom());
    $espece = new Champ('espece','espece','text', $animal->getEspece());
    $cri = new Champ('cri','cri','text', $animal->getCri());
    $proprietaire = new Champ('proprietaire','proprietaire','text', $animal->getProprietaire());
    $age = new Champ('age','age','text', $animal->getAge());
    $modifier = new Champ('','modifier','submit','modifier');
    $form->add($nom);
    $form->add($espece);
    $form->add($cri);
    $form->add($proprietaire);
    $form->add($age);
    $form->add($modifier);
    echo $form->__toString();   
?>
</body>
</html>

