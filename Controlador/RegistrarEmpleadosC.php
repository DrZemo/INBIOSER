<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 22/11/2017
 * Time: 22:37
 */
include('../Modelo/Conexion.php');
$conection = new Conexion();

if ($conection->conectarMysql() == false){
    header("Location: ../Vista/Errores/FalloConexionDB.php");
}else{
    $id = $_POST['id'];
    $us= $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $email = $_POST['email'];

    $consulta = "INSERT INTO tblEmpleado(ID_Empleado,USUARIO_Empleado,PAS_Empleado,EMAIL) VALUES('".$id."','".strtoupper($us)."','".$pass."','".$email."')";
    $resultado = mysqli_query($conection->conectarMysql(),$consulta);

    if ($resultado !=  null){
        header("Location: ../Vista/index.php");
    }else{
        header("Location: ../Vista/Errores/FalloIngresoDatos.php");
    }
}
?>