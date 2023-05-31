<?php
    require_once("configClientes.php");

    $record = new Cliente;

    if(isset($_GET['clienteId']) && isset($_GET['req'])){
        if($_GET['req']== "delete"){
            $record -> setClienteId($_GET['clienteId']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente'); document.location='clientes.php'</script>";
        }
    }


?>