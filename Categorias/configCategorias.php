<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);



    require_once("../Config/config.php");

    class Categoria extends Conexion{
        private $categoriaId;
        private $nombre;
        private $descripcion;
        private $imagen;


        public function __construct($categoriaId=0,$nombre="",$descripcion="",$imagen="",$dbCnx=""){
            parent :: __construct($dbCnx);
            $this->categoriaId=$categoriaId;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->imagen=$imagen;
        }



        public function setCategoriaId($categoriaId){
            return $this->categoriaId=$categoriaId;
        }

        public function getCategoriaId(){
            return $this->categoriaId;
        }

        public function setNombre($nombre){
            return $this->nombre=$nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setDescripcion($descripcion){
            return $this->descripcion=$descripcion;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setImagen($imagen){
            return $this->imagen=$imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }


        public function insertData(){
            try {
                $stm= $this->dbCnx->prepare("INSERT INTO categorias(categoriaId,nombre,descripcion,imagen) VALUES(?,?,?,?)");
                $stm->execute([$this->categoriaId,$this->nombre,$this->descripcion,$this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM categorias");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm=$this->dbCnx->prepare("DELETE FROM categorias WHERE categoriaId=?");
                $stm->execute([$this->categoriaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm=$this->dbCnx->prepare("SELECT * FROM categorias WHERE categoriaId=?");
                $stm->execute([$this->categoriaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE categorias SET nombre=?,descripcion=?,imagen=? WHERE categoriaId = ?");
                $stm->execute([$this->nombre,$this->descripcion,$this->imagen,$this->categoriaId]); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    

?>