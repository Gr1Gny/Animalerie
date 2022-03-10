<?php
class Form {
    private $champs = array();
    private $action;
   
    function __construct(string $action)
    {
        $this->action = $action;
    }

    public function __toString()
    {
        $form = '<form method=post action="' . $this->action . '">';
        foreach($this->champs as $element){
            $form .= $element->__toString() . '<br>';
        }
        $form .= '</form>';
        return $form;
    }

    public function add(Champ $champs){
        array_push($this->champs, $champs);
    }

    function hydrate(array $donnees){
        $this->champs = $donnees;
    }

    function __toStringResultat(){
        $form = '';
        foreach($this->champs as $element){
            $form .= $element->getName() . ' => ' . $element->getValue() . '<br>';
        }
        return $form;
    }
}

?>