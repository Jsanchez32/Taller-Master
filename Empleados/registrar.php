<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configEmpleados.php');
        
        $empleado= new Empleado();

        $empleado->setNombre($_POST['nombre']);
        $empleado->setCelular($_POST['celular']);
        $empleado->setDireccion($_POST['direccion']);
        $empleado->setImagen($_POST['imagen']);
        $empleado->insertData();


        echo"<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='empleados.php'</script>";

    }



?>