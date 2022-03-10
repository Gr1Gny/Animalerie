<?php
class Champ {
    private $name;
    private $type;
    private $label;
    private $value;
   
    function __construct(string $label, string $name, string $type, string $value=""){
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }


    public function __toString()
    {
        return '<label for="' . $this->name . '">' . $this->label . '</label><input type="' . 
        $this->type . '" name="' . $this->name . '" value="' . $this->value . '" />';
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getName()
    {
        return $this->name;
    }

}

?>