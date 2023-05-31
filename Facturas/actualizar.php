<?php

    require_once("configFacturas.php");
    require_once("../Empleados/configEmpleados.php");
    require_once("../Clientes/configClientes.php");
    $data = new Factura();

    $id= $_GET['facturaId'];
    
    $empleados = new Empleado();
    $clientes = new Cliente();
    
    $data->setFacturaId($id);
    $all= $data ->selectId();

    $allEmpleados = $empleados->selectAll();
    $allCientes = $clientes->selectAll();

    $record = $data->selectOne();

    $val = $record[0];


    if(isset($_POST['editar'])){
        $data-> setEmpleadoId($_POST['empleadoId']);
        $data-> setClienteId($_POST['clienteId']);
        $data-> setFecha($_POST['fecha']);
        
        $data-> update();

        echo "<script>alert('Datos actualizados exitosamente'); document.location='facturas.php'</script>";

    }



?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Empleado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Empleados</h3>
        <img src="images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3 >Empleados</h3>
      </div>
      <div class="menus">
        <a href="home.html" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Home</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Factura a editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombres" class="form-label">EmpleadoId</label>
                <select name="empleadoId" id="empleadoId" class="form-select">
                <option value="seleccione">Seleccion</option>

                    <?php
                    foreach($allEmpleados as $Key=> $value ){
                      ?>

                  <option value="<?php echo $value['empleadoId']?>"><?php echo $value['nombre']?></option>

                  <?php }; ?>
                </select>
                
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">ClienteId</label>
                <select name="clienteId" id="clienteId" class="form-select">

                    <?php
                    foreach($allCientes as $Key=> $value ){
                      ?>
                  <option value="seleccione">Seleccion</option>
                  <option value="<?php echo $value['clienteId']?>"><?php echo $value['compañia']?></option>

                  <?php }; ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Fecha</label>
                <input 
                  type="Date"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                  value= "<?php echo $val['fecha'];?>" 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Factura</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>