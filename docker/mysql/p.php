ssshoe tables
<?php

class DB {

    function __construct(){
        try{
            $this->con = new PDO (
                'mysql:host=a_level_mysql;dbname=phenix', 'root', 'cbece_gead-cebfa');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
}

$db = new DB();

print_r($db->con->query("select distinct title, type from fruits")->fetchAll());
