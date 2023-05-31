<?php
    require_once("configCategorias.php");

    $record = new Categoria;

    if(isset($_GET['categoriaId']) && isset($_GET['req'])){
        if($_GET['req']== "delete"){
            $record -> setCategoriaId($_GET['categoriaId']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente'); document.location='superMarket.php'</script>";
        }
    }


?>