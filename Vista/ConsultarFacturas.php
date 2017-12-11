<!DOCTYPE html>
<?php
session_start();
include('../Modelo/Conexion.php');
$conection = new Conexion();
if (@!$_SESSION['empleado']){
    header("Location: ../Vista/Errores/SinPermiso.php");
}
?>
<!---
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 23/11/2017
 * Time: 00:23
 */--->
<html lang="en">

<head>
    <title>INBIOSER</title>
    <link rel="shortcut icon" href="../Vista/img/logo.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>


<body>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- Navbar. -->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded sticky-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        INBIOSER
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item " >
                <a class="nav-link" href="#" >
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Registro
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-center" href="RegistrarEmpleados.php"><i class="fa fa-user" aria-hidden="true"></i>
                        Empleados</a>
                    <a class="dropdown-item text-center" href="RegistrarClientes.php"><i class="fa fa-reddit-alien" aria-hidden="true"></i>
                        Clientes</a>
                    <a class="dropdown-item text-center" href="RegistrarProducto.php"><i class="fa fa-gift" aria-hidden="true"></i>
                        Productos</a>

                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    Consultas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-center" href="ConsultarFacturas.php"><i class="fa fa-hospital-o" aria-hidden="true"></i>
                        Facturas</a>
                    <a class="dropdown-item text-center " href="RegistrarClientes.php"><i class="fa fa-globe" aria-hidden="true"></i>
                        consulta general</a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contactenos.php">
                    <i class="fa fa-compress" aria-hidden="true"></i>
                    Contactenos
                </a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-outline-info mx-2 my-2 my-sm-0" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
                Consulta</button>
            <?php if(isset($_SESSION['empleado'])||isset($_SESSION['cliente'])){
                ?>

                <div class="dropdown ml-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <i><?php if (isset($_SESSION['empleado'])){echo $_SESSION['empleado'];} if (isset($_SESSION['cliente'])){ echo $_SESSION['cliente'];}?></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="../Controlador/CerrarSesion.php">cerrar session</a>
                    </div>
                </div>

                <?php
            }else{
                ?>
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    log in
                </button>
                <?php
            }
            ?>
        </form>
    </div>
</nav>

<!-- Modal. -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="../Controlador/InicioSesion.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Iniciar sesíon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>
                        <input name="usuario" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Documento">
                    </div>
                    <br>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <input name="contraseña" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Contraseña">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        Salir</button>
                    <button type="submit" name="login" class="btn btn-info">
                        <i class="fa fa-share-square-o" aria-hidden="true"></i>
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ordencompra. -->
<div class="container">
    <div class="mt-5 mb-5" style="width: " role="document">
        <div class="modal-content">
            <form action="ConsultarFacturas.php" method="post">
                <div class="modal-header">
                    <h1>Facturas</h1>
                    <i class="fa fa-hospital-o fa-5x" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id factura</th>
                            <th>fecha</th>
                            <th>cliente</th>
                            <th>seleccionar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $consulta = "SELECT f.ID_FACTURA, f.FECHAR, C.ID_Cliente, c.NOMAPE_Cliente FROM tlbFactura f INNER JOIN tblCliente c ON f.ID_Cliente = c.ID_Cliente ";
                        $resultado = mysqli_query($conection->conectarMysql(),$consulta);

                        while($row = mysqli_fetch_array($resultado)){
                            $consulta2 = "SELECT ID_FACTURA from tblEnvio E WHERE E.ID_FACTURA = '".$row['ID_FACTURA']."'";
                            $resultado2 = mysqli_query($conection->conectarMysql(),$consulta2);
                            $row2 = mysqli_fetch_array($resultado2);

                            if ($row2[0]==null){
                                echo
                                    '    
                <tr>
                <th scope="row">'.$row['ID_FACTURA'].'</th>
                <td>'.$row['FECHAR'].'</td>
                <td>'.$row['NOMAPE_Cliente'].'</td>
                <td> <input type="checkbox" class="form-check-input" name="factura[]" value="'.$row['ID_FACTURA'].'"></td>
                <input type="text" class="form-check-input" name="nombreCli[]" value="'.$row['NOMAPE_Cliente'].'" hidden>
                <input type="text" class="form-check-input" name="idClient[]" value="'.$row['ID_Cliente'].'" hidden>
                </tr>
                                ';
                            }

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                    <button type="submit" name="login" class="btn btn-info">
                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        consultar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

if (!empty($_POST['factura'])&& !empty($_POST['nombreCli'])&& !empty($_POST['idClient'])){
    $VeccFactura = $_POST['factura'];
    $nom = $_POST['nombreCli'];
    $idCliente = $_POST['idClient'];
    for ($z = 0; $z < sizeof($VeccFactura);$z++){
        $consultaDetalleFact = "SELECT C.NOMAPE_Cliente, DF.ID_ITEM,P.PRE_Producto, P.NOM_Producto, DF.CANTIDAD FROM tblProducto P INNER JOIN tblDETALLE_FACTURA DF 
ON P.ID_Producto = DF.ID_Producto INNER JOIN tlbFactura F
ON F.ID_FACTURA = DF.ID_FACTURA INNER JOIN tblCliente C
ON F.ID_Cliente = C.ID_Cliente where F.ID_FACTURA = '".$VeccFactura[$z]."';";
        $respues = mysqli_query($conection->conectarMysql(),$consultaDetalleFact);
        ?>
        <form action="../Controlador/DespacharPedicoC.php" method="post">
            <div class="container mb-5">
                <div class="" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Orden de compra para el cliente [<?php echo $nom[$z]; ?>] con factura [<?php echo $VeccFactura[$z]; ?>]</h5>
                            <input type="text" class="form-check-input" name="IDfactura" value="<?php echo $VeccFactura[$z]; ?>" hidden>
                            <input type="text" class="form-check-input" name="IDcliente" value="<?php echo $idCliente[$z]; ?>" hidden>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th># item</th>
                                    <th>nombre del producto</th>
                                    <th>precio de producto </th>
                                    <th>cantidad de producto </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total = 0; $totalCanti = 0;
                                while($row = mysqli_fetch_array($respues)){
                                    $total = $total + $row['PRE_Producto'];
                                    $totalCanti = $totalCanti + $row['CANTIDAD'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['ID_ITEM']; ?></th>
                                        <td><?php echo $row['NOM_Producto']; ?></td>
                                        <td><?php echo number_format($row['PRE_Producto']); ?></td>
                                        <td><?php echo number_format($row['CANTIDAD']); ?></td>
                                    </tr>
                                    <?php
                                }

                                ?>
                                <tr>
                                    <th scope="row">*</th>
                                    <td><strong>total</strong></td>
                                    <td><?php echo number_format($total); ?></td>
                                    <td><?php echo $totalCanti; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                Despachar pedido
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
}
?>

</body>
</html>
