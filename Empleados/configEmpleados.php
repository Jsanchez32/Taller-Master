<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);



    require_once("../Config/config.php");

    class Empleado extends Conexion{
        private $empleadoId;
        private $nombre;
        private $celular;
        private $direccion;
        private $imagen;



        public function __construct($empleadoId=0,$nombre="",$celular="",$direccion="",$imagen="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->empleadoId=$empleadoId;
            $this->nombre=$nombre;
            $this->celular=$celular;
            $this->direccion=$direccion;
            $this->imagen=$imagen;
        }



        public function setEmpleadoId($empleadoId){
            return $this->empleadoId=$empleadoId;
        }

        public function getEmpleadoId(){
            return $this->categoriaId;
        }

        public function setNombre($nombre){
            return $this->nombre=$nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setCelular($celular){
            return $this->celular=$celular;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setDireccion($direccion){
            return $this->direccion=$direccion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setImagen($imagen){
            return $this->imagen=$imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO empleados(empleadoId,nombre,celular,direccion,imagen) VALUES(?,?,?,?,?)");
                $stm->execute([$this->empleadoId,$this->nombre,$this->celular,$this->direccion,$this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM empleados");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM empleados WHERE empleadoId=?");
                $stm->execute([$this->empleadoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM empleados WHERE empleadoId=?");
                $stm->execute([$this->empleadoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE empleados SET nombre=?,celular=?,direccion=?,imagen=? WHERE empleadoId = ?");
                $stm->execute([$this->nombre,$this->celular,$this->direccion,$this->imagen,$this->empleadoId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    

?>