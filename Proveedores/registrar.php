<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configProveedores.php');
        
        $proveedor= new Proveedor();

        $proveedor->setNombre($_POST['nombre']);
        $proveedor->setTelefono($_POST['telefono']);
        $proveedor->setCiudad($_POST['ciudad']);
        $proveedor->insertData();


        echo"<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='proveedores.php'</script>";

    }



?>