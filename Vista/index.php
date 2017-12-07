<!DOCTYPE html>
<?php
session_start();
include ('../Modelo/Conexion.php');
$conection = new Conexion();
$consulta = "SELECT ID_Producto,NOM_Producto,PRE_Producto,DCN_Producto,IMG_Producto,Cantidad FROM tblProducto";
?>
<!--
/**
 * Created by PhpStorm.
 * User: camilo mejia monsalve 
 * Date: 22/12/2017
 * Time: 22:03
 */-->
<html lang="en">

<head>
    <title>INBIOSER</title>
    <link rel="shortcut icon" href="../Vista/img/icon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

<?php 
include("carusel.php");
 ?>

<!-- Navbar. -->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded sticky-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="index.php">
        <img src="img/icon.png" width="60" height="60" class="" alt="">
        INBIOSER
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item active" >
                <a class="nav-link" href="index.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Registrar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                    if (isset($_SESSION['empleado'])){
                        ?>
                        <a class="dropdown-item text-center" href="RegistrarEmpleados.php"><i class="fa fa-user" aria-hidden="true"></i>
                            Empleados</a>
                        <?php
                    }else{
                        ?>
                        <a class="dropdown-item text-center disabled" href="RegistrarEmpleados.php"><i class="fa fa-user" aria-hidden="true"></i>
                            Empleados</a>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['empleado'])){
                        ?>
                        <a class="dropdown-item text-center" href="RegistrarClientes.php"><i class="fa fa-reddit-alien" aria-hidden="true"></i>
                            Clientes</a>
                        <?php
                    }elseif(isset($_SESSION['cliente'])){
                        ?>
                        <a class="dropdown-item text-center disabled" href="RegistrarClientes.php"><i class="fa fa-reddit-alien"
                                                                                             aria-hidden="true"></i>
                            Clientes</a>
                        <?php
                    }else{
                        ?>
                        <a class="dropdown-item text-center" href="RegistrarClientes.php"><i class="fa fa-reddit-alien"
                                                                                                      aria-hidden="true"></i>
                            Clientes</a>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['empleado'])){
                        ?>
                        <a class="dropdown-item text-center" href="RegistrarProducto.php"><i class="fa fa-gift" aria-hidden="true"></i>
                            Productos</a>
                        <?php
                    }else{
                        ?>
                        <a class="dropdown-item text-center disabled" href="RegistrarProducto.php"><i class="fa fa-gift" aria-hidden="true"></i>
                            Productos</a>
                        <?php
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown">

                <?php
                if (isset($_SESSION['empleado'])){
                    ?>
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        Consultas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-center" href="ConsultarFacturas.php"><i class="fa fa-hospital-o" aria-hidden="true"></i>
                            Facturas</a>
                        <a class="dropdown-item text-center " href="ConsultaGeneralSistema.php"><i class="fa fa-globe" aria-hidden="true"></i>
                            consulta general</a>

                    </div>
                    <?php
                }else{
                    ?>
                    <a class="nav-link dropdown-toggle disabled" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        Consultas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-center" href="ConsultarFacturas.php"><i class="fa fa-hospital-o" aria-hidden="true"></i>
                            Facturas</a>
                        <a class="dropdown-item text-center " href="ConsultaGeneralSistema.php"><i class="fa fa-globe" aria-hidden="true"></i>
                            consulta general</a>

                    </div>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contactenos.php" >
                    <i class="fa fa-compress" aria-hidden="true" ></i>
                    Contactenos
                </a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-outline-info mx-2 my-2 my-sm-0" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
                Consulta</button>
            <!--
            esta condición revisa que la sesión está iniciada por cliente o por usuario,
             de manera que si está iniciada mostrará el drop dow list con el nombre del
              cliente y la opción de cerrar sesión, de lo contrario mostrará el botón e iniciar sesión,
               el cual activa el modal que esta escrito después de toda la etiqueta nav para que se ingresen
                los campos de documento y contraseña
                -->
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
                    Iniciar Sesíon
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
                        <input name="usuario" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Documento" required>
                    </div>
                    <br>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <input name="contraseña" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Contraseña" required>
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

<!-- Productos. -->
<div class="container">
    <div class="mt-5 mb-5" style="width: " role="document">
        <div class="modal-content">
            <form action="FacturarCompra.php" method="post">
                <div class="modal-header">
                    <h1>Productos</h1>
                </div>
                <div class="modal-body row">
                    <!-- este formulario se envía al archivo php facturar compra,
                     pero antes de eso, se consulta en la base de datos los productos
                      registrados con los campos a mostrar en la página web, en caso de que la
                       conexión no sea exitosa, el programa redireccionará al cliente a una página que
                        le mostrara un error de conexión con la base de datos, en este momento solo le menciona el error,
                         mas no le muestra exhaustivamente cuál es. . -->
                    <?php
                    $resultado = mysqli_query($conection->conectarMysql(),$consulta);
                    if ($conection->conectarMysql() == false){
                        header("Location: ../Vista/Errores/FalloConexionDB.php");
                    }else{
                        /*
                         *  si la conexión es exitosa el programa procederá a crear un arreglo con los datos de la consulta,
                         *  a este arreglo le llamaremos $row y con un bucle while lo recorremos para mostrar imprimir la
                         *  información en pantalla.
                         * aquí también creamos una etiqueta input de tipo checkbox que tendrá como nombre “productos[ ]”y tendrá
                         * los corchetes para indicar al formulario de destino que va a recibir un arreglo,
                         * el valor de esta etiqueta input es el id del producto, de esta forma sabemos sacar
                         * el precio a los productos seleccionados, en caso tal de que el cliente no seleccione
                         * productos éste será redirigido a una ventana informativa que le indica que debe seleccionar productos.
                         * */
                        $n = 0;
                        while($row = mysqli_fetch_array($resultado)){
                            $ruta_img = $row['IMG_Producto'];
                            echo
                                '
                            <div class="col-sm-4 col-xs-2">
                                <div class="card m-2" style="width: 20rem;height: 90vh;">
                                    <img class="card-img-top" style="height: 40vh;" src="../Controlador/fotos/'.$ruta_img.'" alt="Card image cap">
                                    <div class="card-block">
                                        <hr class="my-0">
                                        <p>
                                        <h4 class="card-title">'.$row['NOM_Producto'].'</h4>
                                        <br>
                                        <p><strong>Modelo:</strong> '.$row['DCN_Producto'].'</p>
                                        <br>
                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-addon">
                                                <i class="fa fa-money fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <input type="text" value="'.number_format($row['PRE_Producto']).'" class="form-control" id="inlineFormInputGroup" readonly>
                                            <!-- este arreglo de cantidades queridas por el usuario tiene un problema,
                                            acumula todas las cantidades existentes en un arreglo y lo envia al formulario FacturarCompra,
                                            de esta manera cuando el formulario recorra el arreglo no sabre distinguir que cantidad hace parte de que articulo--->
                                            <input name="cantidadQuerida[]" type="number" value="'.$row['Cantidad'].'" min="1"  class="form-control" id="inlineFormInputGroup" >
                                        </div>
                                        </p>    
                                        <hr class="my-4">
                                        <div class="form-check mb-1">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="producto[]" value="'.$row['ID_Producto'].'">
                                            <!--- indica los campos que hay que revisar del vector que tiene todas las cantidades---->
                                            <i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>
                                            Añadir al carrito
                                          </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            $n++;
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">

                    <button type="submit" name="login" class="btn btn-info">
                        <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i>
                        Facturar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>