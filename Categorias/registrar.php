<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configCategorias.php');
        
        $categoria= new Categoria();

        $categoria->setNombre($_POST['nombre']);
        $categoria->setDescripcion($_POST['descripcion']);
        $categoria->setImagen($_POST['imagen']);
        $categoria->insertData();


        echo"<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='superMarket.php'</script>";

    }



?>