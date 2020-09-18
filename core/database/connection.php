<?php
    class Connection{
        public static function make($config){
            try {
                $con = $config['connection'];
                
                $pdo = new PDO(
                    "mysql:host=".$con['host'].";dbname="
                    .$con['db_name'], 
                    $con['username'],
                    $con['password']
                );

            } catch (Exception $e) {
                // echo $e->getMessage();
                echo " <br> Can not connect to database"; die();
            }
            return $pdo;
        }
    }

?>