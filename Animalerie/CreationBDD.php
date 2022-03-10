<?php

include 'menu.php';

require("Form.php");
require("Champ.php");

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
    $dbname = new Champ('dbname','dbname','text');
    $user = new Champ('user','user','text');
    $pass = new Champ('pass','pass','text');
    $creer = new Champ('','creer','submit','creer');
    $form->add($dbname);
    $form->add($user);
    $form->add($pass);
    $form->add($creer);
    echo $form->__toString();  
    ?>
</body>
</html>

<?php

if(isset($_POST['creer'])){
    try {
        //$db = new PDO('mysql:host=localhost;dbname=grp-351_s3_progweb', 'grp-351', 'ab0pja81',
        //array(
        //PDO::ATTR_ERRMODE =>
        //PDO::ERRMODE_EXCEPTION)
        //);
        $database = $_POST['dbname'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $db = new PDO('mysql:host=localhost;dbname=' . $database, $user, $pass,
        array(
        PDO::ATTR_ERRMODE =>
        PDO::ERRMODE_EXCEPTION)
        );

        $table = 'CREATE TABLE animaux (
            id int(11) AUTO_INCREMENT,
            nom varchar(50) NOT NULL,
            espece varchar(50) NOT NULL,
            cri varchar(50) NOT NULL,
            proprietaire varchar(50) NOT NULL,
            age int(11) NOT NULL,
            PRIMARY KEY(id)
        )';

        $db->exec($table);

        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'teddy\', \'ours\', \'graouu\', \'jean  philipe\', 27)');
        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'lo potit chat\', \'chat\', \'miaouuuu\', \'philipin\', 9)');
        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'lo potit chien\', \'chien\', \'wafff\', \'teodort\', 6)');
        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'stitch\', \'rex\', \'grrrr\', \'lilo\', 5)');
        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'itachi\', \'humain\', \'amaterasu\', \'personne\', 22)');
        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'itachi\', \'humain\', \'susano\', \'personne\', 22)');
        $db->exec('INSERT INTO animaux (nom, espece, cri, proprietaire, age) VALUES (\'itachi\', \'humain\', \'sasukeeee\', \'personne\', 22)');
    }
    catch (Exception $e) {
        echo '<p>valeurs incorrectes</p>';
    }
    
}

?>