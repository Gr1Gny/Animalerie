<?php

Class Animal{
    private $id;
    private $nom;
    private $espece;
    private $cri;
    private $proprietaire;
    private $age;

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEspece() {
        return $this->espece;
    }

    public function getCri() {
        return $this->cri;
    }

    public function getProprietaire() {
        return $this->proprietaire;
    }

    public function getAge() {
        return $this->age;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEspece($espece) {
        $this->espece = $espece;
    }

    public function setCri($cri) {
        $this->cri = $cri;
    }

    public function setProprietaire($proprietaire) {
        $this->proprietaire = $proprietaire;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function __toString(){
        return '<h3>' . $this->nom . '</h3><br>
                <p>id : ' . $this->id . '</p><br>
                <p>espece : ' . $this->espece . '</p><br>
                <p>cri : ' . $this->cri . '</p><br>
                <p>proprietaire : ' . $this->proprietaire . '</p><br>
                <p>age : ' . $this->age . '</p><br>';
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $methode = 'set'.ucfirst($key);
            if (method_exists($this, $methode)){
                $this->$methode($value);
            }
        }
    }
       
}

?>