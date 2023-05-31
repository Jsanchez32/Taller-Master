<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configClientes.php');
        
        $categoria= new Cliente();

        $categoria->setCelular($_POST['celular']);
        $categoria->setCompañia($_POST['compañia']);
        $categoria->insertData();


        echo"<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='clientes.php'</script>";

    }
 


?>