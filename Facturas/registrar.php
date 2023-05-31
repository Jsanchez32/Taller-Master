<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configFacturas.php');
        
        $factura= new Factura();

        $factura->setEmpleadoId($_POST['empleadoId']);
        $factura->setClienteId($_POST['clienteId']);
        $factura->setFecha($_POST['fecha']);
        $factura->insertData();


        echo"<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='facturas.php'</script>";

    }



?>