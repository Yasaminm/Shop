<?php

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

require_once './classes/Customer.php';
require_once './classes/Address.php';


try {   //DB connection:
            $db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exc) {
                echo $exc->getCode();
            }