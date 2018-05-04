<?php

class Labels {

    private $label;

    public function __construct($param) {
        $this->label($param);
    }

    public function label($param = NULL) {
        if ($param === NULL) {
            return $this->label;
        }
//  $name = filter_var($param, FILTER_SANITIZE_STRING);
        if ($param) {
            $this->label = $param;
        }
    }

}

//$label = new Labels('Guss');
//var_dump($label);