<?php
    require_once("../Config/db.php");
    class Conexion{
        protected $dbCnx;

        
        public function __construct($dbCnx){
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] );
        }
    }



?>