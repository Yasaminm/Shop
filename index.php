<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
require_once './classes/Customer.php';
require_once './classes/Address.php';
require_once './classes/Product.php';
require_once './classes/Labels.php';


//

try {   //DB connection:
            $db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exc) {
                echo $exc->getCode();
            }

            $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
            $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
            
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
            $zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
            $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
            
            $labels = filter_input(INPUT_POST, 'labelname', FILTER_SANITIZE_STRING);
            $pname = filter_input(INPUT_POST, 'pname', FILTER_SANITIZE_STRING);
            $pnr = filter_input(INPUT_POST, 'pnr', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
            
//////////////////////Customer and Address////////////////////////
//$adr = new Address('Cauerstr 1', '10587', 'Berlin');
//$c = new Customer('yasamin','mustamandi', $adr);
//$c->insert($db);
////var_dump($c->address());//$adr is an object from Address class in Customer class so it is shown by var_dump.
////$adrc = $c->address();
////echo $adrc->street();
////echo nl2br($c->formatedAddress());
//$customerData = Customer::find($db, '    mustamandi');
//var_dump($customerData);
////////////////////////Product and Labels/////////////////////
            //
////var_dump($label);
//  $label = new Labels('MAC');       
//  $prd = new Product('Party Kleid', '892SFE', 450, $label);
////  var_dump($prd->label());
////var_dump($label);
//  $prd->insert($db);
//  $found = $prd->find($db, 'Party Kleid');
//  var_dump($found);
  ////////////////////////////////////////////////////////////////
//}
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>PHP 23 OOP PHP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="assets/css/styles.css">    
  <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/ajax.js" type="text/javascript"></script>
  <script src="assets/js/main.js" type="text/javascript"></script>
 </head>
 <body>
  <div class="container">
      
      <form method="post" action="index.php">
          <hr>
          <h3>Please fill your name and family name:</h3>
          <hr>
          <label>First Name: 
              <input class="form-control"  type="text" name="fname">
          </label>
          <label>Last Name: 
              <input class="form-control"  type="text" name="lname">
          </label>
          <hr>
          <h3>Please fill the address:</h3>
          <hr>    
          <label>Street: 
              <input class="form-control"  type="text" name="address">
          </label>
          <label>Zip: 
              <input class="form-control"  type="text" name="zip">
          </label>
          <label>City: 
              <input class="form-control"  type="text" name="city">
          </label>
          <hr>
          <h3>Please add a Product:</h3>
          <hr>    
           <label>Label name: 
              <input class="form-control" required type="text" name="labelname">
          </label>
          <label>Product name: 
              <input class="form-control" required type="text" name="pname">
          </label>
          <label>Product Nr: 
              <input class="form-control" required type="text" name="pnr">
          </label>
          <label>Price: 
              <input class="form-control" required type="text" name="price">
          </label>
                <button class="btn btn-outline-primary" type='submit' name='submit'>Insert</button>
            </form>
      
  </div>
     <?php
     if(isset($_POST['submit'])){
   $adr = new Address($address, $zip, $city);
   $c = new Customer($fname, $lname, $adr);
   $c->insert($db);
  $label = new Labels($labels);       
  $prd = new Product($pname, $pnr, $price, $label);
  $prd->insert($db);
//  $found = $prd->find($db, 'Party Kleid');
//  var_dump($found);
     }
     ?>
 </body>
</html>
