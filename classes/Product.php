<?php

class Product {

    private $pName;
    private $pNr;
    private $price;
    private $label;
    private $db;
    private static $amount = 0;

    public function __construct($pn, $pnr, int $price, Labels $label) {

        $this->pName($pn);
        $this->pNr($pnr);
        $this->price($price);
        $this->label($label);
//        $this->cid = $this->addCustomer($this->firstname, $this->lastname);
//        self::$amount++;
    }

    public function insert(DbClassExt $db) {
        $this->db = $db;
        $labelid = $this->addLabel();
        $this->addProduct($labelid);
    }

    private function addLabel() {
        $this->db->setTable('tb_labels');
        $data = [];
        $data['label'] = $this->label->label();
        return $this->db->insert($data);

        //insert into table
//        return lastid();
    }

    public function addProduct(int $lblid) {
        $this->db->setTable('tb_products');
        $data = [];
        $data['labelid'] = $lblid;
        $data['name'] = $this->pName();
        $data['productnr'] = $this->pNr();
        $data['price'] = $this->price();
        return $this->db->insert($data);
        //$this->id;
    }

    public static function find(DbClassExt $db, $param) {
        //select from table
        $db->setTable('tb_products');
        $findProduct = trim($param); //trim method clears unwanted space inside the variable.
        $db->setWhere("name='$findProduct'");
        return $db->getData();
    }

    public static function getAmount() {
        return self::$amount;
    }

    ///////////////////Set Variables////////////////////////////////////
    public function pName($param = NULL) {
        if ($param === NULL) {
            return $this->pName;
        }
        $name = filter_var($param, FILTER_SANITIZE_STRING);
        if (is_string($name)) {
            $this->pName = $name;
        }
    }

    public function pNr($param = NULL) {
        if ($param === NULL) {
            return $this->pNr;
        }
        $name = filter_var($param, FILTER_SANITIZE_STRING);
        if (is_string($name)) {
            $this->pNr = $name;
        }
    }

    public function price($param = NULL) {
        if ($param === NULL) {
            return $this->price;
        }
        $name = filter_var($param, FILTER_SANITIZE_STRING);
        if (is_string($name)) {
            $this->price = $name;
        }
    }

    public function label($lbl = NULL) {
        if ($lbl === NULL) {
            return $this->label;
        }
        if (is_object($lbl)) {
            $this->label = clone($lbl); // $adr is an object from Address class, inside is the (street, zip and city).
        }
    }

    //////////////////////////////////////////////////////
}
