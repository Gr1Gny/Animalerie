<?php

Class VueAnimal{
    private $animal;

    function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    public function __toString(){
        return '<tr>
        <td>' . $this->animal->getID() . '</td>
        <td>' . $this->animal->getNom() . '</td>
        <td>' . $this->animal->getEspece() .'</td>
        <td>' . $this->animal->getCri() . '</td>
        <td>' . $this->animal->getProprietaire() . '</td>
        <td>' . $this->animal->getAge() . '</td>
        <td><a href="modifier.php?id=' . $this->animal->getID() . '">modifier</a></td>        
        <td><a href="supprimer.php?id=' . $this->animal->getID() . '">supprimer</a></td>
        </tr>';
    }
}
?>