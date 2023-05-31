<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);



    require_once("../Config/config.php");

    class Proveedor extends Conexion{
        private $proveedorId;
        private $nombre;
        private $telefono;
        private $ciudad;



        public function __construct($proveedorId=0,$nombre="",$telefono="",$ciudad="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->proveedorId=$proveedorId;
            $this->nombre=$nombre;
            $this->telefono=$telefono;
            $this->ciudad=$ciudad;
        }



        public function setProveedorId($proveedorId){
            return $this->proveedorId=$proveedorId;
        }

        public function getProveedorId(){
            return $this->proveedorId;
        }

        public function setNombre($nombre){
            return $this->nombre=$nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setTelefono($telefono){
            return $this->telefono=$telefono;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function setCiudad($ciudad){
            return $this->ciudad=$ciudad;
        }

        public function getCiudad(){
            return $this->ciudad;
        }


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO proveedores(proveedorId,nombre,telefono,ciudad) VALUES(?,?,?,?)");
                $stm->execute([$this->proveedorId,$this->nombre,$this->telefono,$this->ciudad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM proveedores");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM proveedores WHERE proveedorId=?");
                $stm->execute([$this->proveedorId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM proveedores WHERE proveedorId=?");
                $stm->execute([$this->proveedorId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE proveedores SET nombre=?,telefono=?,ciudad=? WHERE proveedorId = ?");
                $stm->execute([$this->nombre,$this->telefono,$this->ciudad,$this->proveedorId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    

?>