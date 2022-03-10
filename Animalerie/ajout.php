<?php

declare(strict_types=1);

include 'menu.php';

require("Form.php");
require("Champ.php");
require("Animal.php");
require("AnimauxManager.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajout</title>
    <link rel="stylesheet" href="ajoutcss.css">
</head>
<body>
    <?php
    $form = new Form('#');
    $nom = new Champ('nom','nom','text');
    $espece = new Champ('espece','espece','text');
    $cri = new Champ('cri','cri','text');
    $proprietaire = new Champ('proprietaire','proprietaire','text');
    $age = new Champ('age','age','text');
    $go = new Champ('','ajouter','submit','ajouter');
    $form->add($nom);
    $form->add($espece);
    $form->add($cri);
    $form->add($proprietaire);
    $form->add($age);
    $form->add($go);
    echo $form->__toString();
    ?>
</body>
</html>

<?php
if(isset($_POST['ajouter'])){
    if(isset($_POST['nom']) && isset($_POST['espece']) && isset($_POST['cri']) && isset($_POST['proprietaire']) && isset($_POST['age'])){
        $a = new Animal;
        $a->setNom($_POST['nom']);
        $a->setEspece($_POST['espece']);
        $a->setCri($_POST['cri']);
        $a->setProprietaire($_POST['proprietaire']);
        $a->setAge($_POST['age']);
        $db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81');
        $manager = new AnimauxManager($db);
        $manager->add($a);
    }
}
?>