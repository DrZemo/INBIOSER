<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['empleado']){
    header("Location: ../Vista/Errores/SinPermiso.php");
}
?>
<!---
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 23:18
 */-->
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
                <a class="nav-link" href="index.php" >
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item " >
                <a class="nav-link active" href="RegistrarProducto.php" >
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Registrar Producto
                </a>
            </li>
            <li class="nav-item " >
                <a class="nav-link " href="ActualizarProducto.php" >
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    Actualizar Producto
                </a>
            </li>
            <li class="nav-item " >
                <a class="nav-link " href="EliminarProducto.php" >
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    Eliminar Producto
                </a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <?php if(isset($_SESSION['empleado'])||isset($_SESSION['cliente'])){
                ?>

                <div class="dropdown ml-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <i><?php if (isset($_SESSION['empleado'])){echo $_SESSION['empleado'];} if (isset($_SESSION['cliente'])){ echo $_SESSION['cliente'];}?></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="Desconectar.php">cerrar session</a>
                    </div>
                </div>

                <?php
            }else{
                ?>
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Iniciar Sesion
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

<!-- Registro producto. -->
<div class="container">
    <form action="../Controlador/ResgistrarProductoC.php" method="post" enctype="multipart/form-data">
        <div class="mt-5 mb-5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Registrar producto</h1>
                    <i class="fa fa-archive fa-5x hidden-xs-down" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <!--id producto-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </div>
                        <input maxlength="3" name="id" type="text" class="form-control" id="inlineFormInputGroup" placeholder="codigo" required>
                    </div>
                    <br>
                    <!--nombre producto-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-object-ungroup" aria-hidden="true"></i>
                        </div>
                        <input name="nombre" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nombre de producto">
                    </div>
                    <br>
                    <!--correo precio-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <input name="precio" type="text" class="form-control" id="inlineFormInputGroup" placeholder="precio">
                    </div>
                    <br>
                    <!--description producto-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </div>
                        <input name="descripcion" type="text" class="form-control" id="inlineFormInputGroup" placeholder="descripcion producto maximo 40 caracteres">
                    </div>
                    <br>
                    <!--cantidad-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-thermometer-quarter" aria-hidden="true"></i>
                        </div>
                        <input name="cantidad" type="number" class="form-control" id="inlineFormInputGroup" min="1"  placeholder="cantidad" required>
                    </div>
                    <br>
                    <!--imagen producto-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </div>
                        <input name="imagen" type="file" class="form-control" id="inlineFormInputGroup" placeholder="">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>