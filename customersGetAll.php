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
                    
//            echo 2;    
            $db->setTable('tb_customers C');
            $db->setColumns('C.id AS cid, A.id AS aid, C.firstname, C.lastname, A.street, A.zip, A.city');
            $db->setjoin('tb_addresses A', DbClassExt::INNER, 'C.id', 'A.cid');
            $data = $db->getData();
//            var_dump($data);
            
            echo json_encode($data);
            
