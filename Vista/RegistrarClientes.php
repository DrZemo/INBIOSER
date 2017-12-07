<!DOCTYPE html>
<?php
session_start();
?>
<!---
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 23:06
 */
 */--->
<html lang="en">

<head>
    <title>INBIOSER</title>
    <link rel="shortcut icon" href="../Vista/img/logo.png">
    <!-Required meta tags -->
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
                <a class="nav-link active" href="RegistrarClientes.php" >
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Registrar Cliente
                </a>
            </li>
            <?php
            if(!isset($_SESSION['idcliente'])){
                ?>
                <li class="nav-item " >
                    <a class="nav-link disabled" href="ActualizarClientes.php" >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Actualizar Clientes
                    </a>
                </li>
                <?php
            }
            ?>
            <?php
            if(!isset($_SESSION['id_empleado'])){
                ?>
                <li class="nav-item " >
                    <a class="nav-link disabled" href="EliminarCliente.php" >
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar Cliente
                    </a>
                </li>
                <?php
            }
            ?>
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
                        <a class="dropdown-item" href="../Controlador/CerrarSesion.php">cerrar session</a>
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

<!-- Registro clientes. -->
<div class="container">
    <form action="../Controlador/RegistrarClientesC.php" method="post">
        <div class="mt-5 mb-5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Registrar cliente</h1>
                    <i class="fa fa-reddit-alien fa-5x hidden-xs-down" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <!--id cliente-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        </div>
                        <input name="id" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Documento" required>
                    </div>
                    <br>
                    <!--nombre cliente-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </div>
                        <input name="usuario" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nombre de cliente" required>
                    </div>
                    <br>
                    <!--contraseña cliente-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <input name="contraseña" type="password" class="form-control" id="inlineFormInputGroup" placeholder="contraseña" required>
                    </div>
                    <br>
                    <!--correo cliente-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <input name="email" type="email" class="form-control" id="inlineFormInputGroup" placeholder="email">
                    </div>
                    <br>
                    <!--DIRECCION cliente-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>

                        </div>
                        <input name="direc" type="text" class="form-control" id="inlineFormInputGroup" placeholder="direccion">
                    </div>
                    <br>
                    <!--targeta cliente-->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">
                            <i class="fa fa-bullseye" aria-hidden="true"></i>
                        </div>
                        <input name="targ" type="number" class="form-control" id="inlineFormInputGroup" placeholder="targeta de credito">
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