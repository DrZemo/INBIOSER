<?php
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 06/12/2017
 * Time: 21:19
 */
session_start();

include('../Modelo/Conexion.php');

$conection = new Conexion();
if (isset($_SESSION['id_empleado'])) {
    $idempleado = $_SESSION['id_empleado'];

    if ($conection->conectarMysql() == false){
        header("Location: ../Vista/Errores/FalloConexionDB.php");
    }else{
        $cantidad = 0;
        $id = $_POST['id'];

        $consulta = "DELETE FROM tblProducto 
        WHERE ID_Producto = '".$id."'";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);

        if ($resultado !=  null){
            header("Location: ../Vista/index.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }
    }
}else{
    header("Location: ../Vista/Errores/SinSession.php");
}
