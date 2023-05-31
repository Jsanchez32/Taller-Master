<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);



    require_once("../Config/config.php");

    class Factura extends Conexion{
        private $facturaId;
        private $empleadoId;
        private $clienteId;
        private $fecha;


        public function __construct($facturaId=0,$empleadoId="",$clienteId="",$fecha="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->facturaId=$facturaId;
            $this->empleadoId=$empleadoId;
            $this->clienteId=$clienteId;
            $this->fecha=$fecha;
        }



        public function setFacturaId($facturaId){
            return $this->facturaId=$facturaId;
        }

        public function getFacturaId(){
            return $this->facturaId;
        }

        public function setEmpleadoId($empleadoId){
            return $this->empleadoId=$empleadoId;
        }

        public function getEmpleadoId(){
            return $this->empleadoId;
        }

        public function setClienteId($clienteId){
            return $this->clienteId=$clienteId;
        }

        public function getClienteId(){
            return $this->clienteId;
        }

        public function setFecha($fecha){
            return $this->fecha=$fecha;
        }

        public function getFecha(){
            return $this->fecha;
        }


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO facturas(facturaId,empleadoId,clienteId,fecha) VALUES(?,?,?,?)");
                $stm->execute([$this->facturaId,$this->empleadoId,$this->clienteId,$this->fecha]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM facturas");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM facturas WHERE facturaId=?");
                $stm->execute([$this->facturaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM facturas WHERE facturaId=?");
                $stm->execute([$this->facturaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE facturas SET empleadoId=?,clienteId=?,fecha=? WHERE facturaId = ?");
                $stm->execute([$this->empleadoId,$this->clienteId,$this->fecha,$this->facturaId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectId(){
            try {
                $stm=$this->dbCnx->prepare("SELECT facturas.facturaId, empleados.nombre , clientes.compañia, facturas.fecha 
                FROM facturas
                JOIN empleados ON facturas.empleadoId = empleados.empleadoId 
                JOIN clientes  ON facturas.clienteId = clientes.clienteId;");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    

?>
                