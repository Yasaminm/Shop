<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
require_once './classes/Customer.php';
require_once './classes/Address.php';
require_once './classes/Product.php';
require_once './classes/Labels.php';


try {   //DB connection:
            $db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exc) {
                echo $exc->getCode();
            }

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
/////////////////////////////////////////////
            //
//var_dump($label);
  $label = new Labels('MAC');       
  $prd = new Product('Party Kleid', '892SFE', 450, $label);
//  var_dump($prd->label());
//var_dump($label);
  $prd->insert($db);
  $found = $prd->find($db, 'Party Kleid');
  var_dump($found);
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>PHP 21 Ajax Muster</title>
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
              <input class="form-control" required type="text" name="fname">
          </label>
          <label>Last Name: 
              <input class="form-control" required type="text" name="lname">
          </label>
          <hr>
          <h3>Please fill the address:</h3>
          <hr>    
          <label>Street: 
              <input class="form-control" required type="text" name="address">
          </label>
          <label>Zip: 
              <input class="form-control" required type="text" name="zip">
          </label>
          <label>City: 
              <input class="form-control" required type="text" name="city">
          </label>
          <hr>
                <button class="btn btn-outline-primary" type='submit' name='submit'>Sign Up</button>
            </form>
      
  </div>
 </body>
</html>
