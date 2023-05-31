<?php
    require_once("configEmpleados.php");

    $record = new Empleado;

    if(isset($_GET['empleadoId']) && isset($_GET['req'])){
        if($_GET['req']== "delete"){
            $record -> setEmpleadoId($_GET['empleadoId']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente'); document.location='empleados.php'</script>";
        }
    }


?>