<?php

Class AnimauxManager{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAnimal(int $id) {
        $q = $this->db->query('SELECT id, nom, espece, cri, proprietaire, age FROM animaux WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $animal = new Animal;
        $animal->hydrate($donnees);
        return $animal;
    }

    public function ListAnimal() {
        $animaux = array();
        $q = $this->db->query('SELECT id, nom, espece, cri, proprietaire, age FROM animaux ORDER BY id');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $animal = new Animal;
            $animal->hydrate($donnees);
            $animaux[] = $animal;
        }
        return $animaux;
    }

    public function add(Animal $animal) {
        $q = $this->db->prepare('INSERT INTO animaux SET nom = :nom, 
        espece = :espece, cri = :cri, proprietaire = :proprietaire, age = 
        :age');
        $q->bindValue(':nom', $animal->getNom());
        $q->bindValue(':espece', $animal->getEspece());
        $q->bindValue(':cri', $animal->getCri());
        $q->bindValue(':proprietaire', $animal->getProprietaire());
        $q->bindValue(':age', $animal->getAge());
        $q->execute();
    }

    public function update(Animal $animal) {
        $req = $this->db->prepare('UPDATE animaux SET nom = :nom, espece = :espece, cri = :cri, proprietaire = :proprietaire, age = :age Where id = :id');
        $req->execute(array(
            'nom' => $animal->getNom(),
            'espece' => $animal->getEspece(),
            'cri' => $animal->getCri(),
            'proprietaire' => $animal->getProprietaire(),
            'age' => $animal->getAge(),
            'id' => $animal->getId()
            ));
    }

    public function recherche(string $nom) {
        $req = $this->db->prepare('SELECT * FROM animaux WHERE nom = ?');
        $req->execute(array($nom));
        $animaux = array();
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $animal = new Animal;
            $animal->hydrate($donnees);
            $animaux[] = $animal;
        }
        return $animaux;
    }

    public function supprimer(Animal $animal) {
        $this->db->exec('DELETE FROM animaux WHERE id = '. $animal->getId());
    }

    public function rechercheFiltre(Animal $animal) {
        $s = 'SELECT * FROM animaux';
        $nbcritere = 0;
        if($animal->getNom() != "") {
            $s .= $this->AndOrWhere($nbcritere);
            $s .= ' nom = "' . $animal->getNom() . '"';
            $nbcritere ++;
        }
        if($animal->getEspece() != "") {
            $s .= $this->AndOrWhere($nbcritere);
            $s .= ' espece = "' . $animal->getEspece() . '"';
            $nbcritere ++;
        }
        if($animal->getCri() != "") {
            $s .= $this->AndOrWhere($nbcritere);
            $s .= ' cri = "' . $animal->getCri() . '"';
            $nbcritere ++;
        }
        if($animal->getProprietaire() != "") {
            $s .= $this->AndOrWhere($nbcritere);
            $s .= ' proprietaire = "' . $animal->getProprietaire() . '"';
            $nbcritere ++;
        }
        if($animal->getAge() != "") {
            $s .= $this->AndOrWhere($nbcritere);
            $s .= ' age = "' . $animal->getAge() . '"';
            $nbcritere ++;
        }
        $req = $this->db->query($s);
        $animaux = array();
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $animal = new Animal;
            $animal->hydrate($donnees);
            $animaux[] = $animal;
        }
        return $animaux;
    }

    public function AndOrWhere($nbcritere) {
        $s = '';
        if($nbcritere == 0){
            $s .= ' WHERE';
        }
        else{
            $s .= ' AND';
        }
        return $s;
    }
}   

?>