<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);



    require_once("../Config/config.php");

    class Cliente extends Conexion{
        private $clienteId;
        private $celular;
        private $compañia;



        public function __construct($clienteId=0,$celular="",$compañia="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->clienteId=$clienteId;
            $this->celular=$celular;
            $this->compañia=$compañia;
        }



        public function setClienteId($clienteId){
            return $this->clienteId=$clienteId;
        }

        public function getClienteId(){
            return $this->categoriaId;
        }

        public function setCelular($celular){
            return $this->celular=$celular;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCompañia($compañia){
            return $this->compañia=$compañia;
        }

        public function getCompañia(){
            return $this->compañia;
        }


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO clientes(clienteId,celular,compañia) VALUES(?,?,?)");
                $stm->execute([$this->clienteId,$this->celular,$this->compañia]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM clientes");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM clientes WHERE clienteId=?");
                $stm->execute([$this->clienteId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM clientes WHERE clienteId=?");
                $stm->execute([$this->clienteId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE clientes SET celular=?,compañia=? WHERE clienteId = ?");
                $stm->execute([$this->celular,$this->compañia,$this->clienteId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    

?>