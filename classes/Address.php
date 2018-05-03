<?php

/**
 * Description of Address
 *
 * @author PR06
 */
class Address {
    private $street;
    private $zip;
    private $city;
    
    public function __construct($street, $zip, $city) {
        $this->street = filter_var($street, FILTER_SANITIZE_STRING);
         $this->zip = filter_var($zip, FILTER_SANITIZE_STRING);
         $this->city = filter_var($city, FILTER_SANITIZE_STRING);
    }
    
    public function street($street = NULL) {
        if($street === NULL){
            return $this->street;
        }
        $st = filter_var($street, FILTER_SANITIZE_STRING);
        if(is_string($st)){
        $this->street = $st;
        }
    }
    
     public function zip($zip = NULL) {
        if($zip === NULL){
            return $this->zip;
        }
        $zp = filter_var($zip, FILTER_SANITIZE_NUMBER_INT);
        if(is_numeric($zp)){
        $this->zip = $zp;
        }
    }
    
    public function city($city = NULL) {
        if($city === NULL){
            return $this->city;
        }
        $cty = filter_var($city, FILTER_SANITIZE_STRING);
        if(is_string($cty)){
        $this->city = $cty;
        }
    }
}
//
//$ad = new Address('Cauerstr 1', '10587', 'Berlin');
//$ad->zip('022a55'); //'FILTER_SANITIZE_NUMBER_INT' filter makes it easy to work with numbers that have 0 as first position.
//echo $ad->zip();
