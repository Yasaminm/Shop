<?php

/**
 * Description of Customer
 *
 * @author PR06
 */
class Customer {
    
    private $firstname;
    private $lastname;
    private $cid;
    private $addressid;


    public static $amount = 0;


    public function __construct($fn, $ln) {
        
        $this->firstname = filter_var($fn, FILTER_SANITIZE_STRING);
        $this->lastname = filter_var($ln, FILTER_SANITIZE_STRING);
        $this->cid = $this->addCustomer($this->firstname, $this->lastname);
        self::$amount++;
        
    }
    private function addCustomer() {
//        return lastid();
    }
    public function addAdress($s, $z, $c, $country) {
        //$this->id;
    }
    ////////////////////////////////////////
//    public function setLastName($ln) {
//        $this->lastname = $ln;
//    }
//    
//    public function getLastName() {
//        return $this->lastname;
//    }
    ////////////////////////////////////////
    
    public function lastName($ln = NULL) {
        if($ln === NULL){
            return $this->lastname;
        }
        $name = filter_var($ln, FILTER_SANITIZE_STRING);
        if(is_string($name)){
        $this->lastname = $ln;
        }
    }
    public function firstName($fn = NULL) {
        if($fn === NULL){
            return $this->firstname;
        }
        $name = filter_var($fn, FILTER_SANITIZE_STRING);
        if(is_string($name)){
        $this->lastname = $fn;
        }
    }
    
}


$c1 = new Customer('yasamin',' mustamandi');
$c2 = new Customer('yasamin',' mustamandi');
//$c1->lastName('Braune');
//echo $c1->firstName();
//echo $c1->lastName();
echo '<br>Anzahl angelegter Kunden: '. $c1::$amount;
echo '<br>Anzahl angelegter Kunden: '. Customer::$amount;