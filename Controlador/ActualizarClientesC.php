<?php
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 06/12/2017
 * Time: 22:56
 */
session_start();
include('../Modelo/Conexion.php');
$conection = new Conexion();

if ($conection->conectarMysql() == false){
    header("Location: ../Vista/Errores/FalloConexionDB.php");
}elseif(isset($_SESSION['id_empleado'])){
    $id = $_POST['id'];
    $nombre = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $email = $_POST['email'];
    $tarcred = $_POST['targ'];
    $direc = $_POST['direc'];

    if(!empty($id) && !empty($nombre) && !empty($pass) && !empty($email) && !empty($tarcred) && !empty($direc)){
        $consulta = "UPDATE tblCliente
                 SET
                 NOMAPE_Cliente = '".strtoupper($nombre)."',
                 PASS_Cliente = '".$pass."',
                 CORREO = '".$email."',
                 Targeta = '".$tarcred."',
                 DIRECCION = '".$direc."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($nombre)){
        $consulta = "UPDATE tblCliente
                 SET
                 NOMAPE_Cliente = '".strtoupper($nombre)."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($pass)){
        $consulta = "UPDATE tblCliente
                 SET
                 PASS_Cliente = '".$pass."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($email)){
        $consulta = "UPDATE tblCliente
                 SET
                 CORREO = '".$email."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($tarcred)){
        $consulta = "UPDATE tblCliente
                 SET
                 Targeta = '".$tarcred."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($direc)){
        $consulta = "UPDATE tblCliente
                 SET
                 DIRECCION = '".$direc."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }
}elseif (isset($_SESSION['idcliente'])){

    $id = $_SESSION['idcliente'];
    $nombre = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $email = $_POST['email'];
    $tarcred = $_POST['targ'];
    $direc = $_POST['direc'];

    if(!empty($id) && !empty($nombre) && !empty($pass) && !empty($email) && !empty($tarcred) && !empty($direc)){
        $consulta = "UPDATE tblCliente
                 SET
                 NOMAPE_Cliente = '".strtoupper($nombre)."',
                 PASS_Cliente = '".$pass."',
                 CORREO = '".$email."',
                 Targeta = '".$tarcred."',
                 DIRECCION = '".$direc."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($nombre)){
        $consulta = "UPDATE tblCliente
                 SET
                 NOMAPE_Cliente = '".strtoupper($nombre)."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($pass)){
        $consulta = "UPDATE tblCliente
                 SET
                 PASS_Cliente = '".$pass."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($email)){
        $consulta = "UPDATE tblCliente
                 SET
                 CORREO = '".$email."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($tarcred)){
        $consulta = "UPDATE tblCliente
                 SET
                 Targeta = '".$tarcred."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }elseif (!empty($id) && !empty($direc)){
        $consulta = "UPDATE tblCliente
                 SET
                 DIRECCION = '".$direc."'
                 WHERE ID_Cliente = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);


        if ($resultado !=  null){
            header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }

    }
}